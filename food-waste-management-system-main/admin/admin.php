<?php
ob_start();
session_start(); // Start the session

// Include database connection
include("connect.php");

// Redirect to signin.php if session 'name' is not set
if (!isset($_SESSION['name']) || $_SESSION['name'] == '') {
    header("location:signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title>
    <?php
    // Database connection
    $connection = mysqli_connect("localhost:3306", "root", "");
    $db = mysqli_select_db($connection, 'demo');
    ?>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>
            <span class="logo_name">ADMIN</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="feedback.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Feedbacks</span>
                </a></li>
                <li><a href="adminprofile.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                      <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <p class="logo">Anna<b style="color: #06C167;">daya</b></p>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <span class="text">Total users</span>
                        <?php
                        $query = "SELECT count(*) as count FROM login";
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Feedbacks</span>
                        <?php
                        $query = "SELECT count(*) as count FROM user_feedback";
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-heart"></i>
                        <span class="text">Total donates</span>
                        <?php
                        $query = "SELECT count(*) as count FROM food_donations";
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Donations</span>
                </div>

                <div class="get">
                    <?php
                    // Fetch recent donations
                    $sql = "SELECT * FROM food_donations ORDER BY date DESC LIMIT 10";
                    $result = mysqli_query($connection, $sql);

                    if (!$result) {
                        die("Error executing query: " . mysqli_error($connection));
                    }

                    // Fetch the data as an associative array
                    $data = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                    ?>

                    <!-- Display the recent donations in a table -->
                    <div class="table-container">
                        <div class="table-wrapper">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Food</th>
                                        <th>Category</th>
                                        <th>Phone No</th>
                                        <th>Date/Time</th>
                                        <th>Address</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) { ?>
                                    <tr>
                                        <td data-label="Name"><?= $row['name'] ?></td>
                                        <td data-label="Food"><?= $row['food'] ?></td>
                                        <td data-label="Category"><?= $row['category'] ?></td>
                                        <td data-label="Phone No"><?= $row['phoneno'] ?></td>
                                        <td data-label="Date"><?= $row['date'] ?></td>
                                        <td data-label="Address"><?= $row['address'] ?></td>
                                        <td data-label="Quantity"><?= $row['quantity'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="admin.js"></script>
</body>
</html>
