 

<html>
<head>
  <link href="css/contact.css" rel="stylesheet" type="text/css"  media="all" />
</head>
<body style=" background-image:url(admin/back3.jpeg)">
<header>
	
	     <div class="logo"> <img src="logo1.jpg" style="width:250px;height:120px;position:center;"></div>
	   
	</header>
	
	<div class="nav">
	<ul>
			         <li><a  href="hotel.php">HOME</a></li>
				     <li><a href="food.php">GALLERY</a></li>
				     <li><a href="index.php">BOOKING</a></li>
				     <li><a href="adminlogin.php">ADMIN</a></li>
				     <li style="float:right"><a class="active " href="Contact.php" >CONTACT <span class="caret"></span></a>
					      
					 </li>
			     </ul></div>
				 
				 
				 <?php
include('include/db_con.php');
session_start();
if(isset($_POST['submit']))
{
$user=$_POST['username'];
$e=$_POST['email'];
$p=$_POST['phone'];
$sub=$_POST['subject'];


$sql="INSERT INTO feedback(username,email,phone,subject)VALUES('".$user."','".$e."','".$p."','".$sub."')";
$s=mysqli_query($con,$sql) or die (mysqli_error($con));
if($s)
{
?> 
<script>alert("Successfully sent feedback. ");</script>
<?php 
}}
?>

     
	  
	                <div class="row">
					
					
					    <div class="column">
			            
				     	<h3 style="font-size:30px; align:center;color:white">Our Service Line :</h3><br>
						    	<p ><span style="color:blue; font-size:20px">Address: Rajdhani colony.</span></p>
						   		<p style="color:white;">Street address:9/A Rankin park street.</p>
						   		<p style="color:white;">Dhaka, Bangladesh.</p><br>
				   		<p><span style="color:red; font-size:20px">Service line 1:</span> <p style="color:white;">01711XXXXX</p></p><br>
						<p><span style="color:red; font-size:20px">Service line 2:</span><p style="color:white;"> 01712XXXXX</p></p><br>
						<p><span style="color:red; font-size:20px">Service line 3:</span> <p style="color:white;">01713XXXXX</p></p><br>
						<p><span style="color:red; font-size:20px">Service line 4: </span><p style="color:white;">01714XXXX</p></p><br>
				   		<p><span style="color:red; font-size:20px">Fax: </span><p style="color:white;">(000) 00000000</p></p><br>
				 	 	<p><span style="color:red; font-size:20px">Email:</span> <span><p style="color:white;">info@treebohotel.com</p></span></p><br>
				   		<p><span style="color:red; font-size:20px">Follow us on:</span> <span><p style="color:white;">Facebook</p></span>, <span>Twitter</span></p>
					 	<br></br>
						
                   					
				        </div>
						
						
						 <div class="column">
						 <div class="f">
				  	     <h3 style="font-size:30px; color:white">Feedback Us</h3>
					      <br></br>
					     <form method="post" action="contact.php">
					    	<div>
						    	<span><label>FULL NAME</label></span><br>
						    	<span><input name="username" type="text" ></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL ID</label></span><br>
						    	<span><input name="email" type="text" ></span>
						    </div>
						    <div>
						     	<span><label>MOBILE NUMBER</label></span><br>
						    	<span><input name="phone" type="text" ></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span><br>
						    	<span><input name="subject" type="text" class="subject" style="width:98%; height:80px;"></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Submit" name="submit"style="border:none;font-size: 30px;font-weight: 400; 	color: #71D6EA;line-height: 1.2em;"></span>
						  </div>
					    </form>
						</div>

				    </div>
					</div>
					
					
					
	                    <div class="c">
						
				         <div class="centered" style="margin-top:15px;margin-left:40px; font-size:35px;color:white"> <label >Admin  <a href="login.php" style="color:white">Login</a></label></div>
				         
						  </div>
						 
                   
				   
				  
				
		
				
				 
				
  				<br></br><br>
				
				
				




</body>
</html>