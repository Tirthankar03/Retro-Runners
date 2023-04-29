<?php require('config/db.php');

$query = "SELECT * FROM products WHERE sell_status = 'Rent' ORDER BY id DESC";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renbarsell</title>

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="style.css">


    <!-- FontAwesome Cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AlpineJS CDN  -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>


</head>

<?php include('inc/header.php') ?>


<body>

<section class="products">
<h2>Available Products</h2>

<div class="products-container">


<?php foreach($products as $product) : ?>  
    <div class="card">
        <img src="images/<?php echo $product['image'];?>" alt="Product Image">
        <h2><?php echo $product['name'];?></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p class="price">$99.99</p>
      <div class="btns">
<a href="#" class="btn-white<?php echo ($product['sell_status'] === 'buy') ? ' active' : ''; ?>">Buy</a>
<a href="#" class="btn-white<?php echo ($product['sell_status'] === 'rent') ? ' active' : ''; ?>">Rent</a>
<a href="#" class="btn-white<?php echo ($product['sell_status'] === 'barter') ? ' active' : ''; ?>">Barter</a>

        <a style="margin-left:12px" class="btn-white" href="product_details.php?id=<?php echo $product['id'];?>" ><i class="fas fa-plus"></i></a>
      </div>
      </div>
<?php endforeach; ?>
    

</div>



</section>

</body>

<footer>

</footer>

</html>