<?php // Do not put any HTML above this line

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}


$mertgursoyName = "mert.gursoy";
$mertgursoyPass = '5e78c08bdde7030c4f0b809b';

$kiristinName = "kiristin.okke";
$kiristinPass = '5f68c3dbd33d7600773444fb';

$hamzaName = "hamza.kiyak";
$hamzaPass = '5e6f8c31b2e0f80c43c6f6ea';

$cagilName = "cagil.degermen";
$cagilPass = "6059b81a557b95006867183c";

$angelicaName = "angelica.popescu";
$angelicaPass = "5d88c648451d360dc465b967";


$vladName = "vlad.nastasa";
$vladPass = "5d88c648e4b7210dd0a60923";

$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['userEmail']) && isset($_POST['userPassword']) ) {
    if ( strlen($_POST['userEmail']) < 1 || strlen($_POST['userPassword']) < 1 ) {
        $failure = "User name and password are required";
    } else {

      $checkName = (string) $_POST['userEmail'];
      $checkPass = (string) $_POST['userPassword'];


      if ( $checkName == $mertgursoyName && $checkPass == $mertgursoyPass ) {

          header("Location: xs.php?user=".urlencode($_POST['userEmail']).urlencode($_POST['userPassword']));
          return;
      } else if ( $checkName == $kiristinName && $checkPass == $kiristinPass ) {
          header("Location: xs.php?user=".urlencode($_POST['userEmail']).urlencode($_POST['userPassword']));
          return;
      } else if ( $checkName == $hamzaName && $checkPass == $hamzaPass ) {
          header("Location: xs.php?user=".urlencode($_POST['userEmail']).urlencode($_POST['userPassword']));
          return;


      } else if ( $checkName == $cagilName && $checkPass == $cagilPass ) {
          header("Location: xs.php?user=".urlencode($_POST['userEmail']).urlencode($_POST['userPassword']));
          return;


      } else if ( $checkName == $angelicaName && $checkPass == $angelicaPass ) {
          header("Location: xs.php?user=".urlencode($_POST['userEmail']).urlencode($_POST['userPassword']));
          return;


      } else if ( $checkName == $vladName && $checkPass == $vladPass ) {
          header("Location: xs.php?user=".urlencode($_POST['userEmail']).urlencode($_POST['userPassword']));
          return;





        } else {
            $failure = "Incorrect password";
        }



    }
}


?>



<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Login Page</title>
<title> XS FORM LOGIN PAGE</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->



<script>
function stopRKey(evt) {
var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
  if ((evt.keyCode == 13) && (node.type=="number"))  {return false;}
    if ((evt.keyCode == 13) && (node.type=="password"))  {return false;}
      if ((evt.keyCode == 13) && (node.type=="date"))  {return false;}
        if ((evt.keyCode == 13) && (node.type=="radio"))  {return false;}
}


document.onkeypress = stopRKey;
</script>




<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>


<form method="post" enctype="multipart/form-data">

  <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					XS <br> JRA Login
				</span>
        <?php
        if ( $failure !== false ) {
            echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
        }
        ?>


        <!--userEmail-->
				<div class="wrap-input100 validate-input" data-validate = "Please enter your Jira account name">
					<input class="input100" type="text" name="userEmail" id="nam" placeholder="Jira Account Name">
					<span class="focus-input100"></span>
				</div>

        <!--userPassword-->
				<div class="wrap-input100 validate-input" data-validate = "Please enter a Password">
					<input class="input100" type="password"  id="id_1723" name="userPassword" placeholder="Password">
					<span class="focus-input100"></span>
				</div>





				<div class="container-contact100-form-btn">
					<button type="submit" name="submitValue"  value="Submit" class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Log in
						</span>
					</button>
          <!-- <button type="submit" name="cancel" value="Cancel" class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Log out
						</span>
					</button>
          -->
				</div>
			</form>
		</div>
	</div>


</form>


<br>





<!--===============================================================================================-->
<!--===============================================================================================-->
<!--Tag Input-->
<link rel="stylesheet" type="text/css" href="css/tagInput.css">

</body>
</html>
