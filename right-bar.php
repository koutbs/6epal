    <div class="col-md-4">
		<div class="bottom-space-40">
			<h4>Κατηγορίες</h4>
		</div>
		<div class="card no-border">
		  <ul class="list-group">
<?php 
$sql="SELECT categories.cat_name, COUNT(article_id)AS total FROM articles INNER JOIN categories ON articles.cat_id=categories.category_id WHERE published=1 GROUP BY cat_id ORDER BY cat_name ASC";
$stmt=$conn->prepare($sql);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
	$category=$row["cat_name"];
	$total=$row["total"];

?>			  
		  <li class="list-group-item d-flex justify-content-between align-items-center no-border">
		  <a href="articles.php?category=<?php echo $category ?>">
			<?php echo $category; ?></a>
			<span class="badge badge-primary badge-pill"><?php echo $total; ?></span>
			
		  </li>
<?php
}
$stmt=null;
?>
		</ul>
		</div>
		
		<div class="bottom-space-40 top-space">
			<h4>Πρόσφατα άρθρα</h4>
		</div>		
			<ul class="list-unstyled">
<?php 
$sql="SELECT articles.*, categories.cat_name, users.username FROM articles INNER JOIN categories ON articles.cat_id=categories.category_id INNER JOIN users ON articles.owner_id=users.user_id WHERE published=1 ORDER BY created_date DESC LIMIT 4";
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
			  <li class="media top-space-20">
				<img src="images/<?php echo $image ?>" class="mr-3 sm-img" alt="...">
				<div class="media-body">
				  <h5 class="mt-0 mb-1"><?php echo $title ?></h5>
				  <div class="blog-details sm">
				<ul>
					<li>
					<a href="articles.php?date=<?php echo $date ?>"><i class="fas fa-calendar-alt"></i> <?php echo $newdate ?></a></li>
					<li><a href="articles.php?category=<?php echo $category ?>"><i class="fas fa-list"></i> <?php echo $category ?></a></li>
					<li><a href="articles.php?author=<?php echo $author ?>"><i class="fas fa-user-edit"></i> <?php echo $author ?></a></li>
				</ul>
			</div>
				</div>
			  </li>
<?php
}
$stmt=null;
?>			  
			</ul>	
			

		<div class="bottom-space-40 top-space">
			<h4>Social Media</h4>
		</div>			
		<ul class="list-group">
		  <li class="list-group-item no-border"><a href="#"><i class="fab fa-facebook fa-3x align-middle"></i> Facebook</a></li>
		  <li class="list-group-item no-border"><i class="fab fa-twitter-square fa-3x align-middle"></i> Twitter</li>
		  <li class="list-group-item no-border"><i class="fab fa-youtube fa-3x align-middle"></i> Youtube</li>

		</ul>			
			
    
	
	
	</div>
  </div>
</div>
