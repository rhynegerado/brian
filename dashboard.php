<?php
// Start session
session_start();

// Check if user is authenticated, if not, redirect to login page
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== TRUE) {
    header("Location: login.php");
    exit();
}

// Include database connection file
include("db_connect.php");

// Fetch user data for the sidebar
$user_email = $_SESSION['auth_user']['email'];


// Check if logout button is clicked
if (isset($_POST['logout'])) {
    // Destroy session
    session_unset();    
    session_destroy();
    // Redirect to login page
    header("Location: index.php"); // home ang location depende sa inyo
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include Font Awesome CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css' rel='stylesheet' /> <!-- FullCalendar CSS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js'></script> <!-- FullCalendar JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script> <!-- Chart.js -->
    <style>
        /* Your CSS styles for the dashboard */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #3498db; /* Blue background color */
        }
        .sidebar {
            height: 100%;
            width: 80px; /* sidebar width */
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Background color with transparency */
            padding-top: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            text-align: center;
        }
        .sidebar ul li i {
            color: white;
            font-size: 24px; /* Icon size */
            cursor: pointer; /* Cursor for clickable icons */
        }
        .content {
            display: flex; /* Use flexbox to arrange columns */
            padding: 20px;
            margin-left: 80px; /* Adjusted margin to accommodate sidebar width */
        }
        .column1 {
            flex: 2; /* Larger width for the first column */
            padding-right: 20px;
            color: white;
        }
        .column2 {
            flex: 1; /* Smaller width for the second column */
            background-color: #ffffff; /* White background color */
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .content h2 {
            margin-top: 0;
            color: white; /* Text color to white */
            display: flex;
            align-items: center; /* Icon and text vertically aligned */
        }
        .activity-icon {
            margin-right: 10px; /* Space between icon and text */
        }
        .icon-container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 20px;
        }
        .icon-container a {
            color: black;
            text-decoration: none;
        }
        .notification-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><i class="fas fa-tasks" id="pending"></i></li>
            <li><i class="fas fa-user" id="user-info"></i></li>
            <!-- Logout button -->
            <li>
                <form id="logout-form" method="post">
                    <button type="submit" name="logout" style="background: none; border: none; cursor: pointer;">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Page content -->
    <div class="dashboard-content">
        <div class="content">
            <div class="column1">
                <h1> DASHBOARD </h1>
                <<i class="fas fa-chart-line activity-icon"></i> ACTIVITIES
                <div style="padding-top: 10px;"> <!-- Adjust padding as needed -->
                    <?php
                    // Array of random notifications
                    $notifications = [
                        "New message from client A",
                        "Project",
                        "Team meeting",
                        "Task assigned by manager",
                        "Server maintenance",
                        "Holiday ",
                        "Project status update"
                    ];

                    // Display up to 5 random notifications
                    foreach ($notifications as $notification) {
                        echo '<div class="notification-container">' . $notification . '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="column2">
                <!-- White box -->
                <div class="white-box">
                    <!-- Chart will be rendered here -->
                    <canvas id="randomChart" width="400" height="400"></canvas>
                </div>
                <!-- Icon container -->
                <div class="icon-container">
                    <a href="statistics.php"><i class="fas fa-chart-bar"></i></a>
                    <a href="time.php"><i class="fas fa-clock"></i></a>
                    <a href="activity.php"><i class="fas fa-briefcase"></i></a>
                    <a href="profile.php"><i class="fas fa-user"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generate a random array of data for the chart
        function generateRandomData() {
            let data = [];
            for (let i = 0; i < 7; i++) {
                data.push(Math.floor(Math.random() * 100));
            }
            return data;
        }

        // Create a random chart
        var ctx = document.getElementById('randomChart').getContext('2d');
        var randomChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'Users',
                    data: generateRandomData(),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Red background color
                    borderColor: 'rgba(255, 99, 132, 1)', // Red border color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
