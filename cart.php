
<?php
    session_start();
    include 'config.php';

    if(!isset($_SESSION['username'])){
        header("location: index.php");
    }
    //ดึงข้อมูลใส่ตารางตรงนี้
    $productIds = [];
    foreach(($_SESSION['cart']??[]) as $cartId => $cartQty){
        $productIds[] = $cartId;
    }
    $ids = 0;
    if(count($productIds)>0){
        $ids =  implode(',',$productIds );
    }
    $query =  mysqli_query($conn , "SELECT * FROM  products  WHERE id IN ($ids) ");
    $rows = mysqli_num_rows($query)
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
        <h4 class="Topic">Cart</h4>
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $base_url;?>/cart-update.php" method="post">
            <table class="table table-bordered border-gray">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Image</th>
                            <th>Product Name</th>
                            <th style="width: 120px;">Price</th>
                            <th style="width: 150px;">Quantity</th>
                            <th style="width: 150px;">Total</th>
                            <th style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($rows > 0 ):?>
                            <?php while($product = mysqli_fetch_assoc($query)):?>
                                <tr>
                                    <td><?php if(!empty($product['profile_image'])): ?>
                                        <img src="<?php echo $base_url;?>/upload_image/<?php echo $product['profile_image'];?>" width="100" alt="product image">
                                        <?php else:?>
                                            <img src="<?php echo $base_url;?>/asset/images/no-image.png" width="100" alt="product image">
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <?php echo $product['product_name']; ?>
                                        <div>
                                            <small class="text-muted">
                                                <?php echo nl2br($product['detail']); ?>
                                            </small>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($product['price'],2 );?></td>
                                    <td><input type="number" min=0 name="product[<?php echo $product['id'];?>][quantity]" value="<?php echo $_SESSION['cart'][$product['id']]?>" class="form-control"/></td>
                                    <td>
                                        <?php echo number_format($product['price'] * $_SESSION['cart'][$product['id']],2);?>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Are you sure?');" role="button" href="<?php echo $base_url;?>/cart-delete.php?id=<?php echo $product['id'];?>"
                                        class="btn btn-outline-danger"><i class="fa-solid fa-trash me-1"></i>Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            <tr>
                                <td colspan="6" class="text-end">
                                    <button type="submit" class="btn btn-lg btn-success">Update Cart</button>
                                    <a  href="<?php echo $base_url?>/checkout.php" class="btn btn-lg btn-primary">CheckOut Order</a>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="6"><h4 class="text-center text-danger">ไม่มีรายการสินค้าในตะกร้า</h4></td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </form>
            </div>
        </div>
    </div>


    <script src="<?php echo $base_url ?>/asset/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>