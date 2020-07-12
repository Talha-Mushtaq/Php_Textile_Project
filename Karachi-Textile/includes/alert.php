<?php if(isset($_SESSION['success'])){ ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <p style="text-align:center;margin:0;padding:0;"><strong><?=$_SESSION['success'];?></strong></p>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php unset($_SESSION['success']);} elseif(isset($_SESSION['error'])){ ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  <p style="text-align:center;margin:0;padding:0;"><strong><?=$_SESSION['error'];?></strong></p>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php unset($_SESSION['error']);} ?>