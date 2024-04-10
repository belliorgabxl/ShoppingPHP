<?php
    session_start();
    include 'config.php';
    //ดึงข้อมูลใส่ตารางตรงนี้
    $query = mysqli_query($conn,  "SELECT * FROM products");
    $rows = mysqli_num_rows($query);
    if(!isset($_SESSION['username'])){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/fontawesome.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/brands.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url ?>/asset/fontawesome/css/solid.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="styles/home.css?php echo time(); ?>">
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
        <h4 class="Topic">Store</h4>
        <div class="row d-flex justify-content-center">
        <?php if($rows > 0 ):?>
            <?php while($product = mysqli_fetch_assoc($query)):?>
            <div class="col-3 mb-5">
                <div class="card" style="width: 18rem;">
                <?php if(!empty($product['profile_image'])): ?>
                <img src="<?php echo $base_url;?>/upload_image/<?php echo $product['profile_image'];?>" class="card-img-top" width="100" height="200" alt="product image">
                <?php else:?>
                <img src="<?php echo $base_url;?>/asset/images/no-image.png" width="100" alt="product image">
                <?php endif;?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['product_name'];?></h5>
                        <p class="card-text text-success fw-bold mb-0"><?php echo number_format($product['price'],2);?>&nbsp;฿</p>
                        <p class="card-text text-muted"><?php echo nl2br($product['detail']);?></p>
                        <a href="<?php echo $base_url?>/cart-add.php?id=<?php echo $product['id'];?>"  class="btn btn-primary w-100"><i class="fa-solid fa-cart-shopping me-2"></i>Add Cart</a>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        <?php else :?>
            <div class="col-12">
                <h4 class="text-danger">ไม่มีรายการสินค้า</h4>
            </div>
            <?php endif;?>
        </div>
    </div>


    <script src="<?php echo $base_url ?>/asset/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>