<!DOCTYPE html>
<html>
    <header>
        <title>Database installation</title>
    </header>
    <body>
        <?php
            try {
                require_once("./configuration.php");
                $_pdo = getPDO(NULL);
    
                $injectionJs = fopen("./injectionJS/database.sql", "r");
                $req_injectionJs = $_pdo->prepare(fread($injectionJs, filesize("./injectionJS/database.sql")));
                $req_injectionJs->execute();
                $req_injectionJs->closeCursor();
                fclose($injectionJs);
    
                $injectionSQL = fopen("./injectionSQL/database.sql", "r");
                $req_injectionJs = $_pdo->prepare(fread($injectionSQL, filesize("./injectionSQL/database.sql")));
                $req_injectionJs->execute();
                $req_injectionJs->closeCursor();
                fclose($injectionSQL);
    
                echo "<h1>Installation OK</h1>";
            } catch (Exception $e) {
                echo "<h1>Installation KO</h1>";
            }
        ?>
    </body>
</html>
