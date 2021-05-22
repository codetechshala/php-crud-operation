<?php 
    require_once("connection.php");
    $id = $_GET["id"] ?? "";
    $name      = "";
    $email     = "";
    $gender    = "";
    $address   = "";
    $language  = [];
    $btnText   = "Register";
    if ($id) {
        $sql = "SELECT * from student WHERE id=$id";
        $result = $conn->query($sql);
        $student = $result->fetch_assoc();
        $name      = $student["name"];
        $email     = $student["email"];
        $gender    = $student["gender"];
        $address   = $student["address"];
        $language  = explode(",", $student["language"]);
        $btnText   = "Update Details";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <title>Student Registration Form</title>
    </head>
    <body>
        <form action="save.php" method="post" autocomplete="off">
            <div class="container">
                <h1>STUDENT REGISTRATION</h1>
                <hr>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" id="name" value="<?php echo $name; ?>" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $email; ?>" required>

                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" id="pwd" >

                <label for="pwd-Confirm"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="pwd-Confirm" id="pwd-Confirm" >

                <label for="gender"><b>Gender</b></label>
                <input name="gender" for="gender" type="radio" value="male" required <?php if ($gender == "male") { echo "checked"; } ?> />Male
                <input name="gender" for="gender" type="radio" value="female" required <?php if ($gender == "female") { echo "checked"; } ?> />Female
                
                <hr>
                <label><b>Language</b></label>
                <input name="language[]" class="language" type="checkbox" value="hindi" <?php if (in_array("hindi", $language)) { echo "checked"; } ?> />Hindi
                <input name="language[]" class="language" type="checkbox" value="english" <?php if (in_array("english", $language)) { echo "checked"; } ?> />English
                <input name="language[]" class="language" type="checkbox" value="urdu" <?php if (in_array("urdu", $language)) { echo "checked"; } ?> />Urdu

                <hr>
                <label for="address"><b>Address</b></label>
                <textarea name="address" rows="1" cols="60" placeholder="Enter Your Address...." id="address" required><?php echo $address; ?></textarea>

                <hr>
                <button type="submit" class="registerbtn"><?php echo $btnText; ?></button>
            </div>
        </form>
    </body>
</html>
<?php 
    require_once("connection_close.php");   
?>