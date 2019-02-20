# Injection SQL
## Explication de la faille
Dans cette faille de sécurité, nous passons un fragment de requête qui va être interprété par le serveur comme faisant partie de la requête même.
La requête de base étant
```sql
SELECT * FROM item WHERE label LIKE '$search';
```

la partie `$search` cerce remplacée par ce que passe l'utilisateur, à savoir :
```sql
'; UPDATE item SET price = 10.0 WHERE '' = '
```

PHP va donc envoyer la requête suivante au SGBD : 
```sql
SELECT * FROM item WHERE label LIKE ''; UPDATE item SET price = 10.0 WHERE '' = '';
```

Cette requête va entrainer alors entrainer une altération des données présente dans la base. En s'appuyant sur ce principe, il est possible d'envisager un grand nombre de possibilités.
## Explication du correctif
Pour corriger ce problème, il faut utiliser PDO (en PHP) et sa mécanique de requête préparés. Le système va au préalable compiler la requête avec les arguments qui seront et s'occupera par la suite de sécuriser les arguments en question la requête ressemblera alors à : 
```php
$req = $_pdo->prepare("SELECT * FROM item WHERE label LIKE :search");
$req -> bindParam(":search", $search, PDO::PARAM_STR);
```