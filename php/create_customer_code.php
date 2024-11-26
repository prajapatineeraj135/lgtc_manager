<?php
include 'connection.php';
session_start(); // Start the session

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        // Collect form data
        $account_id = $_POST['account_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $description = $_POST['description'];

        // SQL query to insert data into the database
        $sql = "INSERT INTO customers (account_id, firstname, lastname, contact, address, city, description) 
                VALUES ('$account_id', '$firstname', '$lastname', '$contact', '$address', '$city', '$description')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            // Store success message in session
            $_SESSION['success'] = "Customer created successfully";

            // Redirect to the customer page
            header("Location: http://localhost/lgtc/customer/");
            exit(); // Make sure to stop further script execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['search'])) {
        // Handle the search action (not implemented here)
        echo "Search feature coming soon.";
    } elseif (isset($_POST['update'])) {
        // Handle the update action (not implemented here)
        echo "Update feature coming soon.";
    } elseif (isset($_POST['delete'])) {
        // Handle the delete action (not implemented here)
        echo "Delete feature coming soon.";
    }
}

// Close the connection
$conn->close();
?>
