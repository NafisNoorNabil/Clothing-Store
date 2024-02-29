
<?php
    require_once('DBconnect.php');
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Donate Your Clothes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="donate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
    <script>
        function previewImage() {
            var preview = document.getElementById("preview");
            var fileInput = document.getElementById('image');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }
    </script>
</head>
<body>
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

      </nav>
      
    <div class="container">
        <h1>Donate Your Clothes</h1>
        <form action="donate.php" method="post" enctype="multipart/form-data">

            <img id="preview" src="" alt="Upload a picture">
            <input type="file" id="image" name="image" onchange="previewImage()">
            <label class="category"for="category">Select Category</label>
            <select id="category" name="category">
                <option value="MenClothing">Men's Clothing</option>
                <option value="WomenClothing">Women's Clothing</option>
                <option value="Shoes">Shoes</option>
                <option value="Accessories">Accessories</option>
            </select>
            <input type="submit" name="submit" value="Donate">
        </form>
        <div id="imagePreview">
        </div>
    </div>

// Check if form is submitted
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected category from the form
    $category = $_POST['category'];
    $image = $_FILES['image']['tmp_name'];

    // Insert the selected category into the database
    $sql = "INSERT INTO donate (category, pic) VALUES ('$category','$image')";
    mysqli_query($conn, $sql);

    // Check if the insertion was successful
    if (mysqli_affected_rows($conn) > 0) {
        // Redirect to thankyou.php
        header("Location: thankyou.php");
        exit; // Make sure to exit after the redirect
    }
}
?>
</body>
</html>
