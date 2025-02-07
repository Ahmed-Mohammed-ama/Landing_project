<?php
include("include/RegisterAndLogin.php");

include("include/db.php");
require_once(__DIR__ . "/include/autoload.php");

session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email =  trim($_POST['email']);
    $passWord = trim($_POST['password']);


    clsValidation::ValidateEmail($email);
    clsValidation::ValidatePassword($passWord);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and empty(clsValidation::$Error)) {
    $CheckUser = new clsDatabase($connection);
    $CheckUser = $CheckUser->table("USERS")->select("*")->where("USER_EMAIL", "=", $email)->get();

    // !password_verify($passWord, $CheckUser[0]['USER_PASSWORD'])
    
    if (password_verify($passWord, $CheckUser[0]['USER_PASSWORD'])) {
        $_SESSION['userinfo']=$CheckUser[0];
        if($_SESSION['userinfo']['ROLE_ID']==2){
            header(("location: index.php"));
        }else if($_SESSION['userinfo']['ROLE_ID']==1){
            header("location: admin/index.php");
        }
    } else {
?>
        <script>
            alert("Invalid User");
        </script>
<?php
    }
}
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login Page </title>
    <link rel="stylesheet" href="Assets/CSS/login.css?v=3.0">
</head>

<body>
    <div class="center">
        <h1> Log in</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <div class="txt_field">
                <label>Email</label>
                <input type="text" name="email">


                <?php
                if (isset(clsValidation::$Error['email'])) {
                    echo clsValidation::$Error['email'];
                }
                // echo  $CheckUser[0]['USER_PASSWORD'];
                // var_dump($passWord);
                // var_dump($CheckUser[0]);
                ?>
            </div>

            <div class="txt_field">
                <label> Password </label>
                <input type="password" name="password">

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