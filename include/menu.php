

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header class="d-flex justify-content-center sticky-top bg-dark shadow-sm  py-3 mb-4 border-bottom">
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item" >
            <a href="<?php echo $base_url;?>/homepage.php" class="nav-link text-light fw-bold px-7">Home</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo $base_url;?>/product-list.php" class="nav-link text-light fw-bold px-5 ">Product</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo $base_url;?>/cart.php" class="nav-link text-light fw-bold px-5"><i class="fa-solid fa-cart-shopping me-2">
            </i>Cart(<?php echo count($_SESSION['cart'] ?? []);?>)</a>
        </li>

        <li class="nav-item">
            <a href="<?php echo $base_url;?>/storage.php" class="nav-link text-light fw-bold px-5"><i class="fa-solid fa-database me-2">
            </i>Manage Product</a>
        </li>
        <li>
        <a class="nav-link text-light fw-bold px-5" href="<?php echo $base_url;?>/token.php" >
        <i class="fa-solid fa-dollar-sign me-2"></i><?php echo number_format($_SESSION['token']) ?? [];?>
        </a>
        </li>
        <li>
         <div class="nav-link text-light fw-bold px-20 fs-15px">
        <i class="fa-solid fa-user me-2 px-20"></i><?php echo $_SESSION['username'] ?? [];?>
         </div>
        </li>
        <li>
            <a href="<?php echo $base_url;?>/logout.php" class="nav-link text-light fw-bold px-5"><i class="fa-solid fa-right-from-bracket me-2"></i>
            Logout</a>
        </li>
    </ul>
</header>
</body>
</html>