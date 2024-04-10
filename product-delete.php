

<?php
session_start();

include 'config.php';

if(!empty($_GET['id'])){
    $query_product = mysqli_query($conn , "SELECT * FROM products WHERE id='{$_GET['id']}' ");
    $result  = mysqli_fetch_assoc($query_product);
    @unlink('upload_image/' . $result['profile_image']);

    $query =  mysqli_query($conn, "DELETE FROM products WHERE id='{$_GET['id']}'")or die("Delete Failed..");
    mysqli_close($conn);
    
    if($query){
        $_SESSION['message'] = "Product Deleted Success";
        header('location: '.$base_url. "/storage.php");
    }else{
        $_SESSION['message'] =  "Product Deleted Failed";
        header('location: '.$base_url.'/storage.php');
    }
}
?>
