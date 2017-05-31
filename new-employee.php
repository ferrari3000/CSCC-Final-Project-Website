<?php
  include('include/connect.php');

session_start();

if (!isset($_SESSION['id']) || $_SESSION['username'] != 'tfoor@mprecords.com'){
    session_destroy();
    header('Location: index2.php');
}
?>


<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Employee</title>
<link href="include/style4.css" rel="stylesheet" type="text/css">
<link href="include/style5.css" rel="stylesheet" type="text/css">
<?php include('process-validation.php'); ?>
</head>
<body>
<div class="greeting">
  <img id="intranetVinyl" src="img/intranetVinyl.jpg" alt="Vinyl Record On Player"/> 
        </div> 
 <header class="center">
    <nav class="mobile">
      <a href="mp_now.php"><img class="logo" src="img/m_and_p_intranet.png" alt="M & P Now"></a> 
    </nav>
  </header>
  <div class="container">
    <div class="login">
    

    <div id="signup">
      <h1>New Employee</h1>
     </div>
    
      <form action="" method="post"> 
        <h4><label>Email:</label> <input type="text" name="username" id="username" onblur="validateName('username')"/>
        <span id="usernameError" style="display: none;">Only letters please.</span></h4>
        <h4><label>Password:</label> <input type="password" name="password" id="password"></h4>
        <h4><label>Confirm:</label> <input type="password" name="confirm" id="password"></h4>
        
        <input type="submit" value="Submit">
      </form>
    </div>
 

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('include/connect.php');

    $username = $_POST['username'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];
    try {
      if (empty($username) ||
        empty($pass) ||
        empty($confirm))
        throw new Exception('Enter all
          fields.');
      if ($pass != $confirm)
        throw new Exception('Passwords must match.');


      $result = $con->query(
        "SELECT * FROM users 
        WHERE User_Name = '$username'");

      if ($result->num_rows > 0) {
        throw new Exception('Username already taken. Please choose another one.');
      }
            
      // encrypt password
      $pass = $con->real_escape_string(
        password_hash($pass, PASSWORD_BCRYPT));
      
      // insert into db
      $query = "INSERT INTO users(
        user_name, pass, join_date)
        VALUES ('$username', '$pass',
          now())";
      if ($con->query($query)) {
        echo '<div class ="confirm">User created successfully. Click the Sign In link to begin!</div>';
      }
      else {
        echo 'Problem saving to database: ' . $con->error;
      }
    }
    catch (Exception $ex) {
      echo '<div class="error">' . $ex->getMessage() . '</div>';
    }
  }
?>
<div class="confirm"> <a href="index2.php"> Sign In </a> </div>

<section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
    <p class="footer_header">FOR THE LATEST NEWS &amp; UPDATES</p>
    <div class="button"><a href="https://www.facebook.com/MP-Records-1869719426386940/" target="new">subscribe</a></div>
  </section>

 </div> 
</body>

</html>