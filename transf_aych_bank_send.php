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



  if (isset($_POST['transfer_aych_bank'])) 
      {

error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);


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

              $firstname          =   $obj_secure_data->SECURE_DATA_ENTER($_POST['firstname']);
              $lastname           =   $obj_secure_data->SECURE_DATA_ENTER($_POST['lastname']);                 
              $account_no         =   $obj_secure_data->SECURE_DATA_ENTER($_POST['account_no']);
              $main_amount        =   $obj_secure_data->SECURE_DATA_ENTER($_POST['main_amount']);
              $secondary_amount   =   $obj_secure_data->SECURE_DATA_ENTER($_POST['secondary_amount']);
              $total_amount       =   $main_amount ."." .$secondary_amount;
   
   
              
              $sql = "select total_balance from accounts where email = '".$_SESSION['login']."' ";
              $result  = $conn->query($sql);
 
                   while ($row = $result->fetch_assoc())
                      {

                       $total_balance = $row['total_balance'];
                      // $total_balance2 = number_format($total_balance, 2, '.', '');
                       // echo $total_balance2;

                         if ($total_amount > $total_balance)
                            { 
            echo '<script type="text/javascript">alert("You do not have enough balance to do this transfer.");
                </script>';
                              }


                      else if ($total_amount <= $total_balance)
                          {

                 $sql2 = "update accounts set amounts_transferred = amounts_transferred + $total_amount,
                          total_balance = total_balance - $total_amount
                          where email = '".$_SESSION['login']."'";
                 $result2  = $conn->query($sql2);


                 $sql3 = "update accounts set amounts_from_others = amounts_from_others + $total_amount ,
                          total_balance = total_balance + $total_amount
                          where firstname = '$firstname' and lastname= '$lastname' and account_no = '$account_no' ";
                 $result3  = $conn->query($sql3);
                

                          //  if ($result2 == true && $result3 == true)
                                // {
                            
                                 // }
               
                              } // end of else


                           else
                             {
                              exit;
                              }
        
     
                       } // end of while
             


            
        



                   //else
                    // { 
                      //exit;
                       //}



                } // end of secure data input


               } // end of else for connect



            } // end of if for calss exists


        } // end of if isset post transfer button


    } // end of else session login

?>
