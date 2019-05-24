# CryptoLocker

## Explication de la faille

L'objectif d'un cryptolocker est de chiffrer une partition ou un répertoire de l'utilisateur, afin de rendre les données inutilisables. 

La version que nous proposons effectue un chiffrement grâce à une clé RSA, ce qui signifie que l'information n'est pas détruite, mais simplement chiffrée. Il est alors possible à l'attaquant de demander une rançon en échange de la clé privée qui pourrait déchiffrer les données. Ce type d'attaque s'appelle un ransomware rendu populaire courant de l'année 2018 notamment à cause du virus [WannaCry](https://fr.wikipedia.org/wiki/WannaCry).

## Explication du correctif

La seule façon de contrer un Cryptolocker est d'avoir une politique de mise à jour efficace afin d'être sûr d'avoir les derniers correctifs de sécurité. De plus il est nécessaire d'avoir un antivirus, car ce type de programme dans ces versions les plus simples peut facilement être détecté et neutralisé.
