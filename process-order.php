<?php
session_start();

if (!isset($_SESSION['id'])){
    session_destroy();
    header('Location: signin_page.php');
}

include('include/connect.php');
include('process-validation.php');
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
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



<?php
    $formFName = '';
    $formLName = '';
    $formAddress = '';
    $formAddress2 = '';
    $formCity = '';
    $formState = '';
    $formZip = '';
    $formAddress3 = '';
    $formAddress4 = '';
    $formCity2 = '';
    $formZip2 = '';
    $formCC = '';
    $formCCNum = '';
    $formCCDate = '';
    $formCCV = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (isset($_POST['Fname'])){
	        $formFName = $_POST['Fname'];
	    }

	if (isset($_POST['Lname'])){
	        $formLName = $_POST['Lname'];
	    }
	if (isset($_POST['address'])){
	        $formAddress = $_POST['address'];
	    }
	if (isset($_POST['address2'])){
	        $formAddress2 = $_POST['address2'];
	    }    
	if (isset($_POST['city'])){
	        $formCity = $_POST['city'];
	    }
	if (isset($_POST['state'])){
	        $formState = $_POST['state'];
	    }        
	if (isset($_POST['zip'])){
	        $formZip = $_POST['zip'];
	    }
	if (isset($_POST['address3'])){
	        $formAddress3 = $_POST['address3'];
	    }
	if (isset($_POST['address4'])){
	        $formAddress4 = $_POST['address4'];
	    }    
	if (isset($_POST['city2'])){
	        $formCity2 = $_POST['city2'];
	    }    
	if (isset($_POST['zip2'])){
	        $formZip2 = $_POST['zip2'];
	    }
	if (isset($_POST['cc'])){
	        $formCC = $_POST['cc'];
	    }        
	if (isset($_POST['ccNum'])){
	        $formCCNum = $_POST['ccNum'];
	    }
	if (isset($_POST['exp'])){
	        $formCCDate = $_POST['exp'];
	    }
	if (isset($_POST['ccv'])){
	        $formCCV = $_POST['ccv'];
	    }
}	            
?>



<h1 class = "confirm"> Checkout  </h1>
<hr style="width:60%"> 
<h3 class = "confirm"> Shipping Address  </h3>
<div id = "process">
<form method="post" action="">
  
      <h4><label>First Name*</label>
      <input type="text" name="Fname" id="Fname" value="<?= isset($formFName) ? $formFName : '' ?>" onblur="validateName('Fname')" />
      <span id="FnameError" style="display: none;">Only letters, please.</span></h4>

      <h4><label>Last Name*</label>
      <input type="text" name="Lname" id="Lname" value="<?= isset($formLName) ? $formLName : '' ?>" onblur="validateName('Lname')" />
      <span id="LnameError" style="display: none;">Only letters, please.</span></h4>

      <h4><label>Address*</label>
      <input type="text" name="address" id="address" value="<?= isset($formAddress) ? $formAddress : '' ?>" onblur="validateNameNumber('address')" />
      <span id="addressError" style="display: none;">Only letters and numbers, please.</span></h4> 

      <h4><p>No Second Address
	  <input type="radio" name="radio1" id="r2" value="Show">
	  <br/>Second Address
	  <input type="radio" name="radio1" id="r1" value="Nothing">
      </p></h4>

    <div class="text">  
      <h4><label>Address 2</label>
      <input type="text" name="address2" id="address2" value="<?= isset($formAddress2) ? $formAddress2 : '' ?>" onblur="validateNameNumber('address2')" />
      <span id="address2Error" style="display: none;">Only letters and numbers, please.</span></h4>
    </div>  

      <h4><label>City*</label>
      <input type="text" name="city" id="city" value="<?= isset($formCity) ? $formCity : '' ?>" onblur="validateName('city')" />
      <span id="cityError" style="display: none;">Only letters, please.</span></h4>

       <h4><label>State*</label>
       <select name = "state" id ="state">
       		<option value="" disabled selected style="display: none;">Select</option>	
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District Of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>				
        </select></h4> 

        <h4><label>Zip*</label>
      <input type="text" maxlength="5" name="zip" id="zip" value="<?= isset($formZip) ? $formZip : '' ?>" onblur="validateZip('zip')" />
      <span id="zipError" style="display: none;">5 numeric digits, please.</span></h4>

