<div class="container top-space">
  <div class="row">
    <div class="col-md-8">
	<div class="bottom-space-40">
		<h4>Άρθρα</h4>
	</div>

<?php 
$sql="SELECT articles.*, categories.cat_name, users.username FROM articles INNER JOIN categories ON articles.cat_id=categories.category_id INNER JOIN users ON articles.owner_id=users.user_id WHERE published=1 ORDER BY created_date DESC";
$stmt=$conn->prepare($sql);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
	$id=$row["article_id"];
	$image=$row["image"];
	$title=$row["title"];
	$category=$row["cat_name"];
	$date=$row["created_date"];
	$author=$row["username"];
	$content=$row["content"];
	
	$newdate=explode("-",$date);
	$newdate=$newdate[2]."-".$newdate[1]."-".$newdate[0];
?>	
      <div class="card no-border">
		  <img src="images/<?php echo $image ?>" class="card-img-top" alt="...">
		  <div class="card-body">
			<h5 class="card-title"><?php echo $title ?></h5>
			
			<div class="blog-details">
				<ul>
					<li>
					<a href="articles.php?date=<?php echo $date ?>"><i class="fas fa-calendar-alt"></i> <?php echo $newdate ?></a></li>
					<li><a href="articles.php?category=<?php echo $category ?>"><i class="fas fa-list"></i> <?php echo $category ?></a></li>
					<li><a href="articles.php?author=<?php echo $author ?>"><i class="fas fa-user-edit"></i> <?php echo $author ?></a></li>
				</ul>
			</div>
			
			<p class="card-text"><?php echo $content ?></p>
			<a href="article.php?id=<?php echo $id ?>" class="btn btn-primary">Περισσότερα</a>
		  </div>
		</div>
<?php
}
$stmt=null;
?>		
		
		
		
		
	   </div>
