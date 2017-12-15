<?php 
$con=mysqli_connect("localhost","root","","blog");

$start=0;
$limit=5;

$to=mysqli_query($con,"SELECT * FROM posts");
$total=mysqli_num_rows($to);
//pagination id


if (isset($_GET['id'])) {
$id=$_GET['id'];
$start=($id-1)*$limit;
}
else{
	$id=1;
}
$page=ceil($total/$limit);

$query=mysqli_query($con,"SELECT * FROM posts LIMIT $start,$limit");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagination</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1>Pagination in PHP</h1>
	<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Description</th>
		<th>Image</th>
	</tr>
	<?php 
	while ($row=mysqli_fetch_array($query))
	{?>
	<tr>
		<td><?php echo $row['0'];?></td>
		<th><?php echo $row['1'];?></th>
		<td><?php echo $row['2'];?></td>
		<th><?php echo $row['3'];?></th>

	</tr>
	<?php  } ?>
		
	</table>
</div>
<div class="container">
	<nav aria-label="Page navigation">
  <ul class="pagination">
  <?php if ($id>1) {?>  
    <li><a href="?id=<?php echo ($id-1) ?>">
    Previous</a></li>
    <?php } ?>
    <?php for($i=1;$i<=$page;$i++)
    { ?>
    <li><a href="?id=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php } ?>
    <?php if($id!=$page){?>
    <li><a href="?id=<?php echo ($id+1);?>"> Next</a></li>
    <?php } ?>
  </ul>
</nav>
</div>

</body>
</html>