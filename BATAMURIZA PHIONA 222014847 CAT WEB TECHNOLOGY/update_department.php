<?php
// Connection details
include('db_connection.php');

// Check if Department_Id is set
if(isset($_REQUEST['Department_Id'])) {
    $departid = $_REQUEST['Department_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM department WHERE Department_Id=?");
    $stmt->bind_param("i",$departid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['Department_Id'];
        $b = $row['Department_Name'];
        $c = $row['Department_Location'];
        
    } else {
        echo "Department not found.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Departments</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Departments form -->
    <h2><u>Update Form of Departments</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="depname">Department_Name:</label>
        <input type="text" name="depname" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="deplocation">Department Location:</label>
        <input type="text" name="deplocation" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $departmentName = $_POST['depname'];
    $departmentLocation = $_POST['deplocation'];
    
    // Update the department in the database
    $stmt = $connection->prepare("UPDATE department SET Department_Name=?, Department_Location=? WHERE Department_Id=?");
    $stmt->bind_param("ssi", $departmentName, $departmentLocation, $departid);
    $stmt->execute();
    
    // Redirect to department.php
    header('Location: department.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
 