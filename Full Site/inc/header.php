<header>
<nav>
    <div class="brand">
        <div x-data="{ isOpen: false }" class="sidebar-container">
            <!-- Mobile sidebar toggle button -->
            <button class="sidebar-toggle" @click="isOpen = !isOpen" @click.away="isOpen = false">
              <i class="fas fa-bars"></i>
            </button>
          
            <!-- Mobile sidebar -->
            <aside class="sidebar" :class="{ 'open': isOpen }">
              <!-- Sidebar content -->
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Buy</a></li>
                <li><a href="#">Rent</a></li>
                <li><a href="#">Barter</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#"></a></li>
              </ul>
            </aside>
          </div>
        <h1>Renbarsell</h1>
    </div>



    <div class="search-bar">
        <form action="">
            <select name="category" id="cars">
                <option value="volvo">All</option>
                <option value="volvo">Books</option>
                <option value="saab">Equipments</option>
            </select>
            <input type="text" placeholder="Search by product name, category, etc">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>



    <div class="buttons">

                   
<!-- HTML code for the popup -->
<span x-data="{ open: false }">
<!-- Button to open the popup -->
<button @click="open = true" class="btn-white"><i class="fas fa-plus-circle"></i> <span>Add Product</span></button>

<!-- Popup container -->
<div x-show="open" class="popup" @click.away="open = false">
  <!-- Popup content -->
  <div class="popup-content">
 
  <form action="addproduct.php" method="POST" enctype="multipart/form-data" class="addpost">
  <!-- Heading -->
  <h2>Add Product</h2>
  
  <!-- File input -->
  <div>
    <label for="file">Product Images:</label>
    <input type="file" id="file" name="file">
  </div>
  
  <!-- Caption input -->
  <div>
    <label for="caption">Name:</label>
    <input type="text" id="caption" name="name">
  </div>
  <div>
    <label for="caption">Description:</label>
    <input type="text" id="caption" name="desc">
  </div>

  <div>
    <label for="caption">Price:</label>
    <input type="text" id="caption" name="price">
  </div>

  <div>
    <label for="caption">Sell, Rent or Barter:</label>
    <select name="sell_status" id="cars">
      <option value="sell">Sell</option>
      <option value="rent">Rent</option>
      <option value="barter">Barter</option>
    </select>
  </div>

  <!-- Add Product button -->
  <button type="submit">Add Product</button>
</form>


</div>
</div>
</span>



<?php
if(isset($_SESSION['username']))
{
  ?>

<a class="notice-btn" href="chat/users.php">
                    <span class="fa-stack fa-lg">
                        <i class="fas fa-envelope"></i>
                        <span class="badge badge-danger badge-counter">3+</span>
                    </span>
</a>

<img src="https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png?f=webp&w=256" alt="" height="50px" width="50px" style="margin-left: 10px;">


  <?php }else{ ?>
    
        <span x-data="{ open: false }">
            

            <button class="btn" @click="open = true" style="margin-left: 10px;">
                <i class="fas fa-sign-in-alt"></i> <span href="#">Login</span>
            </button>
            
            <!-- Popup container -->
            <div x-cloak x-show="open" class="popup" @click.away="open = false">
              <!-- Popup content -->
              <div class="popup-content">
                <!-- Heading -->
                <h2>Login to Renbarsell</h2>
                
                <!-- Login form -->
                <form action="../auth/login.php" method="POST">
                  <!-- Email input -->
                  <div>
                    <label for="email">Username: </label>
                    <input type="text" id="email" name="username">
                  </div>
                  
                  <!-- Password input -->
                  <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                  </div>
                  
                  <!-- Login button -->
                  <button type="submit">Login</button>
                </form>

                <p>Don't have an account? <a href="auth/register.php">Create Account</a> </p>
                
                <!-- Close button -->
                <button class="close-btn" @click="open = false">Close</button>
              </div>
            </div>
          </span>

          <?php }?>


    </div>
</nav>


<div class="sub-navigation">
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="rent.php">Rent</a></li>
    <li><a href="barter.php">Barter</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
</ul>
</div>


<div class="mobile-search-bar">
    <form action="">
        <select name="category" id="cars">
            <option value="volvo">All</option>
            <option value="volvo">Books</option>
            <option value="saab">Equipments</option>
        </select>
        <input type="text" placeholder="Search by product name, category, etc">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>
</header>