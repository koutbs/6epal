<?php 
require_once "head.php";
?>	
	<title>Το Blog μου!</title>
  </head>
  <body>
<?php 
require_once "menu.php";
require_once "carousel.php";
?> 
<div class="container">  
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page">Home</li>
	  </ol>
	</nav>
</div>    	
<div class="container top-space">
  <div class="row">
    <div class="col-md-4 bottom-space-20">
		<div class="card">
		  <img src="images/1.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
			<h5 class="card-title">Τέχνες</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
    </div>
    <div class="col-md-4 bottom-space-20">
		<div class="card">
		  <img src="images/2.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
			<h5 class="card-title">Υγεία</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
    </div>
    <div class="col-md-4 bottom-space-20">
		<div class="card">
		  <img src="images/3.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
			<h5 class="card-title">Τεχνολογία</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
    </div>
  </div>
</div>
	
<?php 
require_once "articles-home.php";
require_once "right-bar.php";
require_once "footer.php";
?>
	

	
	
	
