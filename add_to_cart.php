


<?php
require_once('DBconnect.php');
if(isset($_POST['add_to_cart'])) {
  // Retrieve the values from the form
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];

  // Insert the values into the "cart" table
  $sql = "INSERT INTO cart VALUES ('$product_id', '$product_name', '$product_price','1')";
  $result = mysqli_query($conn, $sql);
  if(mysqli_affected_rows($conn)){
			
    header("Location: home.php");
}
else{
    header("Location: home.php");

}
}

?>
