<?php include 'session_start.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>

  
        <form class="form" action="" >
        <h2>User Details</h2>
        <div class="user_container">
            <label>Name :</label><br>
            <input type="text" class="user_feild" name="username" placeholder="User Name" readonly><br>
            <input type="text" class="user_feild" name="firstname" placeholder="First Name" readonly>
            <input type="text" class="user_feild" name="lastname" placeholder="Last Name" readonly>
        </div>


        <div class="user_container">
            <label>Contacts :</label><br>
            <input type="text" class="contact_feild" name="contact1" placeholder="Contact 1" readonly>
            <input type="text" class="contact_feild" name="contact2" placeholder="Contact 2" readonly>
            <input type="text" class="contact_feild" name="email" placeholder="Email" readonly>
        </div>

        <div class="user_container">
            <label>Address :</label><br>
            <input type="text" class="add_feild" name="street1" placeholder="Street 1" readonly>
            <input type="text" class="add_feild" name="street2" placeholder="Street 2" readonly>
            <input type="text" class="add_feild" name="landmark" placeholder="Land Mark" readonly><br>
            <input type="text" class="add_feild" name="pincode" placeholder="Pincode" readonly>
            <input type="text" class="add_feild" name="city" placeholder="City" readonly>
            <input type="text" class="add_feild" name="state" placeholder="State" readonly>
        </div>


        <div class="button_container">

            <form action="http://localhost/lgtc\login\logout.php" method="post">
            <button type="submit">Logout</button>

            <button class="button">Edit Details</button>

        </div>

        </form>

    </div>


</body>
</html>
