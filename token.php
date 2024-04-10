
<?php
    session_start();
    include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/fontawesome.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/brands.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/solid.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="styles/home.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include 'include/menu.php'; ?>
    <div class="container" style="margin-top: 30px;">
    <?php if(!empty($_SESSION['message'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message'];?>
            <button type="button" class="btn-close" data-bs-dissmiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
        <h4 class="Topic">Earn Coin</h4>
        <form action="<?php echo $base_url?>/earn-token.php" class="tokenInputArea" method="post">
          <input class="tokenInput" type="number"  name="coin" min=0  /> 
          <button class="tokenBtn" type="submit" name="earnBtn">Add</button>
        </form>
        
    </div>


    <script src="<?php echo $base_url ?>/asset/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>