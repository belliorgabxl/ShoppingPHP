<?php
session_start();

include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <link  href="<?php echo $base_url;?>/asset/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/fontawesome.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/brands.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/solid.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="styles/success.css?php echo time(); ?>">
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
        <h4>CheckOut Success</h4>

        <?php if(!empty($_SESSION['discount'])):?>
            <div class="text-dark">
                <div class="lay">
                    <small  class="tag">Price:</small>
                    <span class="text-dark"><strong><?php echo number_format($_SESSION['amount_before'],2) ;?>฿</strong></span>
                </div>
                <div class="lay">
                    <small class="tag">Discount</small>
                    <span class="text-danger"><strong><?php echo number_format($_SESSION['discount'],2) ;?>฿</strong></span>
                </div>
                <div class="lay">
                    <small  class="tag1">Total Payment:</small>
                    <span class="text-success h4"><strong><?php echo number_format($_SESSION['amount_after'],2) ;?>฿</strong></span>
                </div>
           
        </div>
        <?php endif; ?>

        <div class="coin_remain">
            <div class="textcoin">
                ยอดเงินคงเหลือ :<strong><?php echo number_format($_SESSION['token'],2) ;?>฿</strong>
            </div>
        </div>
        <div class="btnArea"> 
            <a href="<?php echo $base_url?>/success.php" class="okBtn">OK</a>
        </div>
    </div>
</body>
</html>