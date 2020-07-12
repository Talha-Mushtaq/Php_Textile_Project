<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script> -->
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  
<?php




if (isset($_POST['update'])) 
{

  require_once("./DBConn.php");
  $db = new dbconn();
  
  $preId = $_POST['id'];
  $title = $_POST['p_title'];
  $cat = $_POST['p_cat'];
  $img = $_POST['imagePathName'];
  $det = $_POST['p_detail'];

  $v = substr($img,0,1);
  $preImg = substr($img,1);
  $msg = false;
  $chk = "true";
  $newImage="" ;


  if($v == 'p')
  {
    $newImage = $preImg ;
  }
  else
  {
        $p_image = $_FILES['p_image']['name'];
        $ext = pathinfo($p_image,PATHINFO_EXTENSION);
        $createImage = rand().time().'.'.$ext;       
        move_uploaded_file($_FILES['p_image']['tmp_name'],"./Uploads/".$createImage);
        $newImage = $createImage;
  }  



              // editProduct($db,$chk,$msg,$preId,$title,$cat,$newImage,$det);

            // function editProduct($db,$chk,$msg,$preId,$title,$cat,$newImage,$det)
            // {
            

                if ( $chk == "true") 
                {
                
                  $msg =  $db->ProductEdit($preId,$title , $cat , $newImage , $det);
                      ($msg == true)
                        ?
                        header("Location:../products.php?edit=1&title=$title")
                        :
                        header("Location:../products.php?edit=0&title=$title");
                }
                if ($chk == "false")
                {
                  header("Location:../products.php?edit=0&title=$title");
                }
            // }            



           
      
    

  // echo "<script>alert('$img')</script>";

  // $p_image = $_FILES[$img]['name'];
     
  // echo "
  // <script>
  // alert('$preId');
  // </script>
  // ";
 
  // $ext = pathinfo($p_image,PATHINFO_EXTENSION);
  // $newImage = rand().time().'.'.$ext;

  // move_uploaded_file($_FILES[$img]['tmp_name'],"./Uploads/".$newImage);


  
  //   $db->ProductEdit($preID,$title , $cat , $newImage , $p_detail);


  
  
  // $msg = true;
  // $chk = "none";
  
  
  
  // echo '
  // <script>
  // swal({
  //   title: "Are you sure to Update '.$id.'",
  //   icon: "warning",
  //   buttons: true,
  //   dangerMode: true,
  // })
  // .then((willDelete) => {
  //   if (willDelete) {
  //   ';
  //      $chk = "true";
  //       // chk($db,$msg,$chk,$id,$title);
         
  //      echo '    
      
  //   } else {
  //      ';
  //       $chk = "false";
        // chk($db,$msg,$chk,$id,$title);
           
  //       echo '
  //   }
  
  // });
  
  
  // </script>
  //  ';
   
   
  //  function chk($db,$msg,$chk,$id,$title)
  //  {
  //   if( $chk == "true")
  //      {
  //        $msg =  $db->ProductDelete($id);
  //        ($msg == true)
  //        ?
  //            header("Location:../products.php?masg=1&title=$title")
  //        :
  //            header("Location:../products.php?msg=0&title=$title");
  //      }
  //        if($chk == "false")
  //        {
  //          header("Location:../products.php?msg=0&title=$title");  
       
  //        }
  // }
  


}

?>
          
</body>
</html>

