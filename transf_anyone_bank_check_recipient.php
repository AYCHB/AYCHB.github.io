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

    
 if(!isset($_SESSION['login']))
    {
     header('Location: index.php');
      }


   else
    {

$idletime=898;//after 60 seconds the user gets logged out

if (time()-$_SESSION['timestamp']>$idletime)
   {
    session_destroy();
    session_unset();
     }

  else
    {
    $_SESSION['timestamp']=time();
     }


 if (isset($_POST['transfer_anyone_bank'])) 
      {

    require_once('__SRC__/connect.php');


  if (class_exists('DATABASE_CONNECT'))
       {
 
        $obj_conn  = new DATABASE_CONNECT;
            
        $host = $obj_conn->connect[0];
        $user = $obj_conn->connect[1];
        $pass = $obj_conn->connect[2];
        $db   = $obj_conn->connect[3];

 
       $conn = new mysqli($host,$user,$pass,$db);
 
          if ($conn->connect_error)
               {
                die ("Cannot connect " .$conn->connect_error);
                 }


         else
           {

          require_once('__SRC__/secure_data.php');

          if (class_exists('SECURE_INPUT_DATA_AVAILABLE'))
              {

            $obj_secure_data = new SECURE_INPUT_DATA;


             // get personal details from user

              $firstname     =   $obj_secure_data->SECURE_DATA_ENTER($_POST['firstname']);
              $lastname      =   $obj_secure_data->SECURE_DATA_ENTER($_POST['lastname']);                 
              $IBAN          =   $obj_secure_data->SECURE_DATA_ENTER($_POST['IBAN']);
            


               $sql = "select firstname, lastname, IBAN from accounts
                       where IBAN = '$IBAN' and account_statement = 'active' ";
               $result = $conn->query($sql);


                   if ($result->num_rows>0)
                       {

                while  ($row = $result->fetch_assoc())
                            {
                  
                             $firstname0  = $row['firstname'];
                             $lastname0   = $row['lastname'];   
                             $IBAN0       = $row['IBAN'];
     

               if ($firstname0 == $firstname &&  $lastname0 == $lastname && $IBAN0 == $IBAN)           
                         { 
                        
                          }

                 else  
                   {
                   echo"
                     <div class='alert alert-danger' role='alert'>
                     <strong> Your elements is invalid </strong> Please try again.
                     </div>";
                   exit;
                     }  


                   } // end of while


                 } // end of result



               else  
                 {
                 echo"
                   <div class='alert alert-danger' role='alert'>
                    <strong> Your elements is invalid </strong> Please try again.
                    </div>";
                  exit;
                   }  



                } // end of secure data input


               } // end of else for connect



            } // end of if for calss exists


        } // end of if isset post transfer button


    } // end of else session login


?>

