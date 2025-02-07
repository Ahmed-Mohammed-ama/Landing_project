<?php
include("include/RegisterAndLogin.php");
require_once __DIR__ . ("/include/autoload.php");
require_once("include/db.php")
?>


<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $passWord = trim($_POST['password']);

    clsValidation::ValidateName($fname);
    clsValidation::ValidateLastName($lname);
    clsValidation::ValidatePassword($passWord);
    clsValidation::ValidateEmail($email);
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && empty(clsValidation::$Error)) {
    if(empty($_SESSION["userinfo"])) {
    $EncriptedPassword = password_hash($passWord, PASSWORD_DEFAULT);

    $NewUser = new clsDatabase($connection);
    $NewUser->table("users")->insert(array(
        "USER_FNAME" => $fname,
        "USER_LNAME" => $lname,
        "USER_EMAIL" => $email,
        "USER_PASSWORD" => $EncriptedPassword
    ));
    header("location: login.php");
}else{
    $UserID= $_SESSION["userinfo"]["USER_ID"];

    $EncriptedPassword = password_hash($passWord, PASSWORD_DEFAULT);
    $UpdateUser = new clsDatabase($connection);
    $UpdateUser->table('users')->update(array(
        "USER_FNAME" => $fname,
        "USER_LNAME" => $lname,
        "USER_EMAIL" => $email,
        "USER_PASSWORD" => $EncriptedPassword
    ))->where("USER_ID", "=", $UserID)->execute();
    // echo "<h5 class='alert alert-success'>Updated Successfully</h5>";
} 

}
//  if (isset($editRowData[0]['ID'])) {
//     echo $editRowData[0]['ID'];
// } 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Sign in </title>
    <link rel="stylesheet" href="Assets/CSS/login.css?v=4.0">
</head>

<body>
    <div class="center">
        <h1> Sign in</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="txt_field">
                <!-- <input type="hidden" name="C_id" value=""> -->
                <label>First name </label>
                <input type="text" name="fname" value="<?php if(isset($_SESSION["userinfo"]["USER_FNAME"])){echo $_SESSION["userinfo"]["USER_FNAME"];}?>">
                
                <?php
                if (isset(clsValidation::$Error['name'])) {
                    echo clsValidation::$Error['name'];
                }
                ?>
            </div>


            <div class="txt_field">
                <label>Last name </label>
                <input type="text" name="lname" value="<?php if(isset($_SESSION["userinfo"]["USER_LNAME"])){echo $_SESSION["userinfo"]["USER_LNAME"];}?>">
                <?php
                if (isset(clsValidation::$Error['lname'])) {
                    echo clsValidation::$Error['lname'];
                }
                ?>
            </div>


            <div class="txt_field">
                <label>Email Address </label>
                <input type="text" name="email" value="<?php if(isset($_SESSION["userinfo"]["USER_EMAIL"])){echo $_SESSION["userinfo"]["USER_EMAIL"];}?>">
                <?php
                if (isset(clsValidation::$Error['email'])) {
                    echo clsValidation::$Error['email'];
                }
                ?>
            </div>



            <div class="txt_field">
                <label> Password </label>
                <input type="password" name="password"  value="<?php if(isset($_SESSION["userinfo"]["USER_PASSWORD"])){echo $_SESSION["userinfo"]["USER_PASSWORD"];}?>">
                <?php
                if (isset(clsValidation::$Error['password'])) {
                    echo clsValidation::$Error['password'];
                }
                ?>
            </div>






            <input type="submit" value="Login" name="login" class="login">
        </form>
    </div>

</body>

</html>