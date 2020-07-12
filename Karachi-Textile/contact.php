<?php
include('includes/header.php');
include('includes/db.php');
include('includes/alert.php');

if(isset($_POST['name'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$sql="INSERT INTO contact(NAME , EMAIL , MESSAGE) VALUES('$name','$email','$message')";
	$run=mysqli_query($con , $sql);
	if($run){
		$_SESSION['success']="We have received your message ! We will contact you soon";
	}else{
		$_SESSION['error']="Message not recieved!";
	}
}
?>

<style>
	p {
	line-height: 1.5rem !important;
  margin-bottom: 1.5rem !important;
  text-align:justify !important;
		
		
	}

</style>


<section class="page-wrapper">
	<div class="contact-section">
		<div class="container">
			<div class="row">
			<?php include("includes/alert.php"); ?>
				<!-- Contact Form -->
				<div class="contact-form col-md-6 " >
				
					<form id="contact-form" method="post" enctype='multipart/form-data' action="contact.php" role="form"
					data-aos="fade-right"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
	
					>
					
						<div class="form-group">
							<input required autofocus type="text" placeholder="Your Name" class="form-control" name="name" id="name">
						</div>
						
						<div class="form-group">
							<input required autofocus type="email" placeholder="Your Email" class="form-control" name="email" id="email">
						</div>
						
						
						
						<div class="form-group">
							<textarea rows="6" required autofocus placeholder="Message" class="form-control" name="message" id="message"></textarea>	
						</div>
						
						<div id="mail-success" class="success">
							Thank you. The Mailman is on His Way :)
						</div>
						
						<div id="mail-fail" class="error">
							Sorry, don't know what happened. Try later :(
						</div>
						
						<div id="cf-submit">
							<input type="submit" autofocus id="contact-submit" class="btn btn-transparent" value="Submit">
						</div>						
						
					</form>
				</div>
				<!-- ./End Contact Form -->
				
				<!-- Contact Details -->
				<div class="contact-details col-md-6 " >
					<div class="google-map">
						<div class="mapouter"><div class="gmap_canvas"><iframe
						
						data-aos="fade-left"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
	
						width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=nishatabad&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://thevpndeal.com/nordvpn-coupon/">nordpvn coupon</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
					</div>
					<ul class="contact-short-info"
					
					data-aos="fade-up"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
	
					>
						<li>
							<i class="tf-ion-ios-home"></i>
							<span>Nishatabad near kashmir pul, Punjab Faisalabad</span>
						</li>
						<li>
							<i class="tf-ion-android-phone-portrait"></i>
							<span>Phone: +92-3137170808</span>
						</li>
						<!-- <li>
							<i class="tf-ion-android-globe"></i>
							<span>Fax: +880-31-000-000</span>
						</li> -->
						<li>
							<i class="tf-ion-android-mail"></i>
							<span>Email: karachidyeing@gmail.com</span>
						</li>
					</ul>
					<!-- Footer Social Links -->
					<!--<div class="social-icon">
						<ul>
							<li><a class="fb-icon" href="#"><i class="tf-ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="tf-ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="tf-ion-social-dribbble-outline"></i></a></li>
							<li><a href="#"><i class="tf-ion-social-googleplus-outline"></i></a></li>
							<li><a href="#"><i class="tf-ion-social-pinterest-outline"></i></a></li>
						</ul>
					</div>-->
					<!--/. End Footer Social Links -->
				</div>
				<!-- / End Contact Details -->
					
				
			
			</div> <!-- end row -->
		</div> <!-- end container -->
	</div>
</section>
	

<?php
include('includes/footer.php');
?>