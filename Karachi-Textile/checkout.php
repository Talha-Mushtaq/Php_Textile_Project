<?php
include('includes/header.php');
include('includes/db.php');
		
      $grand_total = 0;
      $allItems = '';
      $items = array();
      $sql = "SELECT CONCAT(PRODUCTNAME,'(',QTY,')') AS Itemqty , TOTALPRICE ,PRODUCTIMAGE,QTY  FROM cart";
      $stmt = $con->prepare($sql);
      $stmt->execute();
      $result=$stmt->get_result();
      while($row = $result->fetch_assoc()){
         $grand_total += $row['TOTALPRICE'] * $row['QTY'];
         $items[] = $row['Itemqty'];
         $img[]= $row['PRODUCTIMAGE'];
      }
      $allItems =  implode(" <br> ",$items);
      $stmt->close();
   //insert into order


   if(isset($_POST['submit']))
	{
      $name = $_POST['c_name'];
      $address = $_POST['c_address'];
      $contry = $_POST['country'];
      $products = $_POST['products'];
      $grand_total = $_POST['grand_total'];
      $cardno = $_POST['card_no'];
      $validity = $_POST['expiry'];
      $cardcode = $_POST['card_code'];

      $sql="INSERT INTO order_table(CUSTOMER_NAME , SHIPPING_ADDRESS , COUNTRY , PRODUCTS , TOTAL_BILL,
      CARD_NO,VALIDITY,CARD_CODE) VALUES('$name','$address','$contry','$products','$grand_total','$cardno',
      '$validity','$cardcode')";
      $run=mysqli_query($con , $sql);
      if($run){
         echo("<script>location.href = 'purchase-confirmation.php';</script>");
      
      }else{
         echo "<script>alert('Failed to ordered, Try Again!');</script>";
      }
   }

  
?>
		 
			
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
		 
            <div class="col-md-8"
            
            data-aos="fade-right"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
            >
             
                  <h4 class="widget-title">Billing Details</h4>

                  <!--form start-->

                  <form class="" method="post" action="checkout.php">
                     <div class="form-group">
                     <input type="hidden" value="<?= number_format($grand_total,2)?>" name="grand_total" />
                     <input type="hidden" value="<?= $allItems?>" name="products" />
                        <label for="full_name">Full Name</label>
                        <input type="text" required autofocus class="form-control" name="c_name" id="full_name" placeholder="">
                     </div>

                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control"  required autofocus name="c_address"  id="user_address" placeholder="">
                     </div>

                     <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" name="country"  required autofocus id="user_country" placeholder="">
                     </div>
                  
                     <h4 class="widget-title">Payment Method</h4>
                     <p>Credit Cart Details (Secure payment)</p>
             
              
                     <div class="form-group">
                        <label for="card-number">Card Number <span class="required">*</span></label>
                        <input type="number"  id="card-number" class="form-control" name="card_no" required autofocus  type="tel" placeholder="•••• •••• •••• ••••">
                      </div>
            
                      <div class="form-group half-width padding-right">
                        <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
                        <input  type="number" id="card-expiry" class="form-control" required autofocus name="expiry" type="tel" placeholder="MM / YY">
                     </div>   
                              
                     <div class="form-group half-width padding-left">
                        <label for="card-cvc">Card Code <span class="required">*</span></label>
                        <input type="number" id="card-cvc" class="form-control"  name="card_code" required autofocus type="tel" maxlength="4" placeholder="CVC" >
                     </div>       
                            
                     <input type="submit" name="submit" class="btn btn-main mt-20" value="Place Order" />
                  </form>

                           <!--form end-->

              </div>
                    
         

		 
		 
            <div class="col-md-4"
            
            data-aos="fade-left"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
            >
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
                     <div class="media product-card">
                        <div class="media-body">
                        <!-- <img class="media-object" src="Admin/PHP/Uploads/" alt="Image" /> -->
                           <h4 class="media-heading" style="font-weight:bold !important;" ><?= $allItems?></h4><br>
                           <p class="price">
						   <?php 
								
								///new code
								//$product2=array(5,5);
								//echo(array_product($product2));
						   ?>
						   </p>
                           
                        </div>
                     </div>
                     
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price"><?= number_format($grand_total,2)?></span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total(PKR)</span>
                        <span><?= number_format($grand_total,2)?></span>
                     </div>
                     <div class="verified-icon">
                        <img src="images/shop/verified.png">
                     </div>
                  </div>
               </div>
            </div>


               <!--modal popup-->
               

              

         


         </div>
      </div>
   </div>
</div>
  
   
<?php
include('includes/footer.php');
?>