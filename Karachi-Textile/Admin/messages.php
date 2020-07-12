<?php
include('includes/header.php');
include('includes/db.php');

//confirm order
if(isset($_GET['clear'])){
	$id=$_GET['clear'];
	$stmt = $con->prepare("DELETE FROM contact where MESSAGEID=?");
	$stmt->bind_param("i",$id);
	$stmt->execute();
  }

?>
	
	<!--form start-->

	
	<div class="container-fluid">
	
		<div class="row mt-5 mb-5">
			
		<h2 style="text-align:center;">All Messages</h2>
		<!---<a class="btn btn-primary" href="add-product.php" style="margin-left:800px;">All Orders</a>-->

		<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-6 col-lg-6 col-xl-6 table-responsive" style="margin-top:50px;;width:60%; margin-left:25%; margin-right:40%;">
				
					
					
					<table class="table">
				 
				  <thead>
					<tr>
					  <th scope="col">Message ID</th>
					  <th scope="col">Name</th>
					  <th scope="col">Email</th>
					  <th scope="col">Message</th>
					  <th scope="col">Delete</th>
					</tr>
				  </thead>
				  
				  
	<?php
	$sql = "SELECT * FROM contact";
	$run = mysqli_query($con,$sql);
	while($data=mysqli_fetch_assoc($run))
	{
	?>
				  
				  
				   <tbody>
				  <td><?=$data['MESSAGEID'];?></td>
				  <td><?=$data['NAME'];?></td>
				  <td><?=$data['EMAIL'];?></td>
				  <td><?=$data['MESSAGE'];?></td>
				  <td><a class="btn btn-danger"  href="messages.php?clear=<?= $data['MESSAGEID']?>">Delete</a></td>
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