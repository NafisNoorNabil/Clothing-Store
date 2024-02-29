<?php
require_once('DBconnect.php');
$query="select id, name, data, price from arrivals";
$result= mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clothing Store</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <header>
        <nav>
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="men.php">Men</a>
      <ul>
      <li><a href="men.php">Shirts</a></li>
        <li><a href="men.php">Pants</a></li>
        <li><a href="men.php">Jackets</a></li>
      </ul>
    </li>
    <li><a href="women.php">Women</a>
      <ul>
        <li><a href="women.php">Dresses</a></li>
        <li><a href="women.php">Tops</a></li>
        <li><a href="women.php">Bottoms</a></li>
      </ul>
    </li>
    <li><a href="shoes.php">Shoes</a></li>
    <li><a href="donate.php">Donate</a></li>
    <li><a href="#contact">Contact</a></li>
    <li class="search-bar">
    <form action="search.php" method="post">
      <input type="text" name="search" placeholder="Search...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>

    <?php
  // Check if the user is logged in and display their username on the nav section
  session_start();
  if(isset($_SESSION['username'])){
    echo "<li id='username'><a href='#'>".$_SESSION['username']."</a>";
    echo "<ul>"; // Start logout dropdown menu
    echo "<li><a href='logout.php'>Logout</a></li>"; // Logout option with link to logout.php
    echo "</ul>"; 
    echo "</li>"; 
  } else {
    echo "<li id='login-logo'><a href='#'>Login</a></li>";
  }
?>
</ul>
</nav>

<div id="login-form" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Login Form</h2>
    <form method="post">
      <div class="formclass">
        <div>
          <label for="name">Username</label>
          <input type="text" id="name" name="name">
        </div>
        <div>
          <label for="pass">Password</label>
          <input type="password" id="pass" name="pass">
        </div>
      </div>
      <button type="submit" name="login">Login</button>
      <p>Don't have an account?</p>
      <a href="reg.php" class="reg">Register Now</a>
    </form>
    <br>
    <br>
    <a href="adminlogin.php" class="reg">ADMIN LOGIN</a>
  </div>
</div>

<?php
require_once('DBconnect.php');
if(isset($_POST['login'])){ // Check if login form is submitted
  $u=$_POST['name'];
  $p=$_POST['pass'];
  $sql="SELECT * FROM userlogin WHERE name='$u' AND pass='$p'";
  
  $result=mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result)!=0){
    $_SESSION['username'] = $u;
    header("Location: home.php"); // Redirect to home.php after successful login
  }
  else{
    echo "Wrong username or password"; // Display error message for wrong username or password
    echo "<script>alert('Wrong username or password');</script>"; // JavaScript alert for wrong username or password
  }
}

if(isset($_GET['logout'])){ // Check if logout button is clicked
  session_destroy(); // Destroy session
  header("Location: index.php"); // Redirect to index.php after logout
  exit;
}
?>

</div>


              </div>
            </div>


          </header>
          
    </header>
    <div class="slider">
      <div class="slider-container">
        <img src="pic1.jpg" alt="Image 1">
        <img src="pic2.jpeg" alt="Image 2">
        <img src="pic3.webp" alt="Image 3">
        <img src="pic4.jpeg" alt="Image 4">
        <img src="pic5.jpg" alt="Image 5">
      </div>
      <div class="slider-controls">
        <button class="slider-prev">&#10094;</button>
        <button class="slider-next">&#10095;</button>
      </div>
      
    </div>
    





    <main>
  <h2>New Arrivals</h2>
  <section class="products">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      $image = $row['data'];
      ?>
      <div class="product">
        <a href="homeproduct.php?id=<?php echo $row['id']; ?>">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="<?php echo $row['name']; ?>">
        </a>
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['price']; ?>৳</p>
        <form action="add_to_cart.php" method="post">
          <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
          <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
          <input class="cart" type="submit" name="add_to_cart" value="Add to Cart">
        </form>
      </div>
      <?php
    }
    ?>
  </section>
  <div class="show">

    <a href="cart.php">Show Cart</a>
  </div>
</main>
<a name="contact">Contact</a>
<footer class="bottom">
<h6>Phone: 01924416316</h6>
<h6>Email: nafisnoornabil29@gmail.com</h6>
  <h5> © 2023 Nafis Noor Nabil,Inc.</h5>

</footer>




<script>
const sliderContainer = document.querySelector('.slider-container');
const sliderImages = document.querySelectorAll('.slider-container img');
const prevBtn = document.querySelector('.slider-prev');
const nextBtn = document.querySelector('.slider-next');
let counter = 1;
const size = sliderImages[0].clientWidth;

const firstClone = sliderImages[0].cloneNode(true);
const lastClone = sliderImages[sliderImages.length - 1].cloneNode(true);

sliderContainer.appendChild(firstClone);
sliderContainer.insertBefore(lastClone, sliderImages[0]);

sliderContainer.style.transform = 'translateX(' + (-size * counter) + 'px)';

nextBtn.addEventListener('click', () => {
  if (counter >= sliderImages.length - 1) return;
  sliderContainer.style.transition = 'transform 0.5s ease-in-out';
  counter++;
  sliderContainer.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

prevBtn.addEventListener('click', () => {
  if (counter <= 0) return;
  sliderContainer.style.transition = 'transform 0.5s ease-in-out';
  counter--;
  sliderContainer.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

sliderContainer.addEventListener('transitionend', () => {
  if (sliderImages[counter].id === 'lastClone') {
    sliderContainer.style.transition = 'none';
    counter = sliderImages.length - 2;
    sliderContainer.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }

  if (sliderImages[counter].id === 'firstClone') {
    sliderContainer.style.transition = 'none';
    counter = sliderImages.length - counter;
    sliderContainer.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }
});


// Get the Login Form Popup
var modal = document.getElementById("login-form");

// Get the Login button that opens the Login Form Popup
var loginBtn = document.getElementById("login-logo");

// Get the <span> element that closes the Login Form Popup
var span = document.getElementsByClassName("close")[0];

// When the user clicks on Login button, open the Login Form Popup
loginBtn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the Login Form Popup
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the Login Form Popup, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>

</body>
</html>


