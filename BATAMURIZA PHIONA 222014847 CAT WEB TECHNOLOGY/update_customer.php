<?php
// Connection details
include('db_connection.php');


// Check if Customer_Id is set
if(isset($_REQUEST['Customer_Id'])) {
    $custid = $_REQUEST['Customer_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Customer WHERE Customer_Id=?");
    $stmt->bind_param("i", $custid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Customer_Id'];
        $c = $row['First_Name'];
        $d = $row['Last_Name'];
        $e = $row['Email'];
        $f = $row['Phone_Number'];
        $g = $row['Gender'];
    } else {
        echo "Customer not found.";
    }
}
?>
<html>
<head>
<!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update customer form -->
    <h2><u>Update Form of customers</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="eml">Email:</label>
        <input type="email" name="eml" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="custphone">Phone Number:</label>
        <input type="number" name="custphone" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>

        <label for="gend">Gender:</label>
          <select name="gend">
                <option <?php if(isset($g) && $g == 'Male') echo 'selected'; ?>>Male</option>
                <option <?php if(isset($g) && $g == 'Female') echo 'selected'; ?>>Female</option>
          </select>
        
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $frstname = $_POST['fname'];
    $lstname = $_POST['lname'];
    $email = $_POST['eml'];
    $phoneNmbr = $_POST['custphone'];
    $gender = $_POST['gend'];
    
    // Update the customer in the database
    $stmt = $connection->prepare("UPDATE Customer SET First_Name=?, Last_Name=?, Email=?, Phone_Number=?, Gender=? WHERE Customer_Id=?");
    $stmt->bind_param("sssssi",$frstname, $lstname, $email, $phoneNmbr, $gender, $custid);
    $stmt->execute();
    
    // Redirect to customer.php
    header('Location: customer.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
