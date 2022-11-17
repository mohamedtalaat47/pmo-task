<?php

include_once('includes/user.php');

$auth = new user();
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $user = $auth->Login($username, $password);
        if ($user) {
            header("location:index.php");
        } else {
            echo "<script>alert('Email / Password Not Match')</script>";
        }
    }
} ?>
<?php include 'includes/header.php' ?>

<div class="login-hero">
    <h1 class="text-white">Login</h1>
</div>
<div>
    <div class="col-sm-8 col-md-6 col-lg-4 m-auto border p-5 rounded my-5 shadow">
        <form method="post" action="">
            <!-- user input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">user name</label>
                <input name="username" required type="text" id="form2Example1" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input  name="password" required type="password" id="form2Example2" class="form-control" />
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">

                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 w-100" value="login">

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="signup.php">Signup</a></p>
        </form>
    </div>
</div>


<?php include 'includes/footer.php' ?>