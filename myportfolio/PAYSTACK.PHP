Your PHP code appears to have some issues. Let's address them:

Error Reporting:

It's generally not recommended to set error_reporting to 0 in a production environment as it makes debugging difficult. You might want to set it to error_reporting(E_ALL) during development and error_reporting(0) for production.
Database Connection:

It's crucial to handle database connection errors. You should check for a connection error after creating the connection and display an appropriate message if the connection fails.
mysqli_query Function:

The mysqli_query function is typically used for executing queries, but in your case, you are using it incorrectly for executing an insert query. Use $conn->query for this purpose.
Email Sending:

The mail function might not work on all servers, and it doesn't handle errors well. Consider using a more robust email library like PHPMailer.
Here's a revised version of your code:

php
Copy code
<?php
// Enable error reporting for development
error_reporting(E_ALL);

// Include database connection file
include('dbconnect.php');

// Check for database connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// table name
$tbl_name = 'training_orders';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $trainingType = mysqli_real_escape_string($conn, $_POST["trainingType"]);

    // Insert data into the training_orders table
    $sql = "INSERT INTO training_orders (name, email, phone, training_type) VALUES ('$name', '$email', '$phone', '$trainingType')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully";

        // Send email to the sender using PHPMailer or another email library

        // Redirect the visitor to the Paystack payment page
        $paystackPaymentURL = "https://paystack.com/pay/4oju-mwz3t";
        header("Location: $paystackPaymentURL");
        exit; // Ensure that no further code is executed after the redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
Note: For email functionality, consider using a more robust library like PHPMailer for better error handling and security. Also, make sure that the Paystack payment URL is correct and that you've implemented appropriate security measures for handling user inputs.




