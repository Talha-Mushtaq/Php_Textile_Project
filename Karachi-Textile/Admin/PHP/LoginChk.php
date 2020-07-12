<?php
      require_once("./DBConn.php");
      $db = new dbconn();

session_start();

if(isset($_POST['loginButton']))
{

	if( empty($_POST['email']) || empty($_POST['password']) ) 
   {
       header("Location:../login.php?Empty=Please fill all fields");
	   // echo "Please enter correct username or password";
   }
   else
   {  

            $data=$db->Login();
            $email = $password = "";
            foreach($data as $d)
               {
                  $email = $d['EMAIL'] ;
                  $password = $d['PASSWORD'];
               }
            
               if( ($_POST['email']==$email) && ($_POST['password']==$password) )   
               {
                  $_SESSION['email'] = $_POST['email'] ; 
                  header("Location:../index.php");
               }
               else
               {
                  header("Location:../login.php?Error=Please enter correct username or password");
               }
   }

}


?>
