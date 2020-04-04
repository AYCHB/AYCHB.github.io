<?php

/*
 * Copyright (c) 2015 - 2020 Jean Wallet
 * Copyright (c) 2015 - 2020 The AYCHDeveloper
 * Distributed under the MIT software license, the AGPL-3.0 or later, see the accompanying
 * file LICENSE or http://www.opensource.org/licenses/mit-license.php.
 * file LICENSE or https://www.gnu.org/licenses.
 *
 * This is an online-banking developed by AYCHDeveloper. It is initially built in the banking system for our local businesses.
 * AYCHBank is used under the terms of the GNU Affero General Public License version 3.0 or later. When dealing with international registration and transaction, AYCHBank shall follow the IFM regulations and the common bank security requirements. Whenever it is distributed to the third party for use 
 * it is served as a SaaS provided by AYCH inc with relevant license and regulations. (It is also restricted to redistribute the AYCHBank software. It is not recommended to resided it without a notice permission from AYCH inc.
 *
 * AYCHBank is not a game. It is used for online transaction is used in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

 session_start();

?>


<html>
<head>


<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="index.css"> 



<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
      

</style>
 


</head>



<body>


 <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12">

      <img src="logo.png" class="img-responsive" height="280px;" width="280px;">
      <div class="row">
        <h3 class="text-center" style="padding-right: 80px;"> AYCHBank </h3>
      </div>


      <div class="row">
           <form action="" method="post">
          <div class="input-group col-xs-9 col-sm-9 col-md-9">

            <input type="password" placeholder="Password" name="password" class="form-control">

          <div class="input-group-btn">
            <button class="btn btn-md btn-default btn-block" name="submit">
               <span class="glyphicon glyphicon-arrow-right"></span>
           </button>
          </div>

          </div>

      </div>
  </div>





</body>
</html>


<?php
 
$allow= ip2long("127.0.0.1"); // for mozilla browser, chrome, metamask
$allow2 = ip2long("::1"); // for chrome browser
$ip = ip2long($_SERVER['REMOTE_ADDR']); // ip tou client
$location = '/error'; // edw stelnw ton spam xrhsth
if ($ip!=$allow & $ip !=$allow2)
 {
//stelnw se allo url
header ('HTTP/1.1 301 Moved Permanently');
header ('Location: '.$location);
}
else
  {
  if(isset($_POST['submit']))
  {
  $pass="easybank";
  $password=$_POST['password'];
   if($password==$pass)
      {
         $_SESSION['login']="aychbank";
        header('Location: home.php');
        }
     else
      {
       echo '<script type="text/javascript">alert("Sign in control panel error");
         </script>';
       }
} // kleisimo ths isset
 
} //kleisimo ths megalhs else gia elenxo ths ip
?>