<hr style="width:110%; border: 2px dashed;">        
       
       <h3 class = "confirm"> Credit Card  </h3>
       <br/>
        <h4><label>Credit Card* </label>
       <select name = "cc" id="cc">
       		<option value="" disabled selected style="display: none;">Select</option>	
			<option id="card1">MasterCard</option>
			<option id="card2">Visa</option>
			<option id="card3">American Express</option>
	   </select></h4>

	   <input type="hidden" id="showCard" />		
	   
	   <script>

	   	$('select').on('change', function validateCCType () {
			    var thisCard = '';

			    switch (this.value) {
			        case 'MasterCard':
			            thisCard = 1;
			            break;

			        case 'Visa':
			            thisCard = 2;
			            break;

			        case 'American Express':
			            thisCard = 3;
			            break;
			    }

			    $('#showCard').val(thisCard);
			});

	   </script>	

	   	<h4><label>Credit Card #*</label>
        <input type="text" maxlength="16" name="ccNum" id="ccNum" value="<?= isset($formCCNum) ? $formCCNum : '' ?>" oninput="validateCCN('ccNum')" />
        <span id="ccNumError" style="display: none;">Not a valid credit card number.</span></h4>

        <h4><label>Expires*</label>
       <select name = "exp" id ="exp">
       		<option value="" disabled selected style="display: none;">Select</option>	
			<option value="0517">05/17</option>
			<option value="0617">06/17</option>
			<option value="0717">07/17</option>
			<option value="0817">08/17</option>
			<option value="0917">09/17</option>
			<option value="1017">10/17</option>
			<option value="1117">11/17</option>
			<option value="1217">12/17</option>
			<option value="0118">01/18</option>
			<option value="0218">02/18</option>
			<option value="0318">03/18</option>
			<option value="0418">04/18</option>
			<option value="0518">05/18</option>
			<option value="0618">06/18</option>
			<option value="0718">07/18</option>
			<option value="0818">08/18</option>
			<option value="0918">09/18</option>
			<option value="1018">10/18</option>
			<option value="1118">11/18</option>
			<option value="1218">12/18</option>
			<option value="0119">01/19</option>
			<option value="0219">02/19</option>
			<option value="0319">03/19</option>
			<option value="0419">04/19</option>
			<option value="0519">05/19</option>
			<option value="0619">06/19</option>
			<option value="0719">07/19</option>
			<option value="0819">08/19</option>
			<option value="0919">09/19</option>
			<option value="1019">10/19</option>
			<option value="1119">11/19</option>
			<option value="1219">12/19</option>
			<option value="0120">01/20</option>
			<option value="0220">02/20</option>
			<option value="0320">03/20</option>
			<option value="0420">04/20</option>
			<option value="0520">05/20</option>
			<option value="0620">06/20</option>
			<option value="0720">07/20</option>
			<option value="0820">08/20</option>
			<option value="0920">09/20</option>
			<option value="1020">10/20</option>
			<option value="1120">11/20</option>
			<option value="1220">12/20</option>
			<option value="0121">01/21</option>
			<option value="0221">02/21</option>
			<option value="0321">03/21</option>
			<option value="0421">04/21</option>
			<option value="0521">05/21</option>
			<option value="0621">06/21</option>
			<option value="0721">07/21</option>
			<option value="0821">08/21</option>
			<option value="0921">09/21</option>
			<option value="1021">10/21</option>
			<option value="1121">11/21</option>
			<option value="1221">12/21</option>
		</select></h4>	

        <h4><label>CCV*</label><input type="Text" maxlength="4" name="ccv" id="ccv"
        value="<?= isset($formCCV) ? $formCCV : '' ?>" oninput="validateCCV('ccv')"/></h4>
        <span id="ccvError" style="display: none;">Please enter a valid CCV.</span></h4>

