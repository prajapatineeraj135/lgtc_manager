<?php
include('smtp/PHPMailerAutoload.php');
include('connection.php'); // Add your database connection here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch input fields and escape them
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $contact1 = htmlspecialchars($_POST['contact1']);
    $contact2 = htmlspecialchars($_POST['contact2']);
    $email = htmlspecialchars($_POST['email']);
    $street1 = htmlspecialchars($_POST['street1']);
    $street2 = htmlspecialchars($_POST['street2']);
    $landmark = htmlspecialchars($_POST['landmark']);
    $pincode = htmlspecialchars($_POST['pincode']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    
    $token = bin2hex(random_bytes(50)); // Generate verification token

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Email already exists";
        exit();
    }

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password, firstname, lastname, contact1, contact2, email, street1, street2, landmark, pincode, city, state, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $username, $password, $firstname, $lastname, $contact1, $contact2, $email, $street1, $street2, $landmark, $pincode, $city, $state,  $token);
    if ($stmt->execute()) {
        // Send verification email
        $verificationLink = "http://localhost/lgtc/signup/verify.php?email=$email&token=$token";
        $subject = "Email Verification";
        $message = "Click this link to verify your email: <a href='$verificationLink'>$verificationLink</a>";
        
        if (smtp_mailer($email, $subject, $message)) {
            echo "Registration successful, check your email to verify your account.";
        } else {
            echo "Registration failed, could not send email.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Function to send the email
function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "mail.petshala.in";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0; // Change to 2 for debugging
    $mail->Username = "nmtc@petshala.in";
    $mail->Password = "Nmtc@135";
    $mail->SetFrom("nmtc@petshala.in", "Your Site Name");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true // Allow self-signed certificates
    ));
    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return true;
    }
}
?>
