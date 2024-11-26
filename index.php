<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Document</title>
	 <link rel="stylesheet" type="text/css" href="home_page_style.css">
</head>


<body>
		<div class="navbar">
        <a onclick="redirectToOtherPage4()" >Sign Up</a>
        <a onclick="redirectToOtherPage5()" >Login</a>
        </div>


        <script>
        function redirectToOtherPage4() {window.location.href = 'http://localhost/lgtc/signup';}
        function redirectToOtherPage5() {window.location.href = 'http://localhost/lgtc/login';}
        </script>   


    <div Class="center" >
        <h1>User Login</h1>
    <div class="form">
    			<?php include 'login/login.php'; ?>
                <form name="form" action="" method="POST">
                <?php
				if (isset($_GET['message']) && $_GET['message'] == 'verified')
				 	{
				    echo "<p style='color: green;'>Your email has been verified successfully. You can now login</p>";
					}
				?>	
				
				<input class="fi" type="text" id="username" name="username"   placeholder="Username" required>
			    </br>
				
				<input class="fi" type="password" id="password" name="password"  maxlength="10" placeholder="Password" required>
				</br>
				<button class="fb" type="submit" name="login" >Login</button>
			    </form></br>
			    
    </div>                                  
    </div>
           
                    
</body>
<?php 
echo "<script>document.getElementsByName('username')[0].focus();</script>";
 ?>
</html>
