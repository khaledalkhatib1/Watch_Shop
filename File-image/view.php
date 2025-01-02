<?php
    include 'conn.php';
?>
<html>
    <title>View Files</title>
    <body>
        <h1>View the uploded files</h1>
        <table width="80%" border="1">
            <tr>
            <th colspan="4">Your uploads ...
            <a href="upload.php">Upload new files</a></th>
            </tr> 
            <tr>
            <td>File Name</td><td>File Type</td>
            <td>File Size</td><td>View</td>
            </tr>

        <?php
            $dbP = mysqli_query($con, "SELECT * from tbl_upload");
            while($row = mysqli_fetch_array($dbP))
            {
                echo "<tr><td>".$row['file']."</td>";
                echo "<td>".$row['type']."</td>";
                echo "<td>".$row['size']."</td>";
        ?>
            <td><a href="uploads/<?php echo $row['file'] ?>"
            target="_blank">View file</a></td></tr>
        <?php
            }
        ?>
        </table>
    </body>
</html>