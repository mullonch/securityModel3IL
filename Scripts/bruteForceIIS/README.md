# Brute force IIS

## Explication de la faille

Le but de cette application est de forcer l'authentification d'un entête HTTP. En effet le protocole HTTP supporte la possibilité de sécuriser l'accès à un site directement au niveau protocolaire.

Notre application se contente de tester tous les utilisateurs présents dans le fichier `users.txt` et tous les mots de passe présents dans le fichier `passwords.txt` 

## Explication du correctif

Des applications telles que [failToBan](https://www.fail2ban.org/) (pour Linux) permettent de bloquer une IP après un certain nombre de tentatives. Ce qui permet de contrer les attaques par brute force.
