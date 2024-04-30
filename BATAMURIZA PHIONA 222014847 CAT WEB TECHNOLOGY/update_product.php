<?php
// Connection details
include('db_connection.php');

// Check if Product_Id is set
if(isset($_REQUEST['Product_Id'])) {
    $pid = $_REQUEST['Product_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM product WHERE Product_Id=?");
    $stmt->bind_param("i", $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['Product_Id'];
        $b = $row['Product_Name'];
        $c = $row['Product_Price'];
       
    } else {
        echo "Product not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Product form -->
    <h2><u>Update Form of Product</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="prname">Product Name:</label>
        <input type="text" name="prname" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="prprice">Product Price:</label>
        <input type="number" name="prprice" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>


        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $pname = $_POST['prname'];
    $pprice = $_POST['prprice'];
    
    // Update the product in the database
    $stmt = $connection->prepare("UPDATE product SET Product_Name=?, Product_Price=? WHERE Product_Id=?");
    $stmt->bind_param("ssi", $pname, $pprice, $pid);
    $stmt->execute();
    
    // Redirect to product.php
    header('Location: product.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
