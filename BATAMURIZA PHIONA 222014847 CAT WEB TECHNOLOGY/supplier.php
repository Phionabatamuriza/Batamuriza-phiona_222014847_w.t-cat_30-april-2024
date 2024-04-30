<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Supplier Page</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;

      background-color: yellow;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>
   <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
  
<header>
   

</head>

<body bgcolor="skyblue">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/logo.jpg" width="90" height="60" alt="Logo">
   </li>
  <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a>
    <li style="display: inline; margin-right: 10px;"><a href="./ABOUT US.html">ABOUT US</a>
      <li style="display: inline; margin-right: 10px;"><a href="./CONTACT US.html">CONTACT US</a>
    <li style="display: inline; margin-right: 10px;"><a href="./customer.php">Customer</a>
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./department.php">Department</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./employee.php">Employee</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./product.php">Product</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./supplier.php">Supplier</a>
  </li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:darkgreen; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Acount</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
  </ul>

</header>
<section>
   
    <h1>Supplier form</h1>
<form method="post" onsubmit="return confirmInsert();">
<label for="Supplier_Id">Supplier_Id:</label>
<input type="number" id="spid" name="spid" ><br><br>

<label for="Product_Id">Product_Id:</label>
<input type="text" id="prid" name="prid" required><br><br>

<label for="Supplier_Name">Supplier_Name:</label>
<input type="text" id="sn" name="sn" required><br><br>

<label for="Supplier_Phone">Supplier_Phone:</label>
<input type="number" id="ssp" name="ssp" required><br><br>

<label for="Email">Email:</label>
<input type="email" id="eml" name="eml" required><br><br>

<label for="Gender">Gender:</label>
<input type="text" id="gnde" name="gnde" required><br><br>

<input type="Submit" name="Add" value="Insert"><br><br>

</form>

 <?php
    // Connection details
    include('db_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO supplier (Supplier_Id, Product_Id,Supplier_Name,Supplier_Phone,Email,Gender) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issbbb", $Supplier_Id, $Product_Id, $Supplier_Name,$Supplier_Phone,$Email,$Gender);

        // Set parameters from POST data with validation (optional)
        $Supplier_Id = ($_POST['spid']); // Ensure integer for ID
        $Product_Id = ($_POST['prid']); 
        $Supplier_Name = ($_POST['sn']); 
        $Supplier_Phone = ($_POST['ssp']); // Ensure integer for ID
        $Email = ($_POST['eml']); 
        $Gender = ($_POST['gnde']); 
        // Execute prepared statement with error handling
        if ($stmt->execute()) {
            echo "New record has been added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $connection->close();
    ?>

<?php
// Connection details
include('db_connection.php');

// SQL query to fetch data from supplier table
$sql = "SELECT * FROM supplier ";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of supplier </title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of supplier </h2></center>
    <table border="5">
        <tr>
           
           
            <th>Supplier_Id</th>
            <th>Product_Id</th>
            <th>Supplier_Name</th>
            <th>Supplier_Phone</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        include('db_connection.php');


        // Prepare SQL query to retrieve all products
        $sql = "SELECT * FROM supplier";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // Output data for each row

            while ($row = $result->fetch_assoc()) {
                $ssid = $row['Supplier_Id']; 
                echo "<tr>
                    <td>" . $row['Supplier_Id'] . "</td>
                    <td>" . $row['Product_Id'] . "</td>
                    <td>" . $row['Supplier_Name'] . "</td>
                    <td>" . $row['Supplier_Phone'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Gender'] . "</td>
                    <td><a style='padding:4px' href='delete_supplier.php?Supplier_Id=$ssid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_supplier.php?Supplier_Id=$ssid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
  </body>
    </section>

  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 & reg, Designer by: @Phiona Batamuriza</h2></b>
  </center>
</footer>
</body>
</html>