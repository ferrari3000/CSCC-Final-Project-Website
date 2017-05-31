<?php
  include('include/connect.php');

session_start();

$_SESSION['total'] = $total;
if (!isset($_SESSION['id'])){
    session_destroy();
    header('Location: signin_page.php');
}

    function asDollars($value) {
      return '$' . number_format($value, 2);
      }
?>


<!doctype html>
<link rel="stylesheet" href="include/style.css" />
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Records</title>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
  <!-- Logo Section -->
  <section class="hero" id="hero">
    <div> <a href="index.php"> <img id="logo" src="img/m_and_p_logo.png" alt="M & P Logo"></a> <img id="slogan" src="img/m_and_p_slogan.png" alt="M & P Slogan"> </div>
  </section>

<div class="container">
  <!-- Navigation -->
  <header> <a href="">
    <h4 class="logo"></h4>
    </a>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="aboutUs.php">ABOUT US</a></li>
        <li><a href="get-records.php">RECORDS</a></li>
        <li> <a href="contact.php">CONTACT</a></li>
      </ul>
    </nav>
  </header>
<div class="greeting">
            <span>Logged in as: <?=$_SESSION['username']?></span>
            <a href="cart.php">My Cart</a>
            <a href="logout.php">Log Out</a>
        </div>

<h4 class = "confirm"> My Cart </h4>

<?php try{      
      include 'include/connect.php';

     $sql ="SELECT * from album inner join cart_items on album.albumID = cart_items.albumID";

    $result = $con->query($sql);

  //   if (mysqli_num_rows($result)>0 && $_SESSION['id']){
  //      echo '<h4 class = "confirm"> My Cart </h4>';
  //      echo '<table><tr><th>Album</th><th>Quantity</th><th>Cost</th><th>Keep?</th></tr>';
  //   }
        $total = 0;     
        $Tax = .0675;
        $finalPrice = 0;    
        while ($row = $result->fetch_array()) { 

            $albumName=$row['albumName'];
            $cost=$row['cost'];
            $albumID=$row['albumID'];
            $quantity=$row['quantity'];
            $user_id=$row['user_id'];

          if($user_id == $_SESSION['id']){ 

            $price = $quantity*$cost;  
            $finalPrice = $price + $finalPrice;
            $total =($finalPrice * $Tax) +$finalPrice;
            $_SESSION['total'] = $total;

            echo '<table><tr><th class="title">Album</th><th class="small">Quantity</th><th class="small">Cost</th><th class="center">Keep?</th></tr>';
            echo '<tr>';
            echo '<td>' . $albumName . '</td>';
            echo '<td>' . $quantity . '</td>';
            echo '<td>'."$" . $cost . '</td>';?>      
            <td class="center"><form method="post" action="">
                  <input type="hidden" name="cartID[<?php echo $row['cart_item_id']; ?>]" value="<? echo $row['cart_item_id']; ?>"></input>
                  <input type="hidden" name="albumID[<?php echo $row['albumID']; ?>]" value="<? echo $row['albumID']; ?>"></input>
                  <input type="hidden" name="quantity[<?php echo $row['albumID']; ?>]" value="<?php echo $row['quantity']; ?>"></input> 
<input  type="submit" name="cart-form" value="Remove" onClick="javascript: return confirm('Are you sure you want to remove this item?');"></input></form></td>
<?php ob_start(); }
}echo'</tr></table>';   

        }catch (Exception $e) {
         echo '<div class="error">',  $e->getMessage(), "\n";
       } 

       if(isset($_POST['cart-form'])){
     
          foreach($_POST['albumID'] as $key => $id){ 

            $quan = mysqli_real_escape_string($con, $_POST['quantity'][$key]);
            $q = "UPDATE album SET stock = stock + '$quan' WHERE albumID = '$key'";

              try{
              
                  $result = $con->query($q); 
                  if (!$result) 
                  echo "Error, please connect to database " . mysqli_error($con);
                }
                catch (Exception $e) {
                echo '<div class="error">',  $e->getMessage(), "\n";
              }
          } 

          foreach($_POST['cartID'] as $key => $id){

              $q1 = "DELETE from cart_items where cart_item_id = '$key'";
                  header("Location: cart.php");
                  
          try{
            $result1 = $con->query($q1); 
            if (!$result1) 
            echo "Error, please connect to database " . mysqli_error($con);
          }
          catch (Exception $e) {
          echo '<div class="error">',  $e->getMessage(), "\n";
        }
      }  
    }
if(mysqli_num_rows($result)>0 && $total > 0){

    echo '<form method="post" action="process-order.php" id="checkout">';
    echo '<hr />';
    echo '<h4> Price: '. asDollars($finalPrice) .'<br/>(Tax): '.$Tax.' % </br>'.'Total: '. asDollars($total) .'</h4>';
    echo '<input  type="submit" name="total-form" value="Checkout"/></form>';
    echo '</form>';
    echo '<br/><br/>';
} 
?> 

</div>
<div class="confirm">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($responseText)) echo $responseText; ?>
</div>
</div>
</body>

<div id = "footer"><a href="FAQ.php">FAQ</a>&nbsp;&nbsp;&nbsp;<a href="feedback.php">Feedback</a></div>
<!-- Footer Section -->
<?php include 'footer.html' ?>
<!-- Main Container Ends -->
</html>