<?php
 session_start();
 if(!isset($_SESSION['email']) )
 {
    header("Location:./login.php");
 }
?>

<?php

 include('includes/header.php');

 echo '
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <script src="sweetalert2.all.min.js"></script>
 <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
 <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
 
	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  ';
 


 echo
	"
	 <script>
	 $(document).ready(function(){

		$('#img').change(function(e){
		 tmppath = URL.createObjectURL(event.target.files[0]);
	      $('#showImg').fadeIn('fast').attr('src',tmppath);
        });
	});	
	 
	 </script>"; 
?>


		<!--form start-->

	
	<div class="container-fluid">
		<div class="row mt-5 mb-5">

		<h2 style="text-align:center;">Product Page</h2>
		<a class="btn btn-primary" href="products.php" style="margin-left:150px;">Back</a>
			<div class="col-md-3"></div>
				<div class="col-md-6" style="margin-top:50px;margin-left:30px;">
				
					
					
					<form method="POST" action="./PHP/ProductInsert.php" enctype="multipart/form-data" >
					

						<div class="form-group">
							<label for="pro-title" style="margin-bottom:10px;">Product Title</label>
							<input type="text" class="form-control" name="p_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Title" required/>
					    </div>
						
						<div class="form-group" style="margin-bottom:10px;">
							<label for="pro-cat">Product Category</label>
							<input type="text" class="form-control" name="p_cat" id="exampleInputcategory" aria-describedby="categoryHelp" placeholder="Enter Product Category" required/>
					    </div>
						
						<div class="form-group" style="margin-bottom:10px;">
							<label for="pro-cat">Product Price</label>
							<input type="text" class="form-control" name="p_price" id="exampleInputcategory" aria-describedby="categoryHelp" placeholder="Enter Product Price" required/>
					    </div>
						
						 <div class="custom-file form-group" style="margin-bottom:10px;">
						 <label for="pro-cat">Product Image</label>
							<input type="file" id="img" name="p_image"  id="validatedCustomFile" required>
	
							<br/>
	
							<img id="showImg" src="" style="width: 100px;height:100px;border:1px solid "/>

						</div>
						
						<div class="form-group" style="margin-bottom:10px;">
							<label for="pro-det">Product Detail</label>
							<textarea type="text" class="form-control"  rows="10" name="p_detail" id="exampleInputEmail1" aria-describedby="emailHelp" required></textarea>
						</div>
						
						<input type="submit" class="btn btn-primary" name="p_submit" style="outline: none;width:40%"/>
					<!-- <input type="submit"/> -->
					</form>
					<br/>
				
				</div>
				<div class="col-md-3">
					
					
					
				</div>
		</div>
	</div>
	
	

	<!--finish form-->
					
					
<?php
include('includes/footer.php');
?>