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
    <link rel="stylesheet" href="styles/homepage.css?php echo time(); ?>">
</head>
<body>
<?php include 'include/menu.php'; ?>
<div class="container">
    <div class="content1">
        <div>Welcome to my website!!</div>
    </div>
    <div>
        <img src="https://img.freepik.com/free-photo/empty-dark-room-modern-futuristic-sci-fi-background-3d-illustration_35913-2290.jpg?size=626&ext=jpg&ga=GA1.1.1700460183.1708300800&semt=ais"
        width="1000px" height="500px"/>
    </div>
    <div class="content2">
        <div>We have a more item shopping</div>
    </div>
    <div class="row d-flex justify-content-center">
    <?php if($rows > 0 ):?>
            <?php while($product = mysqli_fetch_assoc($query)):?>
            <div class="col-4  mb-5">
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
    
</body>
</html>