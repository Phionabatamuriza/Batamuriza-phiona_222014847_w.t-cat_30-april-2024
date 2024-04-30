<?php
// Connection details
include('db_connection.php');


// Check if employee is set
if(isset($_REQUEST['Employee_Id'])) {
    $empid = $_REQUEST['Employee_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM employee WHERE Employee_Id=?");
    $stmt->bind_param("i", $empid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['Employee_Id'];
        $b = $row['Department_Id'];
        $c = $row['First_Name'];
        $d = $row['Last_Name'];
        $e = $row['Email'];
        $f = $row['Position'];
        $g = $row['Gender'];
    } else {
        echo "employee not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update employees</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update employees form -->
    <h2><u>Update Form of employees</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="deptid">Department Id:</label>
        <input type="number" name="deptid" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="eml">Email:</label>
        <input type="email" name="eml" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

           <label for="postn">Position:</label>
          <select name="postn">
                <option <?php if(isset($f) && $f == 'CEO') echo 'selected'; ?>>CEO</option>
                <option <?php if(isset($f) && $f == 'manager') echo 'selected'; ?>>manager</option>
                <option <?php if(isset($f) && $f == 'secretary') echo 'selected'; ?>>secretary</option>
                <option <?php if(isset($f) && $f == 'Accountant') echo 'selected'; ?>>Accountant</option>
            </select>
        
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
    $departid = $_POST['deptid'];
    $frstname = $_POST['fname'];
    $lstname = $_POST['lname'];
    $email = $_POST['eml'];
    $position = $_POST['postn'];
    $gender = $_POST['gend'];
    
    // Update the employee in the database
    $stmt = $connection->prepare("UPDATE employee SET Department_Id=?, First_Name=?, Last_Name=?, Email=?, Position=?, Gender=? WHERE Employee_Id=?");
    $stmt->bind_param("isssssi", $departid, $frstname, $lstname, $email, $position, $gender, $empid);
    $stmt->execute();
    
    // Redirect to employee.php
    header('Location: employee.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
