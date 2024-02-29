<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="adminlogin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>
<body>
    <a href="home.php" class="adminlogin">HOME</a>
    
    <section class="formclass">
        <img src="cover1.jpg" width="400px" height="600px">
        
        <form action="adminlogin.php" class="form_design" method="post">
            <h1>ADMIN LOGIN</h1>


            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <button type="submit" name="login">Login</button>
        </form>
    </section>

    <?php
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];


    $adminEmail = 'admin@gmail.com';
    $adminPassword = '1234';


    if ($email === $adminEmail && $password === $adminPassword) {
        header("Location: adminhome.php");
    } else {
        echo "Invalid email or password";
    }
}
?>

    
</body>
</html>