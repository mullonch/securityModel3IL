<!DOCTYPE html>
<?php
    $_pdo = new PDO ("mysql:host=127.0.0.1;dbname=injectionSQL;charset=utf8", "root", "");
?>

<html>
    <head>
        <title>SQL Injection</title>
    </head>
    <body>
        <h1>SQL Injection</h1>

        <form action="" method="post" enctype="multipart/form-data">
            Find an article<br/>
            <input type="text" name="search" /><br />
            <input type="checkbox" name="enableSecurity" />Enable security<br/>
            <input type="submit" value="Find" name="submit" />
        </form>

        <ul>
            <?php
                $search = "%";
                if (isset($_POST["search"]) && $_POST["search"] != "") {
                    $search = $_POST["search"];
                }

                $req;
                if (isset($_POST["enableSecurity"])) {
                    $req = $_pdo->prepare("SELECT * FROM item WHERE label LIKE :search");
                    $req -> bindParam(":search", $search, PDO::PARAM_STR);
                } else {
                    $req = $_pdo->prepare("SELECT * FROM item WHERE label LIKE '".$search."'");
                }
                $req->execute();
                $results = $req->fetchAll();
                $req->closeCursor();

                foreach ($results as $r) {
                    echo "<li> Object : ".$r[1]." | Price : ".$r[2]."</li>";
                }
            ?>
        </ul>
    </body>
</html>