# File Upload

## Descriptif du script

Le script suivant peut être utilisé dans le cadre d'une attaque de type [fileUpload](..websites/fileUpload). Une fois déposé sur le serveur distant, nous n'avons plus qu'à y accéder par le biais de notre navigateur.

Le script nous offre alors un accès console au serveur distant.

## Explication du correctif

Sans parler des différentes techniques pour se protéger contre une vulnérabilité de type [fileUpload](..websites/fileUpload), il est possible de ce prémunir contre ce type de script en configurant PHP pour ne pas exécuter les commandes `shell_exec()`. Le script ne pourra alors en aucun cas passer d'appels système.
