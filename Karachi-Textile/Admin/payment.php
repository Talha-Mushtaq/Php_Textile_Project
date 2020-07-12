<?php
include('includes/header.php');
include('includes/db.php');

//confirm order
if(isset($_GET['clear'])){
	$id=$_GET['clear'];
	$stmt = $con->prepare("DELETE FROM order_table where ORDER_ID=?");
	$stmt->bind_param("i",$id);
	$stmt->execute();
  }

?>
	
	<!--form start-->

	
	<div class="container-fluid">
	
		<div class="row mt-5 mb-5">
			
		<h2 style="text-align:center;">All Payments</h2>
		<!---<a class="btn btn-primary" href="add-product.php" style="margin-left:800px;">All Orders</a>-->

		<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-6 col-lg-6 col-xl-6 table-responsive" style="margin-top:50px;;width:60%; margin-left:25%; margin-right:40%;">
				
					
					
					<table class="table">
				 
				  <thead>
					<tr>
					  <th scope="col">Customer Name</th>
					  <th scope="col">Credit Card Number</th>
					  <th scope="col">Validity MM/YY</th>
					  <th scope="col">Card Code (CVC)</th>
					  <th scope="col">Delete</th>
					</tr>
				  </thead>


				 	<!--select query-->
<?php 
$sql = "SELECT * FROM order_table";
$run = mysqli_query($con , $sql);
while($data=mysqli_fetch_assoc($run))
{
?>	

				   <tbody>
				  <td><?=$data['CUSTOMER_NAME'];?></td>
				  <td><?=$data['CARD_NO'];?></td>
				  <td><?=$data['VALIDITY'];?></td>
				  <td><?=$data['CARD_CODE'];?></td>
				  <td><a class="btn btn-danger"  href="payment.php?clear=<?= $data['ORDER_ID']?>">Delete</a></td>
				  </tbody>
<?php } ?>

				 
  

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