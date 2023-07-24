<link rel="stylesheet" href="styles.css">
<a href="index.php" class="link">Register</a>
<title>Table of Users</title>
<body_data>
    <main>
        <form method="GET" action="user_search.php">
            <div class="search" align="right">
                <input type="search" name="search" placeholder="Search...">
                <input type="submit" value="Search" class="search-button">
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Language</th>
                    <th>Zip Code</th>
                    <th>About</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'conn.php'; // import the database credentials

                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phoneNumber LIKE '%$search%'";
                } else {
                    $sql = "SELECT * FROM users";
                }

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $user_records[] = $row;
                    }
                    foreach ($user_records as $user) {
                        echo "<tr>";
                        echo "<td>" . $user['name'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "<td>" . $user['phoneNumber'] . "</td>";
                        echo "<td>" . $user['gender'] . "</td>";
                        echo "<td>" . $user['language'] . "</td>";
                        echo "<td>" . $user['zipCode'] . "</td>";
                        echo "<td>" . $user['about'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body_data>