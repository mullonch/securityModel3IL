<!DOCTYPE html>
<html>
    <head>
        <title>File Upload</title>
    </head>
    <body>
        <h1>File Upload</h1>  
        <?php
            if (isset($_POST["submit"]) && isset($_FILES)) {
                $fileDirectory = "files/".basename($_FILES["fileUploaded"]["name"]);
                $imageFileType = strtolower(pathinfo($fileDirectory, PATHINFO_EXTENSION));

                $uploadAccepted = 1;

                if (isset($_POST["enableSecurity"])) {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        echo "Bad file format";
                        $uploadAccepted = 0;
                    }
                }

                if ($uploadAccepted == 1) {
                    if (move_uploaded_file($_FILES["fileUploaded"]["tmp_name"], $fileDirectory)) {
                        echo "Upload OK";
                    } else {
                        echo "Upload error";
                    }
                }

            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            Select file to upload:<br/>
            <input type="file" name="fileUploaded" id="fileUploaded"/><br/>
            <input type="checkbox" name="enableSecurity" />Enable security<br/>
            <input type="submit" value="Upload File" name="submit" />
        </form>
    </body>
</html>