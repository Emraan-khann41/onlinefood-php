<?php include('header.php'); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

    <link href="style.css" rel="stylesheet" type="text/css"  media="all" />
</head>
<body>
<header>
	<div class="logo"> <img src="../logo.jpg" style="width:250px;height:120px;position:center;"></div>
     </header>

<div class="nav">
	<ul>
			         <li><a  href="hotel.php">HOME</a></li>
				     <li><a href="food.php">FOODS</a></li>
				     <li><a href="index.php">ORDER</a></li>
				     <li><a class="active" href="adminlogin.php">ADMIN</a></li>
				     <li style="float:right"><a  href="contact.php">CONTACT</a></li>
			     </ul></div>
				 
<div class="container">
	<h1 class="page-header text-center">SALES</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Date</th>
			<th>Customer</th>
			<th>Order Id</th>
			<th>Total Sales</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from purchase order by purchaseid desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						
						<td><?php echo $row['customer']; ?></td>
						<td><?php echo $row['purchaseid']; ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
						<?php include('sales_modal.php'); ?>
						</td>
						<td>
						 <a href="#deletesales<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							<?php include('sales_delete.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>