
<style>

#cartIcon li button
{
    color: black;
    text-decoration: none;
}
#cartIcon li button:hover
{
	border: black;
    text-decoration: none;
    color: white;
	background-color: black;
}
#cartIcon li a
{
    color: black;
    text-decoration: none;
}

#cartIcon li a:hover
{
    color: white;
    text-decoration: none;
}

</style>

<?php
include('includes/header.php');
include('includes/db.php');


if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $pimg = $_POST['pimg'];
    $pprice = $_POST['pprice'];
    $ptitle = $_POST['ptitle'];
    $pqty=1;

    $stmt= $con->prepare("SELECT PRODUCTCODE FROM cart WHERE PRODUCTCODE=?");
    $stmt->bind_param("s",$pid);
	$stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
	$code = $r['PRODUCTCODE'];
	

    if(!$code){
        $query=$con->prepare("INSERT INTO cart(PRODUCTNAME,PRODUCTPRICE,PRODUCTIMAGE,QTY,TOTALPRICE,PRODUCTCODE)
        values(?,?,?,?,?,?)");
        $query->bind_param("sssiss",$ptitle,$pprice,$pimg,$pqty,$pprice,$pid);
        $query->execute();
		echo "<script>alert('item added to cart');</script>";
    }else{
		echo "<script>alert('item already added to cart');</script>";
    }
}


?>



<div class="container-fluid ">

<div class="row mt-5 mb-5">
<div id="message">

</div>
<h2 style="text-align:center;margin-bottom:80px;">Our Products</h2>
	<div class="col-md-2"></div>
	
	<div class="col-md-9">
	
	<div class="row"
	
				
	data-aos="fade-down"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
	
	
	> 
	
		<?php
		$sql = mysqli_query($con, "SELECT * FROM product");
		while($data = mysqli_fetch_assoc($sql)){
		?>
	
	
	
	
	<div class="col-md-3" style="cursor:pointer;">
			
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" style="width:300px; !important; height:250px; !important;" src="Admin/PHP/Uploads/<?=$data['PRODUCTIMAGE'];?>" alt="product-img" />
						<div class="preview-meta">
							<ul id="cartIcon">
								<li>
							<form action="shop-sidebar.php" method="post" class="formsubmit">
								<input type="hidden" name="pid" value="<?=$data['PRODUCTID'];?>" />
								<input type="hidden" name="pimg" value="<?=$data['PRODUCTIMAGE'];?>" />
								<input type="hidden" name="ptitle" value="<?=$data['PRODUCTTITLE'];?>" />
								<input type="hidden" name="pprice" value="<?=$data['PRODUCT_PRICE'];?>" />
								<button class=" colorBtn additembtn  btn btn-lg"><i class="tf-ion-android-cart"></i></button>
								<a href="product-single.php?data=<?=$data['PRODUCTID'];?>"  class="btn btn-info btn-btn-sm" style="ouline:none;border:black;border-radius:7px" ><i class="tf-ion-eye"></i></a>
							</form>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						
					
						<h4><?=$data['PRODUCTTITLE'];?></h4>
						<p class="price">PKR <?=$data['PRODUCT_PRICE'];?></p>
					</div>
				</div>
			</div>		
			
		<?php } ?>
	
	
	
			
	</div>
	
	
	
	</div>
	
	
	
	
		

			
		
		<div class="col-md-1"></div>
</div>
			
			
						
<!-- <script type="text/javascript">
$(document).ready(function(){
	$(".additembtn").click(function(e){
		e.preventDefault();
		var $form = $(this).closest(".formsubmit");
		var pid = $form.find(".pid").val();
		var pimg = $form.find(".pimg").val();
		var ptitle = $form.find(".ptitle").val();
		var pprice = $form.find(".pprice").val();

		//ajax
		$.ajax({
			url : "action.php",
			method : 'post',
			data : {pid:pid,pimg:pimg,ptitle:ptitle,pprice:pprice},
			success : function(response){
				$("#message").html(response);
			}
		});
	});
});

</script>		  -->

</div>
<?php
include('includes/footer.php');
?>