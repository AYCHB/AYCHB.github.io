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


   $length_bank_code = 2;
   $number_bank_code = substr(str_shuffle("0123456789"),0, $length_bank_code);

   echo $number_bank_code ."<br>";


   $length_account = 10;
   $account_number = substr(str_shuffle("0123456789"),0, $length_account);


    echo $account_number ."<br>";


     

   $bank_iso = "EB";
   $bank_code = $number_bank_code;
   $bank_identity = "1411";
   $bank_acc_begin =  substr($account_number, 0, -7);
   $bank_default_number = "000000";
   $bank_account_user =  $account_number;

   
     $iban_check = $bank_identity .$bank_acc_begin .$bank_default_number .$bank_account_user .$bank_identity .$bank_code;

      $iban_check = $iban_check / 97;
      
      $iban_check =  substr($iban_check, 0, -15);


      echo  $iban_check ."<br>";

      if($iban_check > 1 && $iban_check < 1.9)
        {

    $IBAN = $bank_iso .$bank_code .$bank_identity .$bank_acc_begin .$bank_default_number .$bank_account_user;
 
       echo $IBAN;       
  
          }





    else
      {

      echo "DO not generate iban";

       }

   

?>
