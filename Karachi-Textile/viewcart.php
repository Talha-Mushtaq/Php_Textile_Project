<?php
session_start();
include('includes/header.php');
include('includes/db.php');


// //checking 
// if(isset($_GET['data']) && !empty($_GET['data'])){
// 	$product_code = $_GET['data'];
// 	$product_Query = mysqli_query($con, "SELECT * FROM product WHERE PRODUCTID = '$product_code'");
// 	$rows = mysqli_num_rows($product_Query);
// 	if($rows == 1){
// 		$data = mysqli_fetch_assoc($product_Query);
// 	}else{
// 		header("Location:index.php");
// 		exit;
// 	}
// }

if(isset($_GET['clear'])){
  $id=$_GET['clear'];
  $stmt = $con->prepare("DELETE FROM cart where ID=?");
  $stmt->bind_param("i",$id);
  $stmt->execute();
}

  if(isset($_GET['all'])){
    $id=$_GET['all'];
    $stmt = $con->prepare("DELETE FROM cart");
    $stmt->execute();
}


if(isset($_POST['code'])){
 

$code=$_POST['code'];
//update cart
$qty = $_POST['qty'];
$total_price = $_POST['product_price'] * $_POST['qty'];

$sql="UPDATE cart SET QTY='$qty' , TOTALPRICE = '$total_price' WHERE PRODUCTCODE='$code' ";
$run = mysqli_query($con , $sql);
}


?>
<style>
#upd:hover {
  background-color: blue;
}
</style>

<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">

              <form method="POST" action="viewcart.php"  enctype='multipart/form-data'>
              
              

                <table class="table"
                
                data-aos="fade-down"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"

                >
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
					           <th class="">Quantity</th>
                     <th class="">Total Price</th>
                     <!--<th class="">Total Price</th>-->
                      <th class=""><a class="btn btn-warning" onclick="return confirm('Are you sure you want to clear your cart?');" href="viewcart.php?all" style="margin-left:30px;">Clear All</a></th>
                      
                     </tr>
                    
                  </thead>
                  <tbody>

                  <?php 
                    $stmt = $con->prepare("SELECT * FROM cart");
                    $stmt->execute();
                    $result= $stmt->get_result();
                    $grand_total=0;
                    while($row = $result->fetch_assoc()){
                  ?>
                   <tr class="">
                   
                    
                  
                      <td class="">
                        <div class="product-info">
                         <img src="Admin/PHP/Uploads/<?=$row['PRODUCTIMAGE'];?>" width="80" alt="product-img">
                          <a href="product-single.php?data=<?=$row['PRODUCTCODE'];?>"><?=$row['PRODUCTNAME'];?></a>
                        </div>
                      </td>


                      <td class="">PKR <?=$row['PRODUCTPRICE']?></td>
                      

                      <td width="15"><input type="number" name='qty' min="1"  class="form-control itemQty" value="<?=$row['QTY'];?>" /></td>
                      <td class="">PKR <?=$row['PRODUCTPRICE'] * $row['QTY'];?></td>
                   
                      <td class="">
                        <a class="fa fa-trash" onclick="return confirm('Are you sure you want to remove this item?');" href="viewcart.php?clear=<?= $row['ID']?>" style="color:red; !important; margin-left:30px;">Remove</a>
                      </td>
                      <input  type="hidden" class="form-control" name="code" value="<?=$row['PRODUCTCODE'];?>">
                      <td class=""><input type="hidden" value="<?=$row['PRODUCTPRICE'] ?>" name="product_price" /></td>

                    </tr><br><br>

                    <?php $grand_total += $row['TOTALPRICE'] * $row['QTY'];?>
                      
                    <?php } ?>
                      
                    <td><b>Total Amount(PKR)</b></td>
                      <td><?= number_format($grand_total,2); ?></td>
                  </tbody>
                </table>
                <input type="submit" id="upd" name="submit" class="btn btn-main  pull-right <?=($grand_total > 1)?"": "disabled" ?>"  value="Update Cart"><br><br><br>
                <a href="checkout.php" class="btn btn-main pull-right <?=($grand_total > 1)?"": "disabled" ?>">Checkout</a><br><br><br>
                
                <a href="shop-sidebar.php" class="btn btn-main pull-right" style="background-color:blue;float:left !important;">Continue Shopping</a>
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
