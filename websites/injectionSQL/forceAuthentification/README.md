# Injection SQL
## Explication de la faille
Dans cette faille de sécurité, nous passons un fragment de requête qui va être interprété par le serveur comme faisant partie de la requête même.
Le but dans notre exemple est de forcer l'authentification à un serveur distant.
La requête de base étant
```sql
SELECT * FROM user WHERE name = '$username' AND password = md5('$password');
```

La partie `$username` sera remplacée par l'identifiant de l'utilisateur.
La partie `$password` sera remplacée par le mot de passe que l'utilisateur aura tapé, à savoir :
```sql
') OR ('') = ('
```

PHP va donc envoyer la requête suivante au SGBD : 
```sql
SELECT * FROM user WHERE name = 'admin' AND password = md5('') OR ('') = ('');
```

Notre injection à pour objectif d'inclure une clause `OR` à notre condition et de la forcer à `true`. Une fois la clause validée, le système va retourner un utilisateur ce qui aura pour conséquence de valider l'authentification.

## Explication du correctif
Pour corriger ce problème, il faut utiliser PDO (en PHP) et sa mécanique de requête préparés. Le système va au préalable compiler la requête avec les arguments qui seront et s'occupera par la suite de sécuriser les arguments en question la requête ressemblera alors à : 
```php
$req = $_pdo->prepare("SELECT * FROM item WHERE label LIKE :search");
$req -> bindParam(":search", $search, PDO::PARAM_STR);
```
