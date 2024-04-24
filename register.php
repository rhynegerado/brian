

<?php
session_start();


$page_title = "Register";


include("header.php");
include("navbar.php");
?>


<div class="center-container">
  <div class="background-image" id="">
    <div class="container pt-3">
    <div class="col"><!-- 1st Column Registration form -->
        <?php
            if (isset($_SESSION['status'])) {
        ?>
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Great!</strong> <?= $_SESSION['status'] ?>
            </div>
            <?php
                unset($_SESSION['status']);
            }
        ?>
            <div class="card">
                <div class="card-header"><h4>Registration</h4></div>
                <div class="card-body">
                <form action="regi_code.php" method="POST">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname">
                        <label for="mname">Middle Name</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="lname" placeholder="Last name" name="lname">
                        <label for="lname">Last name</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-group mb-3">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pswd" onkeyup="validatePassword()">
                                <span class="input-group-text toggle-password">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Confirm password" id="cpwd" name="cpswd" onkeyup="validatePassword2()">
                                <span class="input-group-text toggle-password">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div id="confirm-password-feedback" style="display: none;">Passwords do not match!</div>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
   
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.toggle-password').click(function(){
        var inputField = $(this).prev('input[type=password]');
        var icon = $(this).find('i');


        if(inputField.attr('type') === 'password') {
            inputField.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            inputField.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
});
</script><!-- kulang ni dugangi ni na once nka show na sya i hide nya vise versa toggling -->






<?php
include("footer.php");
?>


<?php


