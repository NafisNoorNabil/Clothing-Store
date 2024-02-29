<?php
    require_once('DBconnect.php'); ?>
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
    <li class="search-bar">
    <form action="search.php" method="post">
      <input type="text" name="search" placeholder="Search...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    </li>
  </ul>
</nav>






    <?php
$searchTerm = $_POST['search'];

$query = "SELECT * FROM images WHERE name LIKE '%$searchTerm%' or type like '%$searchTerm%'";

$result = mysqli_query($conn, $query);
?>


<main>
  <h2>New Arrivals</h2>
  <section class="products">
    <?php
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




</body>
</html>