<?php 
require_once "../head.php";
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/fh-3.1.4/r-2.2.2/datatables.min.css"/>
 
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
	  <a class="btn btn-success float-right" href="article-new.php" role="button">Νέο Άρθρο</a>
	</div>  
</div>

<div class="container shadow p-3 mb-5 bg-white rounded">
	
	<table id="articles">
      <thead>
		<tr>
			<th>Τίτλος</th>
			<th>Κατηγορία</th>
			<th>Συγγραφέας</th>
			<th>Ημερομηνία</th>
			<th>Δημοσιευμένο</th>
			<th>Ενέργειες</th>
		</tr>
      </thead>
<?php 
$sql="SELECT articles.*, categories.cat_name, users.username FROM articles INNER JOIN categories ON articles.cat_id=categories.category_id INNER JOIN users ON articles.owner_id=users.user_id ORDER BY created_date DESC";
$stmt=$conn->prepare($sql);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
	$id=$row["article_id"];
	$title=$row["title"];
	$category=$row["cat_name"];
	$date=$row["created_date"];
	$author=$row["username"];
	$published=$row["published"];
	
	$newdate=explode("-",$date);
	$newdate=$newdate[2]."-".$newdate[1]."-".$newdate[0];
?>		

	<tbody>		
		<tr>
			<td><?php echo $title; ?></td>
			<td><?php echo $category; ?></td>
			<td><?php echo $author; ?></td>
			<td><?php echo $newdate; ?></td>
			<td><?php if ($published==0) echo "OXI"; else echo "NAI"; ?></td>
			<td><button type="button" class="btn btn-primary btn-sm">Επεξεργασία</button> <button type="button" class="btn btn-danger btn-sm">Διαγραφή</button></td>

		</tr>	
	</tbody>
<?php
}
$stmt=null;
?>		
		
	</table>

</div>



<?php 
 require_once "footer.php";
?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/fh-3.1.4/r-2.2.2/datatables.min.js"></script>
<script>

$(document).ready(function() {
    $('#articles').DataTable();
} );
</script>
