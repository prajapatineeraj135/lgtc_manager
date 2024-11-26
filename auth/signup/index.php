<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="home_page_style.css">
    <script>
        function redirectToOtherPage4() {
            window.location.href = 'http://localhost/lgtc/signup';
        }

        function redirectToOtherPage5() {
            window.location.href = 'http://localhost/lgtc/login';
        }

        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                document.getElementById("message").innerHTML = "Passwords do not match!<br>";
                return false; // Prevent form submission
            } else {
                document.getElementById("message").innerHTML = "";
                return true; // Allow form submission
            }
        }
    </script>
</head>
<body>
    <div class="navbar">
        <a onclick="redirectToOtherPage4()">Sign Up</a>
        <a onclick="redirectToOtherPage5()">Login</a>
    </div>

    <div class="center">
        <h1>User Signup</h1>
        <div class="container">
            <!-- signup.html -->
            <form method="POST" action="" onsubmit="return validatePassword()">
                <?php include 'register.php' ?>
                
                <div class="login_signup_container">
                    <label>Login Details:</label><br>
                    <input type="text" class="user_feild" name="username" placeholder="User Name" required><br>
                    <span id="message" style="color:red;"></span>
                    <input type="password" class="user_feild" id="password" name="password" placeholder="Password" required><br>
                    <input type="password" class="user_feild" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required><br>
                </div>

                <div class="name_container">
                    <label>Name:</label><br>
                    <input type="text" class="user_feild" name="firstname" placeholder="First Name">
                    <input type="text" class="user_feild" name="lastname" placeholder="Last Name">
                </div>


                <div class="contact_container">
                    <label>Contacts:</label><br>
                    <input type="text" class="contact_feild" name="contact1" placeholder="Contact 1">
                    <input type="text" class="contact_feild" name="contact2" placeholder="Contact 2">
                    <input type="text" class="contact_feild" name="email" placeholder="Email" required >
                </div>

                <div class="address_container">
                    <label>Address:</label><br>
                    <input type="text" class="address_feild" name="street1" placeholder="Street 1">
                    <input type="text" class="address_feild" name="street2" placeholder="Street 2">
                    <input type="text" class="address_feild" name="landmark" placeholder="Landmark"><br>
                    <input type="text" class="address_feild" name="pincode" placeholder="Pincode">
                    <input type="text" class="address_feild" name="city" placeholder="City">
                    <input type="text" class="address_feild" name="state" placeholder="State">
                </div>

                <div class="button_container">
                    <button type="submit" name="submit" class="button_submit">Register</button>
                </div>
            </form>
        </div>
    </div>

    <?php 
    echo "<script>document.getElementsByName('username')[0].focus();</script>";
    ?>
</body>
</html>
