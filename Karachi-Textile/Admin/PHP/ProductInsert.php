<?php


if (isset($_POST['p_submit'])) 
{
 

      require_once("./DBConn.php");
      $db = new dbconn();

      $p_title = $_POST["p_title"];
      $p_cat = $_POST["p_cat"];
      $p_detail = $_POST["p_detail"];
	
      $p_image = $_FILES['p_image']['name'];
     
      // echo "
      // <script>
      // alert('$p_image');
      // </script>
      // ";
     
      $ext = pathinfo($p_image,PATHINFO_EXTENSION);
      $newImage = rand().time().'.'.$ext;

      move_uploaded_file($_FILES['p_image']['tmp_name'],"./Uploads/".$newImage);


      $array = [ $p_title , $p_cat , $newImage , $p_detail ];

      $msg = $db->ProductInsert($p_title , $p_cat , $newImage , $p_detail);
      ($msg == true)
      ?
            header("Location:../products.php?add=1&title=$p_title")

      :    
            header("Location:../products.php?add=0&title=$p_title");
            
}

?>

