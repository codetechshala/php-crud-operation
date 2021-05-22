<?php 
    require_once("connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <title>Student List</title>
    </head>
    <body>
        <div class="container">
            <caption><h1>Student list</h1></caption>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Language</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php
                    $sql = "SELECT * from student";
                    $result = $conn->query($sql);
                    if ($result->num_rows) { 
                        while($student = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $student["name"]; ?></td>
                                <td><?php echo $student["email"]; ?></td>
                                <td><?php echo $student["gender"]; ?></td>
                                <td><?php echo $student["language"]; ?></td>
                                <td><?php echo $student["address"]; ?></td>
                                <td>
                                    <a href="index.php?id=<?php echo $student["id"]; ?>" >Update</a>
                                    <a href="delete.php?id=<?php echo $student["id"]; ?>" >Delete</a>
                                </td>
                            </tr>
                        <?php 
                        } 
                    }
                ?>
                
            </table>
        </div>
    </body>
</html>
<?php 
    require_once("connection_close.php");   
?>