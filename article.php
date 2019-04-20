<?php 
require_once "head.php";

$id=$_GET["id"];

$sql="SELECT articles.*, categories.cat_name, users.username FROM articles INNER JOIN categories ON articles.cat_id=categories.category_id INNER JOIN users ON articles.owner_id=users.user_id WHERE article_id=:id && published=1 ORDER BY created_date DESC";
$stmt=$conn->prepare($sql);
$stmt->bindparam(":id",$id);
$stmt->execute();

if ($stmt->rowCount()==0) header("location:index.php");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

	$image=$row["image"];
	$title=$row["title"];
	$category=$row["cat_name"];
	$date=$row["created_date"];
	$author=$row["username"];
	$content=$row["content"];
	
	$newdate=explode("-",$date);
	$newdate=$newdate[2]."-".$newdate[1]."-".$newdate[0];

$stmt=null;
?>



	<title><?php echo $title; ?>!</title>
  </head>
  <body>
<?php 
require_once "menu.php";
?> 
<div class="container top-space">  
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page">Αρχική</li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>	  
	  </ol>
	</nav>
</div> 

<div class="container top-space">
  <div class="row">
    <div class="col-md-8">
	<div class="bottom-space-40">
		<h4>Άρθρα</h4>
	</div>	
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
			<a href="articles.php" class="btn btn-primary">Επιστροφή</a>
		  </div>
		</div>
		
	
	   </div>
<?php 
require_once "right-bar.php";
require_once "footer.php";
?>