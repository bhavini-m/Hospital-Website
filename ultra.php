<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = "";
$username_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = htmlspecialchars(trim($_POST["username"]));
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT data_name FROM data WHERE data_name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username);
                    
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } 
        }
		
		 header("location:font.php");
		/*if(mysqli_stmt_execute($stmt)){
		 header("location:font.php");}
		 else{
		 echo "something went wrong";}
		 
        // Close statement
       mysqli_stmt_close($stmt);*/
    }
	
     
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
	
	* {
    box-sizing: border-box;
}

body {
    font-family: Monotype Corosiva;
    padding: 20px;
    background: #F5B7B1  ;
}

/* Header/Blog Title */
.header {
    padding: 40px;
    font-size: 100px;
    text-align: right;
    background: #008080 url("https://i2.wp.com/hbgmedicalassistance.com/wp-content/uploads/2015/07/fortis-hospital-logo.jpg?w=700") no-repeat local top left;
   
}

/* Style the top navigation bar */
.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: red;
	font-family: Arial, Helvetica, sans-serif;
}

/* Style the topnav links */
.topnav a {
   display: block;
    color: white;
    text-align: center;
    padding: 20px 16px;
    text-decoration: none;
	float: left;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #111;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
    float: left;
    width: 75%;
}

/* Right column */
.rightcolumn {
    float: left;
    width: 25%;
    background-color: #f1f1f1;
    padding-left: 20px;
}

/* Fake image */
.fakeimg {
    
    width: 100%;
    
}

/* Add a card effect for articles */
.card {
     background-color: #D1F2EB;
     padding: 20px;
     margin-top: 20px;
     }

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
    margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 800px) {
    .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media (max-width: 400px) {
    .topnav a {
        float: none;
        width:100%;
    }
}
        body{ font: 20px sans serif; background-color: #F5B7B1; text-align: center;}
        .wrapper{ width: 350px; padding: 10px; }
    
	</style>
	
</head>
<div class="header">
  <h1 style="font-size:100px;">APOLLO FORTIS</h1>
  <br>
</div>

<div class="topnav">
  <a href="dHome.html">Home</a>
  <a href="dHistory.html">History</a>
  <a href="ultra.php">Patient id</a>
  <a href="dAchievements.html">Achievements</a>
  <a href="logout.php" style="float:right">Logout</a>
  </div>

<body >
    <div class="wrapper">
        <h2>Login</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>PATIENT NAME</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
          </div>
		  
         </form>
    </div>    
</body>
</html>