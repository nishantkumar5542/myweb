<?php
session_start();
include '../config.php';
error_reporting(0);
// Check if user is already logged in
if(isset($_SESSION['teleid'])) {
    header("Location: ../index.php");
    exit;
}

// Check if Telegram ID is set
if(isset($_POST['teleid'])) {
    // Validate the Telegram ID (you may want to do additional validation)
    $teleid = $_POST['teleid'];
    
    // Check if the Telegram ID exists in the database
    $sql = "SELECT * FROM users WHERE teleid = '$teleid'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Telegram ID exists, store it in the session
        $_SESSION['teleid'] = $teleid;
        
        // Redirect to the index page
        header("Location: ../index.php");
        exit;
    } else {
      $msg = "User id not registered";
        }
    } else {
    $mag = "Error: Telegram ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>X CHECKER</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/hyper.css?v=1.2" />
    <link rel="stylesheet" href="../css/new.css" />
</head>
<body> 
 <div class="uk-section uk-section-muted" style="padding:3px">
    <center>
        <div class='logo_large'></div>
                       <h1 class="uk-article-title">BADBOY CHECKER</h1>
                        </center>
        <div class="uk-container">
            <div class="uk-background-default uk-border-rounded uk-box-shadow-small">
                <div class="uk-container uk-container-xsmall uk-padding-large">
                    <article class="uk-article">
                        <br>
                        <h1 class="uk-article-title">BADBOY ACCESS</h1>
                        <div class="uk-article-content">
                            <p class="uk-text-lead uk-text-muted" >Register here<a href="https://t.me/badboyriobot" class="access_link">here</a></p>
                <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="">
                                <div class="uk-margin-bottom">
                                                        <h5 class="uk-article-title danger"><?php echo $msg ?></h5>
                                        <input id="teleid" class="hyper_input uk-input uk-border-rounded" name="teleid" type="text" placeholder="Enter Telegram ID Here" required>
                                    </div>
                                </div>
<br>
                                <div class="uk-text-center">
                                    <input class="uk-button uk-button-primary uk-border-rounded button-nex" style="-webkit-tap-highlight-color: transparent;" name="login" id="login" type="submit" value="Access">
                                </div>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>



<div id="offcanvas-docs" data-uk-offcanvas="overlay: true">
  <div class="uk-offcanvas-bar">
    <button class="uk-offcanvas-close" type="button" data-uk-close></button>
    <h5 class="uk-margin-top">Contact us</h5>
    <ul class="uk-nav uk-nav-default doc-nav">
      <li class="uk-active"><a href="https://t.me/type_xz">Join Group</a></li>
      <li><a href="https://t.me/ccChecker_scripts">Join Channel</a></li>
    </ul>
  
  </div>
</div>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="index.html">Flex</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top uk-text-center">
      
    </ul>
    <div class="uk-margin-top uk-text-center">
      <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
        <div>
          <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="uk-section uk-text-center uk-text-muted">
	<div class="uk-container uk-container-small">
		<div>
			<ul class="uk-subnav uk-flex-center">
	
				<li><a href="https://t.me/badboychx">Support</a></li>
				<li><a href="https://t.me/badboychx">Contact</a></li>
			</ul>
		</div>

		<div class="uk-margin-medium uk-text-small uk-link-muted">Crafted by <a  
				href="t.me/badboychx">BADBOY</a></div>
	</div>
</footer></body>
</html>