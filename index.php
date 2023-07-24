<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <a href="show_users.php" class="link">Users</a>
    <img src="avatar.jpeg" class="passport" alt="Your passport photo">
    <div class="container">
        <form action="submit.php" method="post" id="contact-form">
            <div class="title">
                Registration Form
            </div>
            <div class="form">
                <div class="input_field">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="input" placeholder="Enter your name">
                </div>
                <div class="input_field">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="input" placeholder="Enter your email">
                </div>
                <div class="input_field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input">
                </div>
                <div class="input_field">
                    <label for="phone_number">Phone Number</label>
                    <input type="tel" name="phone_number" id="phone_number" class="input"
                        placeholder="Enter your phone number">
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" value="Male">
                    <input type="radio" name="gender" id="dot-2" value="Female">
                    <input type="radio" name="gender" id="dot-3" value="Other">
                    <span class="gender-title">Select Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Other</span>
                        </label>
                    </div>
                </div>
                <div class="input_field">
                    <label for="language">Language</label>
                    <select id="language" name="language" class="select_language">
                        <option value="">Select Language</option>
                        <?php
                    $hostname = "localhost";
                    $password = "";
                    $username = "root";
                    $database = "formdetails";

                    $conn = mysqli_connect($hostname, $username, $password, $database);

                    if (!$conn) {
                        echo '<option value="">No languages found</option>';
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // get all languages from database
                    $languages = mysqli_query($conn, "SELECT * FROM languages;");

                    if (mysqli_num_rows($languages) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($languages)) {
                            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                        }
                    } else {
                        echo "0 results";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    </select>
                </div>
                <div class="input_field">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" name="zip_code" id="zip_code" class="input">
                </div>
                <div class="input_field">
                    <label for="message">About</label>
                    <textarea name="message" id="message" cols="20" rows="5" class="textarea"
                        placeholder="Write about yourself"></textarea>
                </div>

                <ul class="errors"></ul>

                <div class="input_field">
                    <input type="submit" value="Register" class="btn">
                </div>
            </div>

        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>