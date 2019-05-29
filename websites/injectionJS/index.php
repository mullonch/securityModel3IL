<!DOCTYPE html>
<?php
    require_once("../configuration.php");
    $_pdo = getPDO("injectionJs");
?>
<html>
    <head>
        <title>JS Injection</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <h1>JS Injection</h1>

        <?php
            if (isset($_GET["message"])) {
                $req = $_pdo->prepare("INSERT INTO message(text) VALUES (:text);");
                $req -> bindParam(":text", $_GET["message"], PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
            $req = $_pdo->prepare("SELECT * FROM message;");
            $req->execute();
            $results = $req->fetchAll();
            $req->closeCursor();

            foreach ($results as $r) {
                if (isset($_GET["enableSecurity"])) {
                    echo "<li>Message: ".htmlspecialchars($r[1], ENT_QUOTES)."</li>";
                } else {
                    echo "<li>Message: ".$r[1]."</li>";
                }
            }
        ?>

        <form action="" method="get">
            Read message : <br/>
            <textarea name='message' maxlength='5000' placeholder='Contenu du message'></textarea><br/>
            <input type="checkbox" name="enableSecurity" />Enable security<br/>
            <input type="submit" value="Submit" name="submit" />
        </form>
    </body>
</html>