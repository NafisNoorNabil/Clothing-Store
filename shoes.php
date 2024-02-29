<?php
    require_once('DBconnect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Clothing Store</title>
    <link rel="stylesheet" href="men.css">
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
    <li class="search-bar">
    <form action="search.php" method="post">
      <input type="text" name="search" placeholder="Search...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>

    </li>
  </ul>
</nav>



              </div>
            </div>


          </header>
          
    </header>

<main>
  <h2>SHOES</h2>
  <section class="products">
    <?php

    $query="select id, name, data, price,type from images where category='shoe'";
    $result= mysqli_query($conn,$query);

    
      while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['data'];
        ?>
      <div class="product">
        <a href="product.php?id=<?php echo $row['id']; ?>">
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
</main>





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


