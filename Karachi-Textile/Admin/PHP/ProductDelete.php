<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="sweetalert2.all.min.js"></script> -->
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


</head>

<body>

  <?php

  require_once("./DBConn.php");
  $db = new dbconn();
  $id = $_GET['id'];
  $title = $_GET['title'];

  $msg = false;
  $chk = "true";

  
//   echo '
// <script>
//     swal({
//         title: "Are you sure?",
//         text: "Once deleted, you will not be able to recover this imaginary file!",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//     })
//     .then((willDelete) => {
//         if (willDelete) 
//         {
//              chkTrue();
//             alert('.$chk.');
//             } 
//         else
//         {
//             chkFalse();
//             alert('.$chk.');
//         }
//     });

//      function chkTrue()
//      {
//       ';
//            $chk = "true";
//       echo '    
//      }
//      function chkFalse()
//      {
//         ';
//            $chk = "false";
//         echo '   
//      }
     
//     </script>
//     ';
 
deleteProduct($db,$chk,$msg,$id,$title);
        function deleteProduct($db,$chk,$msg,$id,$title)
        {
            
                if ( $chk == "true") 
                {
                
                    
                  $msg =  $db->ProductDelete($id);
                  ($msg == true)
                    ?
                    header("Location:../products.php?delete=1&title=$title")
                    :
                    header("Location:../products.php?delete=0&title=$title");
                }
                if ($chk == "false")
                {
                  header("Location:../products.php?delete=0&title=$title");
                }
        }
    
  ?>
</body>
<script>
          
</script>
</html>