<?php
 session_start();
 if(!isset($_SESSION['email']) )
 {
    header("Location:./login.php");
 }
?>
<?php
echo '
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		// <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
		// <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		';

include('includes/header.php');
require_once("./PHP/DBConn.php");


echo
'
<style>
* {
	box-sizing: border-box;
  }
  
  form.example input[type=text] {
	padding: 5px;
	font-size: 17px;
	border: 1px solid grey;
	float: left;
	width: 80%;
	background: #f1f1f1;
  }
  
  form.example button {
	float: left;
	width: 20%;
	padding:8.9px;
	background: #2196F3;
	color: white;
	font-size: 17px;
	border: 1px solid grey;
	border-left: none;
	cursor: pointer;
  }
  
  form.example button:hover {
	background: #0b7dda;
  }
  
  form.example::after {
	content: "";
	clear: both;
	display: table;
  }
  </style>
  ';

echo
"
<script>
$(document).ready(function(){
	
	$('#searchBtn').on('click', function(event){
		alert('run');
		event.preventDefault();
    }); 
});
</script>
  ";
$db = new dbconn();

if(isset($_GET['add']) )
{
     $title = $_GET['title'];
	if($_GET['add'] == 1)
	{

		echo "
		<script>
		  Swal.fire(
			'$title is add !',
			'',
			'success'
		   )
		</script>
		";
	}
	else
	{
		echo 
		"
		<script>
		Swal.fire({
			icon: 'error',
			title: '$title is not add !',
		  })
		</script>
		";
	}
}




if( isset($_GET['delete']) )
{
	 $title = $_GET['title'];
	if($_GET['delete'] == 1)
	{

		echo "
		<script>
		  Swal.fire(
			'$title is delete !',
			'',
			'success'
		   )
		</script>
		";
	}
	else
	{
		echo 
		"
		<script>
		Swal.fire({
			icon: 'error',
			title: '$title is not delete !',
		  })
		</script>
		";
	}
}





  if( isset($_GET['edit']) )
  {
	   $title = $_GET['title'];
	  if($_GET['edit'] == 1)
	  {
  
		  echo "
		  <script>
		  Swal.fire(
			  '$title Update!',
			  '',
			  'success'
			)
		  </script>
		  ";
	  }
	  else
	  {
		  echo 
		  "
		  <script>
		  Swal.fire({
			  icon: 'error',
			  title: '$title not Update!',
			})
		  </script>
		  ";
	  }
  }



?>

	
	
	<!--form start-->

	
	<div class="container-fluid">
	
		<div class="row mt-5 mb-5">
			
		<h2 style="text-align:center;">All Product</h2>
		<a class="btn btn-primary" href="add-product.php" style="margin-left:800px;">Add Product</a>

		<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-6 col-lg-6 col-xl-6 table-responsive" style="margin-top:50px;;width:60%; margin-left:25%; margin-right:40%;">
				
					
					
					<table class="table">
				  
				  <thead>
					<tr>
					  <th scope="col">Product ID</th>
					  <th scope="col">Product Title</th>
					  <th scope="col">Product Category</th>
					  <th scope="col">Product Image</th>
					  <th scope="col">Product Detail</th>
					   <th scope="col">Delete Product</th>
					  <th scope="col">Edit Product</th>
					</tr>
				  </thead>
				  <tbody>


				  <?php
  
  $data=$db->ProductShow();

  $i=1;
			foreach($data as $d)
			{
				
			
			// $id=$d['user_id'];
					echo 
					'
					<tr>
						<th scope="row">'.$i++.'</th>
						<td>'.$d['PRODUCTTITLE'].'</td>
						<td>'.$d['PRODUCTCATEGORY'].'</td>
						<td> <img src= "./PHP/Uploads/'.$d['PRODUCTIMAGE'].'" style="width:30px;"/></td>
						<td>'.$d['PRODUCTDETAIL'].'</td>
						<td><a href="./PHP/ProductDelete.php?id='.$d['PRODUCTID'].'&title='.$d['PRODUCTTITLE'].' " class="btn btn-warning" name="p_delete">Delete</a></td>
						<td><a <a href="./Edit-product.php?id='.$d['PRODUCTID'].'&title='.$d['PRODUCTTITLE'].'&cat='.$d['PRODUCTCATEGORY'].'&img='.$d['PRODUCTIMAGE'].'&det='.$d['PRODUCTDETAIL'].' " class="btn btn-info">Edit</a></td>
				</tr>	
				';
			}	

?> 
  

				</table>
					
				
				</div>
				<div class="col-md-3">
					
					
					
				</div>
		</div>
	</div>
	
	

	<!--finish form-->

<?php
include('includes/footer.php');
?>