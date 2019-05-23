<!DOCTYPE html>
<html>
    <header>
        <title>Database installation</title>
    </header>
    <body>
        <?php
            try {
                require_once("./configuration.php");
                $pdo_injectionJs = getPDO("injectionJs");
                $pdo_injectionSQL = getPDO("injectionSQL");
    
                $injectionJs = fopen("./injectionJS/database.sql", "r");
                $req_injectionJs = $pdo_injectionJs->prepare(fread($injectionJs, filesize("./injectionJS/database.sql")));
                $req_injectionJs->execute();
                $req_injectionJs->closeCursor();
                fclose($injectionJs);
    
                $injectionSQL = fopen("./injectionSQL/database.sql", "r");
                $req_injectionJs = $pdo_injectionSQL->prepare(fread($injectionSQL, filesize("./injectionSQL/database.sql")));
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
