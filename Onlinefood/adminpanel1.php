<?php
@ob_start();

include('include/db_con.php');

    
  
	session_start();
		if (isset($_POST['sub']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
  
                   if (empty($username) || empty($password))
                   {
                      $error = 'Hey All fields are required!!';
                   }
				   else{
					 $login="select * from admin where username='".$username."' and password ='".$password."'";
					 $result=mysqli_query($con,$login);
					
				
					 
					if(mysqli_fetch_array($result))
					{
				 
					 header('Location:admin/adminpanal.php');
					 exit();
					} 
					   else {
					          $error= 'Incorrect details !!';
					       }
				        }
					
		}
		?>
	

	
  <html>
  <head>
  <link href="css/login.css" rel="stylesheet" type="text/css"  media="all" />
  </head>
  <body style="background-color:black">
  
	
	<header >
	<div class="logo"> <img src="logo.jpg" style="width:250px;height:120px;position:center;"></div>
     </header>
	<div class="nav">
	<ul>
			         <li><a  href="hotel.php">HOME</a></li>
				     <li><a href="food.php">FOODS</a></li>
				     <li><a href="index.php">ORDER</a></li>
				     <li><a class="active" href="adminlogin.php">ADMIN</a></li>
				     <li style="float:right"><a  href="contact.php">CONTACT</a></li>
			     </ul></div>
  
 
  
  <form action="product.php" method="post" align="center" style="background-color:white; padding-top:40px;height:100px" >
  
	 <h2 align="center" style="font-size:40px; padding-top: 80px; color:white"><a href="product.php">PRODUCT DETAILS</a></h2>
	
			
	</form>
	 <form action="sales.php" method="post"  align="center" style="background-color:white; padding-top:10px;padding-bottom:40px;height:400px" >
  
	 <h2 align="center" style="font-size:40px; padding-top: 80px; color:white"><a href="sales.php">SALES DETAILS</a></h2>
	
			
	</form>
  
  

		
  
		</body>
		</html>
		