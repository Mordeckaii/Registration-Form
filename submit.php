<?php
require_once 'conn.php'; // import the database credentials

// Validate and sanitize the form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$phone = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$language = isset($_POST['language']) ? $_POST['language'] : '';
$zip = isset($_POST['zip_code']) ? $_POST['zip_code'] : '';
$about = isset($_POST['message']) ? $_POST['message'] : '';

// Validate the required fields
if (empty($name) || empty($email) || empty($password)) {
  die('Error: Required fields are missing');
}

// Sanitize the input data to prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$phone = mysqli_real_escape_string($conn, $phone);
$gender = mysqli_real_escape_string($conn, $gender);
$language = mysqli_real_escape_string($conn, $language);
$zip = mysqli_real_escape_string($conn, $zip);
$about = mysqli_real_escape_string($conn, $about);

// Insert the form data into the 'users' table using prepared statements
$insert_query = "INSERT INTO users (name, email, password, phoneNumber, gender, language, zipCode, about) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param($stmt, 'ssssssss', $name, $email, $password, $phone, $gender, $language, $zip, $about);

if (!mysqli_stmt_execute($stmt)) {
  die('Error: ' . mysqli_error($conn));
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the MySQL connection
mysqli_close($conn);

// Redirect the user to a confirmation page
header('Location: success.php');
exit;
?>