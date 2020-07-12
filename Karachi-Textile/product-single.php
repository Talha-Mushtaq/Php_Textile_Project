<?php

include('includes/header.php');
include('includes/db.php');


//checking 
if(isset($_GET['data']) && !empty($_GET['data'])){
	$product_code = $_GET['data'];
	$product_Query = mysqli_query($con, "SELECT * FROM product WHERE PRODUCTID = '$product_code'");
	$rows = mysqli_num_rows($product_Query);
	if($rows == 1){
		$data = mysqli_fetch_assoc($product_Query);
	}else{
		header("Location:index.php");
		exit;
	}
}else{
	header("Location:index.php");
	exit;
}   
?>
<style>
	p {
	line-height: 1.5rem !important;
  margin-bottom: 1.5rem !important;
  text-align:justify !important;
		
		
	}
	
	img{
		
		width:400px !important;
		height:500px !important;
	}

</style>
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a>/</a></li>
					<li><a href="shop-sidebar.php">Products</a></li>
					<li><a>/</a></li>
					<li class="active"><?=$data['PRODUCTTITLE'];?></li>
				</ol>
			</div>
			
		</div>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src="Admin/PHP/Uploads/<?=$data['PRODUCTIMAGE'];?>" alt="product-img" style="width:400px; !important height:500px; !important"
									
									data-aos="fade-right"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
	
									/>
								</div>
								
								
							</div>
							
							
						</div>
						
						
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details"
				
				
				data-aos="fade-left"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
	
				>
					<h2><?=$data['PRODUCTTITLE'];?></h2><br>
					<p class="product-price">PKR <?=$data['PRODUCT_PRICE'];?></p>
					
					<p class="product-description mt-20">
						<?=$data['PRODUCTDETAIL'];?>
					</p>
				
				
					<form action="cart.php?data=<?=$data['PRODUCTID'];?>" method="post">
					<!-- <div class="product-quantity">
						<span>Quantity:</span>
						<div class="product-quantity-slider">
							<input required id="product-quantity" type="number" name="pro_quantity">
						
						</div>
					</div> -->
					<div class="product-category">
						<span>Category:</span><span><?=$data['PRODUCTCATEGORY'];?></span>
						
					</div>
					
					
					
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>
<?php
include('includes/footer.php');

?>