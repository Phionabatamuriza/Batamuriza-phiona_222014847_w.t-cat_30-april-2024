<!DOCTYPE html>
<html lang="en">
<!-- My Name is Phiona Batamuriza reg:222014847-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>

<body bgcolor="skyblue">
<center>
    <h2 style="background-color:yellow; width: 500px; height: 50px;">
    Login Form</h2>
    <form action="login.php" method="post" style="background-color: pink; width: 500px; height: 200px;">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
     
        <p style="font-size: 20px;"><a href="forgotpassword.php">Forgot Password</a></p>

        <input type="submit" value="Login">
        <input type="reset" value="Cancel">
        
        <p style="font-size: 20px;"><i>Don't have an account?</i> <a href="register.html">
        Create New Account</a></p>
    
    </form>
    
</center>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body bgcolor="skyblue">
    <center>
        <h2 style="background-color:yellow; width: 500px; height: 50px;">Forgot Password</h2>
        <form action="forgotpassword_process.php" method="post" style="background-color: pink; width: 500px; height: 200px;">
            <label>Email:</label>
            <input type="email" name="email" required><br><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Cancel">
        </form>
    </center>
</body>
</html>