<script>
$(document).ready(function () {
    $(".text").hide();
    $("#r1").click(function () {
        $(".text").show();
    });
    $("#r2").click(function () {
        $(".text").hide();
    });
    $(".text2").hide();
    $("#r3").click(function () {
        $(".text2").show();
    });
    $("#r4").click(function () {
        $(".text2").hide();
    });
    $(".text3").hide();
    $("#r5").click(function () {
        $(".text3").show();
    });
    $("#r6").click(function () {
        $(".text3").hide();
    });
});
</script>
	   
<h4><p>Same Shipping Address
    <input type="radio" name="radio1" id="r4" value="Show">
    <br/>Different Shipping Address
    <input type="radio" name="radio1" id="r3" value="Nothing">
</p></h4>

<div class="text2">
	<hr style="width:110%; border: 2px dashed;">
</div>
<div class="text2">
	<h4><label>Address</label>
    <input type="text" name="address3" id="address3" value="<?= isset($formAddress3) ? $formAddress3 : '' ?>" onblur="validateNameNumber('address3')" />
      <span id="address3Error" style="display: none;">Only letters and numbers, please.</span></h4> 
</div>

  <div class ="text2">	
	  <h4><p>No Second Address
	  <input type="radio" name="radio1" id="r6" value="Show">
	  <br/>Second Address
	  <input type="radio" name="radio1" id="r5" value="Nothing">
      </p></h4>
  </div>    

  <div class="text3">
	<h4><label>Address 2</label>
    <input type="text" name="address4" id="address4" value="<?= isset($formAddress4) ? $formAddress4 : '' ?>" onblur="validateNameNumber('address4')" />
      <span id="address4Error" style="display: none;">Only letters and numbers, please.</span></h4> 
  </div>

<div class="text2">
   <h4><label>City</label>
      <input type="text" name="city2" id="city2" value="<?= isset($formCity2) ? $formCity2 : '' ?>" onblur="validateName('city2')" />
      <span id="city2Error" style="display: none;">Only letters, please.</span></h4> 
</div>
<div class="text2">
	<h4><label>State </label>
       <select name = "state" id ="state">
       		<option value="" disabled selected style="display: none;">Select</option>	
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District Of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>				
        </select></h4>
</div>
<div class="text2">
	  <h4><label>Zip</label>
      <input type="text" maxlength="5" name="zip2" id="zip2" value="<?= isset($formZip2) ? $formZip2 : '' ?>" onblur="validateZip('zip2')" />
      <span id="zip2Error" style="display: none;">5 numeric digits, please.</span></h4>
</div>
       <input type="submit" name ="done" id ="done" value="Process" onClick="javascript: return confirm('Are you sure you want to checkout?');"/>          
</form> 
</div>                             	

<?php
ob_start();
	if(isset($_POST['done'])){
	  try{
	  	
		if(empty($formFName) || empty($formLName) || empty($formAddress) || empty($formCity) || empty($formState) || empty($formZip) || empty($formCC) || empty($formCCNum) || empty($formCCDate) || empty($formCCV))

		echo '<div class="error"> Please fill out all required* fields to process.</div>';
			
	  }catch(Exception $e){
	  	echo '<div class="error">',  $e->getMessage(), "\n";
	  }	

	  	$q = "DROP TABLE IF EXISTS cart_items";
	  	$q1 = "CREATE TABLE cart_items (
  		cart_item_id int(10) primary key NOT NULL auto_increment,
  		albumID int(10) unsigned ,
  		user_id int(10) NULL,
  		quantity int(10) unsigned NULL,
  		FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
  		)";

	  	$result = $con->query($q);
	  	$result1 = $con->query($q1);

	  		if(!$result || !$result1){

				print(mysql_error());
			}
	
	if(!empty($formFName) || !empty($formLName) || !empty($formAddress) || !empty($formCity) || !empty($formState) || !empty($formZip) || !empty($formCC) || !empty($formCCNum) || !empty($formCCDate) || !empty($formCCV)){
	echo "<script>";
	echo "window.location.href = 'thankyou.php'";
	echo "</script>";
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