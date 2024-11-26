<?php 
include 'connection.php';
session_start(); // Start the session

// php code for login function
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, firstname, username, password, is_verified FROM users WHERE BINARY username = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $firstname, $username, $hashed_password, $is_verified);
        $stmt->fetch();

        // Check if the email is verified
        if ($is_verified == 1) {
            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start a session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username; 
                $_SESSION['id'] = $id;
                $_SESSION['firstname'] = $firstname;

                // Redirect to the protected page
                header("location: http://localhost/lgtc/login/dashboard.php");
                exit; // Ensure script stops executing after redirect
            } else {
                echo "Invalid Username and Password.";
            }
        } else {
            echo "Please Verify Your Email Before Logging ";
        }
    } else {
        echo "No Account Found With That Username";
    }

    $stmt->close();
    $conn->close();
}
?>
