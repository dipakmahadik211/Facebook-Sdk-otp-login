<?php
// function to verify session status
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
// verifying POST data and adding the values to session variables
if(isset($_POST["code"])){
  session_start();
  $_SESSION["code"] = $_POST["code"];
  $_SESSION["csrf_nonce"] = $_POST["csrf_nonce"];
  $ch = curl_init();
  // Set url elements
  $fb_app_id = '404404246795576';
  $ak_secret = '9068d16a906ae809c3a332b9354da773';
  $token = 'AA|'.$fb_app_id.'|'.$ak_secret;
  // Get access token
  $url = 'https://graph.accountkit.com/v1.0/access_token?grant_type=authorization_code&code='.$_POST["code"].'&access_token='.$token;
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,$url);
  $result=curl_exec($ch);
  $info = json_decode($result);
  // Get account information
  //print_r($info);
  $appsecret_proof= hash_hmac('sha256', $info->access_token, $ak_secret); 
  $url = 'https://graph.accountkit.com/v1.0/me/?access_token='.$info->access_token.'&appsecret_proof='.$appsecret_proof;
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,$url);
  $result=curl_exec($ch);
  curl_close($ch);
  $final = json_decode($result);  
}
?>
<html>
<head>
  <title>Login with Account Kit</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="ak-icon.png">
  <link rel="stylesheet" href="css.css">
  <!--Hotlinked Account Kit SDK-->
  <script src="https://sdk.accountkit.com/en_EN/sdk.js"></script>
</head>
<body>
<?php
// verifying if the session exists
if(is_session_started() === FALSE && !isset($_SESSION)){
?>
<h1 class="ac">Login with Account Kit</h1>
<p class="ac">This example shows you how to implement<br>Facebook Account Kit for web using PHP.</p>
<div class="buttons">
  <button onclick="phone_btn_onclick();">Login with SMS</button>
  <button onclick="email_btn_onclick();">Login with Email</button>
</div>
<form action="" method="POST" id="my_form">
  <input type="hidden" name="code" id="code">
  <input type="hidden" name="csrf_nonce" id="csrf_nonce">
</form>
<?php
}else{
?>
<h1 class="ac">Login with Account Kit</h1>
<p class="ac">The session with Facebook Account Kit is already started.</p>
<h3 class="ac">Your Information</h3>
<p class="ac">
  <!-- show account information -->
  <!--<strong>ID:</strong> <?=$final->id?> <br>-->
  <?php
  if(isset($final->email)){
  ?>
  <strong>Email:</strong> <?=$final->email->address?>
  <?php
  }else{
  ?>
  <!--<strong>Country Code:</strong> +<?=$final->phone->country_prefix?> <br>
  <strong>Phone Number:</strong> <?=$final->phone->national_number?> -->


  <?php
  $mobile=$final->phone->national_number;
  $_SESSION['mobileno']=$mobile;
  header('location:index.html');
  }
  ?>  
</p>
<div class="buttons">
  <button onclick="logout();">Logout</button>
</div>
<?php
}
?>
</body>
<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:404404246795576,         
        state:"abcd", 
        version:"v1.0"
      }
      //If your Account Kit configuration requires app_secret, you have to include ir above
    );
  };
  // login callback
  function loginCallback(response) {
    console.log(response);
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      document.getElementById("code").value = response.code;
      document.getElementById("csrf_nonce").value = response.state;
      document.getElementById("my_form").submit();
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      console.log("Authentication failure");
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
      console.log("Bad parameters");
    }
  }
  // phone form submission handler
  function phone_btn_onclick() {
    // you can add countryCode and phoneNumber to set values
    AccountKit.login('PHONE', {}, // will use default values if this is not specified
      loginCallback);
  }
  // email form submission handler
  function email_btn_onclick() {  
    // you can add emailAddress to set value
    AccountKit.login('EMAIL', {}, loginCallback);
  }
  // destroying session
  
</script>
</html>
