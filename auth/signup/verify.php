<?php
include('connection.php');

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Verify the user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND token = ?");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update user to mark as verified
        $stmt = $conn->prepare("UPDATE users SET is_verified = 1, token = '' WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            // Redirect to login page with a success message
            header("Location: http://localhost/lgtc/login/?message=verified");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            echo "Error verifying email.";
        }
    } else {
        echo "Invalid verification link.";
    }
}
?>
