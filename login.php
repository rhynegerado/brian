<?php
session_start();

include("header.php");
include("navbar.php");
?>

<div class="background-image" id="">
    <div class="container pt-3">

        <?php
        // Check if registration status is set and display the message
        if (isset($_SESSION['status']) && $_SESSION['status'] === "Registration successful!") {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['status'] . '</div>';
            unset($_SESSION['status']); // unset the session variable to prevent it from showing again on refresh
        }
        ?>

        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="login_code.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                        <span class="input-group-text toggle-password" onclick="togglePasswordVisibility('pwd', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <button type="submit" name="loginbtn" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
