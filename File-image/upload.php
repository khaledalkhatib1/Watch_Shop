<?php
    include 'conn.php';
?>
<html>
    <title>Uploading Files and Images</title>
    <body>
        <h1>Upload your file here:</h1>
        <form action="upload.php" method="post" 
            enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="upload">Upload</button>
        </form><br>

        <?php
            if(isset($_POST['upload']))
            {
                $file = $_FILES['file']['name'];
                $file_loc = $_FILES['file']['tmp_name'];
                $file_size = $_FILES['file']['size'];
                $file_type = $_FILES['file']['type'];
                $folder = "uploads/";

                $new_size = $file_size/1024;
                $new_file_name = strtolower($file);
                $final_file = str_replace(' ', '-',$new_file_name);

                if(move_uploaded_file($file_loc,$folder.$final_file))
                {
                    $dbI = mysqli_query($con, "INSERT into 
                    tbl_upload(file,type,size)
                    values('$final_file','$file_type','$new_size')");
                    echo "File uploaded successfully<br>";
                    echo "<a href='view.php'>Click here to view file.</a>";
                }
                else
                {
                    echo "Problem with file uploading<br>";
                    echo "Try to upload any files(PDF, EXE, MP3, etc...)";
                }
            }
        ?>
    </body>
</html>