<?php
    session_start();
    include 'config.php';
    //ดึงข้อมูลใส่ตารางตรงนี้

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/fontawesome.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/brands.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/solid.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="styles/home.css?v=<?php echo time(); ?>">
</head>


<body class="bodyHomepage">
    <div class="Homepage">
        <?php if(!empty($_SESSION['message'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message'];?>
                <button type="button" class="btn-close" data-bs-dissmiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <h1 class="TopicHome">Welcome To Website</h1>
        <div class="HomeBox">
        <a  href="<?php echo $base_url?>/login-page.php" class="HomeBtn">Login</a>
        <a  href="<?php echo $base_url?>/register-page.php" class="HomeBtn">Register</a>
        </div>
        
    </div>
</body>
</html>
