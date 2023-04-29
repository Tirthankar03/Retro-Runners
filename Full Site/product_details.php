<?php require ('config/db.php');

//Get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

//Create Query
$query = 'SELECT * FROM products WHERE id='.$id;
// $query1 = 'SELECT * FROM images WHERE car_id='.$id;

//Get Results

$result = mysqli_query($conn, $query);
// $result1 = mysqli_query($conn, $query1);


// Fetch Data
$product = mysqli_fetch_assoc($result);
// $images = mysqli_fetch_all($result1, MYSQLI_ASSOC);

//Free the result

mysqli_free_result($result);
// mysqli_free_result($result1);

// Close Connection
mysqli_close($conn);


/*
<?php echo $post['created_at']; ?>
*/

/*



<button> 
    <a href="
    <?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>
    ">Edit</a> 
</button>



<?php foreach($posts as $post) : ?>
<?php endforeach; ?>

*/

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product page</title>

    <script
    defer
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
  ></script>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="product_details.css" />
  </head>

  <body>
    <!-- =============================== * navbar * ============================================ -->
<?php include('inc/header.php');?>
    <!-- =============================== * ad 1 * ============================================ -->

    <!-- <div class="ads_img2">
      <img src="images/ad2.jpg" />
      <i class="fa-regular fa-rectangle-xmark" id="adicon2"></i>
    </div> -->

    <!-- =============================== * product img * ============================================ -->

    <div class="product_img">

      <div class="image_discription">
          

        <div class="slideshow-container">

          <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="../Screenshot (10).png" style="width:100%">
          </div>
      
          <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="../Screenshot (5).png" style="width:100%">
          </div>
      
          <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="../Screenshot (6).png" style="width:100%">
          </div>
      
          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>
      
        </div>
      <br>
      
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
      </div>
      
    </div>

      <div class="descriptiopn">
        <h3>Description</h3>
        <p>
        <?php echo $product['description'];?>
      </div>
      
      <div class="product_details">
        <div class="box" id="box1">
          <div class="price">
            <h3>₹<?php echo $product['price'];?></h3>
            <div>
              <p><i class="fa-solid fa-share-nodes"></i></p>
              <p><i class="fa-regular fa-heart"></i></p>
            </div>
          </div>
          <span> Mi TV Stick </span>
          <div class="location">
            <p>Today</p>
          </div>
        </div>

        <div class="box" id="box2">
          <p class="Seller_description">Seller Description</p>
          <div class="seller_detail">
            <img src="images/pic2.jpg" />
            <div>
              <h2>AsKAki</h2>
              <p>Member since Nov 2021</p>
            </div>
          </div>
          <div id="box2-chat">
          <a href="chat/index.php?id=<?php echo $product['id'];?>"> Chat with Seller </a>
        </div>
        </div>

        <!-- <div class="box" id="box3">
          <h2>Posted in</h2>
          <p>Bandra East, Mumbai</p>
          <img src="images/location.png" />
        </div> -->
      </div>
    </div>

    <!-- =============================== * footer * ============================================ -->

    <footer class="footer-distributed">
      <div class="footer-left">
        <h3>Renbar<span>sell</span></h3>

        <p class="footer-company-name">CampusCart © 2015</p>
      </div>

      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Assam Engineering College Rd</span>Jalukbari, Guwahati, Assam 781013</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+1.555.555.5555</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">support@company.com</a></p>
        </div>
      </div>

      <div class="footer-right">
        <p class="footer-company-about">
          <span>About the company</span>
          Platform for our students for buying,selling or sharing used books,materials,instruments etc
        </p>
      </div>
    </footer>
    <script>
      let slideIndex = 1;
      showSlides(slideIndex);
      
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      
      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }
      </script>
  </body></html>
