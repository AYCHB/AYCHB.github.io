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

    
 if(!isset($_SESSION['step1']))
    {
     header('Location: page-register.php');
      }


 else if(!isset($_SESSION['step2']))
    {
     header('Location: page-register.php');
      }

 

?>



<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> AYCHBank </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico"> 

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->


<style>
body {
    background-image: url("/images/bg1.jpg");
    background-repeat: no-repeat, repeat;
    background-size: 100%;
}


 /* For id document */

.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}




.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload
{
height: 40%;
width: 100%;
}


</style>




<script>

$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});


</script>






<script type = 'text/javascript' >
function changeHashOnLoad() 
{
     window.location.href += '#';
     setTimeout('changeHashAgain()', '50'); 
}
 
function changeHashAgain()
 {
  window.location.href += '1';
}
 
var storedHash = window.location.hash;
window.setInterval(function () 
{
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);
window.onload=changeHashOnLoad;
</script> 




</head>



<body onload="doLogout(); return false;">



    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                      <!--  <img class="align-content" src="images/logo.png" alt=""> -->
                      <h2 align="center"> <font color="white"> <b> AYCH BANK ACCOUNT </b> </font> </h2>
                    </a>
                </div>
                <div class="login-form"  style="width: 550px; position: relative; left: 0%;">
                    <form action="" method="post" enctype="multipart/form-data">

                      
                      <h2 align="center"> <font color="black"> <b> Step 3: Your documents </b> </font> </h3>
                          <hr>

                         


              <div class="container">
                 <div class="col-md-12">
                   <div class="form-group">

                   <div align="center"> <label> Front image of identity </label> </div>
                    <div class="input-group">
                      <span class="btn btn-default btn-file glyphicon glyphicon-open-file">
                    Browse… <input type="file" name="identity_front" id="imgInp" required>
                   </span>
                  <input type="text" class="form-control" readonly>
               </div>
             <img id='img-upload'/>
            </div>

          </div>
        </div>

                      <div class="wrapper">
                         <span class="group-btn">     
                       <button type="submit" name="submit_step3" class="btn btn-primary btn-flat m-b-30 m-t-30"> 
                          Next step <i class="glyphicon glyphicon-menu-right"></i>
                      </button>
                        </span>
                         </div>

                    </form>
                </div>
            </div>
        </div>
    
