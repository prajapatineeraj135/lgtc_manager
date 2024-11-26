<?php
                include('connection.php');

                // Query to get the last saved account number
                $query = "SELECT account_id FROM customers ORDER BY account_id DESC LIMIT 1";
                $result = $conn->query($query);

                // Check if any account numbers exist
                if ($result->num_rows > 0) {
                    // Fetch the last account number
                    $row = $result->fetch_assoc();
                    $last_account_number = $row['account_id'];

                    // Increment the last account number by 1
                    $new_account_number = intval($last_account_number) + 1;
                } else {
                    // If no previous account number exists, start with 100001
                    $new_account_number = 202401;
                }

                // Close the database connection
            
?>