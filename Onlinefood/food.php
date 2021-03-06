<?php include('header.php'); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Food Review</title>

    <link href="style.css" rel="stylesheet" type="text/css"  media="all" />
</head>
<body>
	<header style="margin-bottom:20px;">
	<div class="logo"> <img src="../logo.jpg" style="width:250px;height:120px;"></div>
     </header>

<div class="nav">
	<ul>
			         <li><a  href="hotel.php">HOME</a></li>
				     <li><a class="active" href="food.php">FOODS</a></li>
				     <li><a href="index.php">ORDER</a></li>
				     <li><a href="adminlogin.php">ADMIN</a></li>
				     <li style="float:right"><a  href="contact.php">CONTACT</a></li>
			     </ul></div>



<div class="container">
	<h1 class="page-header text-center">PRODUCTS CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All Category</option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
			
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Photo</th>
				<th>Product Name</th>
				<th>Product Place</th>
				<th>Price</th>
				<th>Order</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					$sql="select * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td>
							     <a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else
								 {echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} 
								 else{echo $row['photo'];} ?>" height="30px" width="40px"></a></td>
								 
							<td><?php echo $row['productname']; ?></td>
							<td><?php echo $row['place']; ?></td>
							<td>&#8369; <?php echo number_format($row['price'], 2); ?></td>
							
							<td>
								<a href="index.php" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Order Now!</a> 
								
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modal.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'product.php';
			}
			else
			{
				window.location = 'product.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>