<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles/register.css?v=<?php echo time(); ?>">
</head>
<body>
        <form class="content" action='<?php echo $base_url ;?>/register-manage.php' method="post">
            <div class="topic">Register</div>
            <div class="inputForm">
                <div>
                    <label class="tag" >Username</label>
                    <input class="inputBox" type="text" name="username" placeholder="username"/>
                </div>
                <div>
                    <label class="tag" >Email</label>
                    <input class="inputBox" type="text" name="email" placeholder="@email"/>
                </div>
                <div>
                    <label class="tag">Password</label>
                    <input class="inputBox" type="password" name="password" placeholder="password"/>
                </div>
                <div>
                    <label class="tag">Confirm Password</label>
                    <input class="inputBox" type="password" name="Cpassword" placeholder="Confirm password"/>
                </div>
                <div class="btnArea">
                    <button type="submit" class="btnLogin">Register</button>
                </div>
            </div>
        </form>
</body>
</html>