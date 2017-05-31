<?php
  include('include/connect.php');

session_start();

if (!isset($_SESSION['id'])){
    session_destroy();
    header('Location: signin_page.php');
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

<script>
function myFunction()
{
alert("I am an alert box!"); // this is the message in ""
}
</script>

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
            <a href="cart.php">My Cart </a>
            <a href="logout.php">Log Out</a>
        </div> 
<div id = "MusicSearch">
<h4>Search For Artist</h4>
<h4>To see all artist, leave search blank.</h4> 
</div>
<div id="search">
<form  method="post" action="get-records.php?go"  id="searchform"> 
<input  type="text" name="artistName"> 
<input  type="submit" name="submit-form" value="Search"> 
</div>
<?php 

     if(isset($_POST['submit-form'])){ 
        $artistName = $_POST['artistName'];
     if(isset($_GET['go'])){ 
     $search = preg_match("/^[A-Za-z]+/", $_POST['artistName']);
try{      
      include 'include/connect.php';

     $sql = "SELECT artistName, albumName, albumID, cost, stock FROM album inner join artist on album.artistID = artist.artistID WHERE artistName like '%$artistName%'";

    $result = $con->query($sql);

     if (mysqli_num_rows($result)>0) {
        echo '<table><tr><th>Artist</th><th>Album</th><th>Cost</th><th>Stock</th><th>Quantity</th></tr>';
     }
    
     


        while ($row = $result->fetch_array()) { 

            $artistName=$row['artistName'];
            $albumName=$row['albumName'];
            $cost=$row['cost'];
            $albumID=$row['albumID'];
            $stock=$row['stock'];

            echo '<tr>';
            echo '<td>' . $artistName . '</td>';
            echo '<td>' . $albumName . '</td>';
            echo '<td>'."$" . $cost . '</td>';
            echo '<td>' . $stock . '</td>';
        ?>
            <td><form method="post" action="">
                 <input type="hidden" name="albumID[<?php  echo $row['albumID']; ?>]" value="<? echo $row['albumID']; ?>"></input>
                 <input type="hidden" name="stock[<?php  echo $row['albumID']; ?>]" value="<?php echo $row['stock']; ?>"></input>
                 <input type="number" class="qtymobile"min="1" name="quantity[<?php  echo $row['albumID']; ?>]" value="<?php echo $row['quantity']; ?>"></input> 
                 <input  type="submit" name="purchase-form" value="Purchase" <?php if ($stock <= '0'){ ?> disabled <?php   } ?>/></form></td>       

    <?php

    } 
    echo "</table>"; 
        if (mysqli_num_rows($result)<=0)
          throw new Exception ("Artist Not Found. Please Try Again.");  

        }catch (Exception $e) {
         echo '<div class="error">',  $e->getMessage(), "\n";

        
        } 
        
    } 
}   
     

//Update stock when an album is purchased 
      
      if(isset($_POST['purchase-form'])){
     
        foreach($_POST['albumID'] as $key => $id){
            $inStock = mysqli_real_escape_string($con, $_POST['stock'][$key]); 
            $quan = mysqli_real_escape_string($con, $_POST['quantity'][$key]);
            $user_id = mysqli_real_escape_string($con, $_SESSION['id']);
          
             $q1 = "UPDATE album SET stock = stock-'$quan' WHERE albumID = '$key' and stock > 0";

            //Update cart 
             $q2 = "INSERT INTO cart_items (albumID, quantity, user_id) values('$key', '$quan', '$user_id') ON DUPLICATE KEY UPDATE albumID='$key', quantity='$quan'"; 

  if(!empty($quan) && !ctype_alpha( $quan )){       
    
    try{
          if($inStock < $quan)
            throw new Exception ("Sorry, only " .$inStock. " available.");   

            $result1 = $con->query($q1);
            $result2 = $con->query($q2);

            echo '<div class ="confirm">Succesfully added to cart!</div>';

            if (!$result1 || !$result2)
            echo "Error, please connect to database " . mysqli_error($con); 
        }
          catch (Exception $e) {
          echo '<div class="error">',  $e->getMessage(), "\n";
    }                      
  } else{ 
         echo '<div class ="error">Please select a quantity.</div>';
        }                      
  }
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