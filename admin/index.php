<?php 
require_once "../head.php";
?>

	<title>Διαχείριση</title>
  </head>
  <body>
<?php 
require_once "menu.php";
?> 

<div class="jumbotron top">
	<div class="container clearfix">
	  <h1 class="display-4">Διαχείριση άρθρων!</h1>
	  <p class="lead">Καλωσήρθατε στη σελίδα διαχείρισης.</p>
	  <hr class="my-4">
	  <p>Πατήστε το κουμπί για δημιουργία νέου άρθρου.</p>
	  <a class="btn btn-success float-right" href="#" role="button">Νέο Άρθρο</a>
	</div>  
</div>

<div class="container shadow p-3 mb-5 bg-white rounded">
	<form method="POST" target="index.php">
	
  <div class="form-group">
    <label for="title">Τίτλος</label>
    <input type="text" class="form-control" placeholder="Εισάγετε τίτλο άρθρου" name="title">
  </div>
  
  <div class="form-group">
    <label for="category">Κατηγορία</label>
    <select class="form-control" name="category">
      <option value="4">Αθλητικά</option>
      <option value="1">Γενικά</option>
      <option value="2">Κοινωνικά</option>
      <option value="5">Πολιτική</option>
      <option value="3">Τεχνολογία</option>
    </select>
  </div>
  
 
  <div class="form-group">
    <label for="content">Άρθρο</label>
    <textarea class="form-control" name="content"></textarea>
  </div>
  
  <div class="form-group">
    <label for="image">Εικόνα</label>
    <input type="file" class="form-control" name="image">
  </div>

  <div class="form-group">
	<div class="form-check">
		<input type="radio" class="form-check-input" name="publish" value="1"> 
		<label class="form-check-label" for="publish">Δημοσιευμένο
		</label>
	</div>
	
	<div class="form-check">
		<input type="radio" class="form-check-input" name="publish"value="0"> 
		<label class="form-check-label" for="publish">Μη Δημοσιευμένο
		</label>
	</div>
  </div>  
  
</form>
</div>

<?php 
 require_once "footer.php";
?>
