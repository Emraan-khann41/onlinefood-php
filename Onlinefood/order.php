<?php include('header.php'); ?>
<head>
<link href="css/indexstyle.css" rel="stylesheet" type="text/css"  media="all" />
</head>

<body>
<header >
	<div class="logo"> <img src="logo.jpg" style="width:250px;height:120px;position:center;"></div>
     </header>
	<div class="nav">
	<ul>
			         <li><a  href="hotel.php">HOME</a></li>
				     <li><a href="food.php">FOODS</a></li>
				     <li><a class="active"href="index.php">ORDER</a></li>
				     <li><a href="adminlogin.php">ADMIN</a></li>
				     <li style="float:right"><a href="contact.php">CONTACT</a></li>
			     </ul></div>
<div class="container">
	<h1 class="page-header text-center">ORDER</h1>
	
	<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Product Place</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php 
					$sql="select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						
						<tr>
							<td class="text-center">
							<input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style="">
							</td>
							
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td><?php echo $row['place']; ?></td>
							
							<td class="text-right">&#x09F3; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		
		<?php session_start(); $s=$_SESSION['username'];?>
		
		<div class="row">
			<div class="col-md-3">
				<input type="text" name="customer" class="form-control" value="<?php echo $s ?>" placeholder="Email id" required>
			</div>
			<div class="col-md-3">
				<input type="text" name="location" class="form-control" placeholder="Provide your Location Please" value="" required>
			</div>
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
</html>