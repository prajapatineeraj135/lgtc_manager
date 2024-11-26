<?php 
 
include("connection.php");

include 'session_start.php';

include 'side_bar.php';
// Check if there's a success message and display it
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
    // Unset the message after displaying it
    unset($_SESSION['success']);
}


?>

    
<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
    <script>
        // Confirmation message for delete
        function confirmDelete() {
            return confirm("Are you sure you want to delete this customer?");
        }

        // Confirmation message for update
        function confirmUpdate() {
            return confirm("Are you sure you want to update the details for this customer?");
        }
    </script>
</head>
<body>

    <h2>Create Customer</h2>
    <form action="create_customer.php" method="POST">

        <label for="account_id">Account No:</label><br>
        <input type="text" name="account_id" class="user_field" value="<?php include 'account_id.php'; echo $new_account_number; ?>" readonly required><br><br>

        <label for="full_name">Name:</label><br>
        <input type="text" class="user_feild" name="firstname" placeholder="First Name" required>
        <input type="text" class="user_feild" name="lastname" placeholder="Last Name" ><br><br>

        <label for="contact">Contact:</label><br>
        <input type="text" class="contact_feild" name="contact" placeholder="Phone Number" pattern="\d{10}" title="Please enter a valid 10-digit phone number" required><br><br>


        <label for="address">Address:</label><br>
        <input type="text" class="address_feild" name="address" placeholder="Address"><br><br>

        <label for="city">City:</label><br>
        <input type="text" class="address_feild" name="city" placeholder="City" required><br><br>

        <label for="description">Description:</label><br>
        <textarea class="description_feild" name="description" placeholder="Description"></textarea><br><br>

        <input type="submit" class="button_create" name="create" value="Create">
        <input type="submit" class="button_search" name="search" value="Search">
        <input type="submit" class="button_update" name="update" value="Update" onclick="return confirmUpdate()">
        <input type="submit" class="button_delete" name="delete" value="Delete" onclick="return confirmDelete()">
    </form>
</body>
</html>
