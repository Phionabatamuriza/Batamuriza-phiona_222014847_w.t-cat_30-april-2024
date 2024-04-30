<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Page</title>
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

<body bgcolor="green">
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
    <h1>product form</h1>
<form method="post" onsubmit="return confirmInsert();">

<label for="Product_Id">Product_Id:</label>
<input type="number" id="prid" name="prid" ><br><br>

<label for="Product_Name">Product_Name:</label>
<input type="text" id="prn" name="prn" required><br><br>

<label for="Product_Price">Product_Price:</label>
<input type="text" id="pp" name="pp" required><br><br>

<input type="Submit" name="Add" value="Insert"><br><br>

</form>
 <?php
    // Connection details
   include('db_connection.php');


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO product (Product_Id, Product_Name,Product_Price) VALUES ( ?, ?, ?)");
        $stmt->bind_param("iss", $Product_Id, $Product_Name, $Product_Price);

        // Set parameters from POST data with validation (optional)
        $Product_Id = ($_POST['prid']); // Ensure integer for ID
        $Product_Name = ($_POST['prn']); 
        $Product_Price = ($_POST['pp']); 
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

// SQL query to fetch data from product table
$sql = "SELECT * FROM product ";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of product </title>
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
    <center><h2>Table of product </h2></center>
    <table border="5">
        <tr>
           
            <th>Product_Id</th>
            <th>Product_Name</th>
            <th>Product_Price</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        include('db_connection.php');


        // Prepare SQL query to retrieve all products
        $sql = "SELECT * FROM product";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // Output data for each row

            while ($row = $result->fetch_assoc()) {
                $ppid = $row['Product_Id']; 
                echo "<tr>
                    <td>" . $row['Product_Id'] . "</td>
                    <td>" . $row['Product_Name'] . "</td>
                    <td>" . $row['Product_Price'] . "</td>
                    <td><a style='padding:4px' href='delete_product.php?Product_Id=$ppid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_product.php?Product_Id=$ppid'>Update</a></td> 
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