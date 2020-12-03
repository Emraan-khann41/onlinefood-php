<?php
@ob_start();
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <link href="css/indexstyle.css" rel="stylesheet" type="text/css"  media="all" />
<script>
     
        function signup()
      {

          var alt="";
          var x=document.forms["signupform"]["firstname"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
         var y=document.forms["signupform"]["lastname"].value;
         if (y==null || y=="")
            {
              
              alt += "Last name must be filled out\n";
              
            }
			var x=document.forms["signupform"]["daytimephone"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
          var z=document.forms["signupform"]["email"].value;
          var atpos=z.indexOf("@");
          var dotpos=z.lastIndexOf(".");
              
           if (atpos<1 || dotpos<atpos+2 || dotpos+2>=z.length)
              {
             alt += "Not a valid e-mail address\n";
             
              }
         
          var v=document.forms["signupform"]["password1"].value; 
         
          if (v==null || v=="")
            {
              alt += "password must be filled out\n";
                 
            }
         var t=document.forms["signupform"]["password2"].value; 
         if (t==null || t=="")
            {
              alt += "confirm password must be filled out\n";
                
            }
			 if (v != t)
            {
              alt += "password  doesn't  match\n";
                 
            }
          if((document.forms["signupform"]["usertype1"].checked==false)&& (document.forms["signupform"]["usertype2"].checked==false))
      
            {
               alt += "payment type  must be filled out\n";
                     
            }
   
        if (alt != "")
             {
               alert(alt);
              return false;
             }
			 else {
			 	form.Submit()
			 }
}

     </script>
</head>




<body style="background-color:#277A41; background-image: url(upload/b1.png);" >

<header >
	<div class="logo"> <img src="logo1.jpg" style="width:250px;height:120px;"></div>
     </header>
<div class="nav">
	<ul>
			         <li><a  href="hotel.php">HOME</a></li>
				     <li><a href="food.php">FOODS</a></li>
				     <li><a class="active"href="index.php">ORDER</a></li>
				     <li><a href="adminlogin.php">ADMIN</a></li>
				     <li style="float:right"><a href="contact.php">CONTACT</a></li>
			     </ul></div>



<?php 
include('include/db_con.php');
if(isset($_POST['Submit']))
{
$fn=$_POST['firstname'];
$ln=$_POST['lastname'];
$phone=$_POST['daytimephone'];
$email=$_POST['email'];
$pass=$_POST['password1'];
$city=$_POST['city'];
$country=$_POST['country'];
$intr=$_POST['usertype'];

$s1="INSERT INTO customer (first_name,last_name,phone,user_email,user_password,city,country)
VALUES('".$fn."','".$ln."','".$phone."','".$email."','".$pass."','".$city."','".$country."')";
mysqli_query($con,$s1) or die (mysqli_error($con));
if($s1)
{?>
	<script>alert("You have successfully created an account, now please log in. ");</script><?php
}
}
?>

<h2  align="center" style="color:black; font-size:40px; margin-top:25px;">Welcome to our BANGALIANA </h2>


<table style="margin-left:35px;">

 <form method="POST" name="signupform" action="index.php" onSubmit="return signup();" >
         <tr><td><h3 style="font-size:29px;">Create an Account First:</h3></td></tr>
		 <tr></tr>
		 <tr>
		<td height="40"style="font-weight:bold" >FirstName:</td>
		<td><input name="firstname" type="text" id="firstname" size="40" />
		
		</td>
	</tr>
	<tr>
		<td height="40" style="font-weight:bold">LastName:</td>
		<td><input name="lastname" type="text" id="lastname" size="40"  />
		
		</td>
	</tr>
	<tr>
		<td height="40" style="font-weight:bold">Phone:</td>
		<td><input name="daytimephone" type="text" id="daytimephone" size="40" class="phone" />
		
		</td>
	</tr>
	<tr>
		<td height="40" style="font-weight:bold">E-mail:</td>
		<td><input name="email" type="text" id="email" size="40"  />
		
		</td>
	</tr>
	
	<tr>
		<td height="40" style="font-weight:bold">Password:</td>
		<td><input name="password1" type="password" id="password1" size="40" />
		
		</td>
	</tr>
	<tr>
		<td height="40" style="font-weight:bold">Confirm Password:</td>
		<td><input name="password2" type="password" id="password2" size="40" />
		
		</td>
	</tr>
    <br>
	<tr>
		<td height="40" style="font-weight:bold">City/State</td>
		<td><input name="city" type="text" id="city" size="40"  />
		</td>
	</tr>
    <br>
	<tr>
		<td height="40"style="font-weight:bold">Country</td>
		<td><input name="country" type="text" id="country" size="40" />
		
		</td>
	</tr>
    <br>
	
	
	<tr>
	<td></td>
	<td align="" width="">
	    <input type="submit" class="b" name="Submit" value="Submit" style="width:48%; height:28px;font-weight:bold" />
		<input type="reset"  class="b" name="reset"  value="Reset" style="width:49%; height:28px;font-weight:bold" />
		
    </td>
	</tr>
    </form>
   </table>

<br></br>
<br></br>


	
	<?php 
	include('include/db_con.php');
	session_start();
		if (isset($_POST['username'],$_POST['password']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
  
                   if (empty($username) || empty($password))
                   {
                      $error = 'Hey All fields are required!!';
                    }
                     
					 else {  
					 $login="select * from customer where user_email='".$username."' and user_password ='".$password."'";
					 $result=mysqli_query($con,$login);
					 
				
					 
					if(mysqli_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:order.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
  ?>
  
  
	<form action="index.php" method="POST" style="margin-left:35px;">
	<h2 >Login Through Your Account:</h2><br>
	
        <table align="" id="t">
		<tr> 
		<?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?> </tr>
          <tr>
            <td width="150" style="font-weight:bold; height:40px">Email:</td>
            <td width="215">
              <input name="username" type="text"  size="40" /></td>
          </tr>
          <tr>
            <td style="font-weight:bold;height:40">Password:</td>
            <td>
              <input name="password" type="password"  size="40" /></td>
          </tr>
          <tr>
		     <td></td>
            <td colspan="2" align="">
			<input type="submit" class="b " name="sub" value="Login" style="width:49%; height:28px;font-weight:bold" /></td>
            </tr>
			
       </table>
		</form>
		
		
	


<br></br>
<br></br>
     
					<div class="footer">
					<ul>
						
						<li><a href="contact.php">Help..!!</a></li>
						<li><a href="service.php">FAQs</a></li>
						
					</ul>
				</div>


</body>
</html>