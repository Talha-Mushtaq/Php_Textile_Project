<?php
session_start();
include('includes/header.php');
include('includes/db.php');


//checking 
if(isset($_GET['data']) && !empty($_GET['data'])){
	$product_code = $_GET['data'];
	$qty=$_POST['pro_quantity'];
	///new code
	$product=array($product_code,$qty);
	//print_r($product);
	$_SESSION[$product_code]=$product;
	$product_Query = mysqli_query($con, "SELECT * FROM product WHERE PRODUCTID = '$product_code'");
	$rows = mysqli_num_rows($product_Query);
	if($rows == 1){
		$data = mysqli_fetch_assoc($product_Query);
	}else{
		header("Location:index.php");
		exit;
	}
}



?>
<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              <form action="checkout.php?data=<?=$data['PRODUCTID'];?>" method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
					  <th class="">Quantity</th>
                      <!--<th class="">Actions</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                         <img src="Admin/PHP/Uploads/<?=$data['PRODUCTIMAGE'];?>" width="80" alt="product-img">
                          <a href="product-single.php?data=<?=$data['PRODUCTID'];?>"><?=$data['PRODUCTTITLE'];?></a>
                        </div>
                      </td>
                      <td class="" >$<?=$data['PRODUCT_PRICE'];?></td>
					  <td class="" name="pro_quantity" ><?php echo $_POST['pro_quantity'];?></td>
                      <!--<td class="">
                        <a class="product-remove" href="">Remove</a>
                      </td>-->
                    </tr>
                    
                
                  </tbody>
                </table>
				
                <a href="checkout.php?data=<?=$data['PRODUCTID'];?>" class="btn btn-main pull-right">Checkout</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>
