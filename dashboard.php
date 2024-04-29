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
// You can fetch additional user data here if needed

// Check if logout button is clicked
if (isset($_POST['logout'])) {
    // Destroy session
    session_unset();
    session_destroy();
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>

        
        /* Your CSS styles for the dashboard */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/bgbg.jpg'); /* Add background image */
            background-size: cover;
            background-position: center;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Add background color with transparency */
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
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .content h2 {
            margin-top: 0;
            color: white; /* Change text color to white for better readability */
        }
    </style>

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
        <li><a href="">Pending</a></li> 
        <li><a href="">Pending</a></li> 
            <li><a href="#">User Info</a></li> <!--to be coded soon-->
            <!-- Logout button -->
            <li>
                <form method="post">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Page content -->
    <div class="dashboard-content">
    <div class="content">
        <h2>Pasok! AYOS KAAYO ka user <?php echo $user_email;?></h2>
        <p>Welome bai, salamat kaayo sa pag login.
            Moral lesson: Kaon og tarong, ayaw pagutom, alagai imong kaugalingon, and mag pray everyday.
        </p>
    </div>
</body>
</html>
