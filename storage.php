<?php
    session_start();
    include 'config.php';

    //ดึงข้อมูลใส่ตารางตรงนี้
    $query = mysqli_query($conn,  "SELECT * FROM products");
    $rows = mysqli_num_rows($query);
    $result =  [
        'id' => '',
        'product_name'=>'',
        'price' => '',
        'detail' => ''
    ];
    // แก้ไขข้อมูล
    if(!empty($_GET['id'])){
        $query_product = mysqli_query($conn , "SELECT * FROM products WHERE id='{$_GET['id']}'");
        $row_product = mysqli_num_rows($query_product);
        if($row_product == 0){
            header('location:' . $base_url . "/storage.php");
        }
        $result = mysqli_fetch_assoc($query_product); 
    }
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
        <h4 class="Topic">manager Product</h4>
        <div class="row g-5">
            <div class="col-md-8 col-sm-12">
                <form action='<?php echo $base_url ;?>/product-form.php' method="post" 
                enctype="multipart/form-data" >
                <input type="hidden" name="id"  value="<?php echo$result['id'];?>" />
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="<?php echo $result['product_name'];?>" /> 
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $result['price'];?>" /> 
                    </div>
                    <div class="col-sm-6">
                    <?php if(!empty($result['id'])):?>
                        <div>
                            <img src="<?php echo $base_url;?>/upload_image/<?php echo $result['profile_image'];?>" width="100" alt="product image">
                        </div>
                    <?php endif;?>
                        <label for="formFile" class="form-label">Image</label>
                        <input type="file" name="profile_image" class="form-control" value=""
                        accept="image/png , image/jpg  , image/jpeg" /> 
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Detail</label>
                        <textarea name="detail" class="form-control" rows="3"><?php echo $result['detail'];?></textarea>
                    </div>
                </div>
                <?php if(empty($result['id'])):?>
                    <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk me-1">
                    </i>Create</button>
                <?php else:?>
                    <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk me-1">
                    </i>Update</button>
                <?php endif;?>
                <a role="button" href="<?php echo $base_url;?>/storage.php" class="btn btn-secondary">
                <i class="fa-solid fa-rotate me-1"></i>Cancel</a>

                <hr class="my-4"/>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Image</th>
                            <th>Product Name</th>
                            <th style="width: 200px;">Price</th>
                            <th style="width: 200px;">Action</th>
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
                                    <td>
                                        <a role="button" href="<?php echo $base_url;?>/storage.php?id=<?php echo $product['id'];?>"
                                        class="btn btn-outline-dark"><i class="fa-regular fa-pen-to-square me-1"></i>Edite</a>

                                        <a onclick="return confirm('Are you sure?');" role="button" href="<?php echo $base_url;?>/product-delete.php?id=<?php echo $product['id'];?>"
                                        class="btn btn-outline-danger"><i class="fa-solid fa-trash me-1"></i>Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4"><h4 class="text-center text-danger">ไม่มีรายการสินค้า</h4></td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="<?php echo $base_url ?>/asset/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>