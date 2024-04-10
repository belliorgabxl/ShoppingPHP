<?php
session_start();
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css?v=<?php echo time(); ?>">

</head>
<body >
    <form class="content" action='<?php echo $base_url ;?>/login-manage.php' method="post">
    
        <div class="topic">Login</div>
            <div>
                <label class="tag" >Username</label>
                <input class="inputBox" type="text" name="username_log" placeholder="username"/>
            </div>
            <div>
                <label class="tag">Password</label>
                <input class="inputBox" type="password" name="password_log" placeholder="password"/>
            </div>
            <div class="btnArea">
                <button type="submit" name="login_user" class="btnLogin">Login</button>
            </div>
    </form>
</body>
</html>