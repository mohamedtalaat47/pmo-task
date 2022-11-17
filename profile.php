<?php include 'includes/header.php' ?>
<?php

if (!isset($_SESSION['login'])) {
    header('location:login.php');
}

include_once('includes/user.php');

$auth = new user();
$profile = $auth->getUser();

if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $company_phone = $_POST['company_phone'];
    $company_mobile = $_POST['company_mobile'];
    $company_since = $_POST['company_since'];
    $company_website = $_POST['company_website'];
    $company_capital = $_POST['company_capital'];
    $company_employees_num = $_POST['company_employees_num'];
    $company_profile = $_POST['company_profile'];
    $emp_name = $_POST['emp_name'];
    $emp_title = $_POST['emp_title'];
    $emp_email = $_POST['emp_email'];
    $emp_mobile = $_POST['emp_mobile'];
    $emp_since = $_POST['emp_since'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (is_uploaded_file($_FILES['company_logo']['tmp_name'])) {
        $company_logo = date('Y-m-d-h-s') . $_FILES['company_logo']['name'];
        $company_logo_tmp = $_FILES['company_logo']['tmp_name'];
        move_uploaded_file($company_logo_tmp, "uploads/logos/$company_logo");
    } else {
        $company_logo = null;
    }

    if (
        preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $emp_email) && !empty($category) && !empty($company_name) && !empty($company_address)
        && !empty($company_phone) && !empty($company_mobile) && !empty($company_since) && !empty($company_website) && !empty($company_capital) && !empty($company_employees_num)
        && !empty($emp_name) && !empty($emp_title) && !empty($emp_email) && !empty($emp_mobile) && !empty($emp_since) && !empty($username) && !empty($password)
    ) {
        $update = $auth->UserUpdate(
            $username,
            $password,
            $emp_name,
            $emp_title,
            $emp_email,
            $emp_mobile,
            $emp_since,
            $category,
            $company_name,
            $company_address,
            $company_phone,
            $company_mobile,
            $company_since,
            $company_website,
            $company_capital,
            $company_employees_num,
            $company_profile,
            $company_logo
        );
        if ($update) {
            echo "<script>alert('data updated successfully')</script>";
            header('location:profile.php');
        } else {
            echo "<script>alert('update failed')</script>";
        }
    }
}

?>


<div class="login-hero">
    <h1 class="text-white">Profile</h1>
</div>
<div class="container">
    <div class="col-sm-12 col-md-8 m-auto border p-5 rounded shadow" style="margin: 80px auto !important;">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12 mt-2">
                    <div class=" d-flex justify-content-start align-items-center my-3">
                        <img class="rounded-circle" src="uploads/logos/<?php echo $profile['company_logo'] ?>" height="100px" width="100px"/>
                        <h2 class="ms-2"><?php echo $profile['emp_name'] ?></h2>
                    </div>
                    <h3> Company Info</h3>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Company Name</label>
                            <input name="company_name" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" value="<?php echo $profile['company_name'] ?>">
                        </div>
                        <div class="form-group w-50">
                            <label class="control-label">Company Address</label>
                            <input name="company_address" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" value="<?php echo $profile['company_address'] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Phone Number</label>
                            <input name="company_phone" maxlength="200" type="tel" pattern="[0-9]+" required="required" class="form-control" placeholder="Enter Phone Number" value="<?php echo $profile['company_phone'] ?>">
                        </div>
                        <div class="form-group w-50">
                            <label class="control-label">Mobile Number</label>
                            <input name="company_mobile" maxlength="200" type="tel" pattern="[0-9]+" required="required" class="form-control" placeholder="Enter Mobile Number" value="<?php echo $profile['company_mobile'] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Established Since</label>
                            <input name="company_since" maxlength="200" type="date" required="required" class="form-control" value="<?php echo $profile['company_since'] ?>">
                        </div>
                        <div class="form-group w-50">
                            <label class="control-label">Company website</label>
                            <input name="company_website" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company website" value="<?php echo $profile['company_website'] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Company Capital</label>
                            <input name="company_capital" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Capital" value="<?php echo $profile['company_capital'] ?>">
                        </div>
                        <div class="form-group w-50">
                            <label class="control-label">Number of Employees</label>
                            <input name="company_employees_num" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Number of Employees" value="<?php echo $profile['company_emp_count'] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label class="control-label">Company Profile</label>
                        <textarea name="company_profile" class="form-control" name="company-profile" id="" rows="3"><?php echo $profile['company_profile'] ?></textarea>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Company logo</label>
                            <input name="company_logo" type="file" class="form-control-file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12 mt-5">
                    <h3> We are a company specialized in</h3>
                    <div class="form-group">
                        <select class="form-select my-3" name="category" id="category">
                            <option value="<?php echo $profile['company_category'] ?>"><?php echo $profile['company_category'] ?></option>
                            <option value="Real Estate Developer">Real Estate Developer</option>
                            <optgroup label="Design">
                                <option value="Architct">Architct</option>
                                <option value="Civil / Structural">Civil / Structural</option>
                                <option value="Mechnical">Mechnical</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Interior">Interior</option>
                            </optgroup>
                            <optgroup label="Contractor">
                                <option value="Earth works">Earth works</option>
                                <option value="Civil / Structural">Civil / Structural</option>
                                <option value="Mechnical">Mechnical</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Finishing">Finishing</option>
                            </optgroup>
                            <option value="Material Supplier">Material Supplier</option>
                            <option value="" class="editable">other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control editOption" style="display:none;" placeholder="please specify">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12 mt-5">
                    <h3> Employee Info </h3>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Employee Name</label>
                            <input name="emp_name" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Employee Name" value="<?php echo $profile['emp_name'] ?>">
                        </div>
                        <div class="form-group w-50">
                            <label class="control-label">Employee Title</label>
                            <input name="emp_title" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Employee Title" value="<?php echo $profile['emp_title'] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Email Address</label>
                            <input name="emp_email" type="email" required="required" class="form-control" placeholder="Enter Email Address" value="<?php echo $profile['emp_email'] ?>">
                        </div>
                        <div class="form-group w-50">
                            <label class="control-label">Mobile Number</label>
                            <input name="emp_mobile" maxlength="200" type="tel" pattern="[0-9]+" required="required" class="form-control" placeholder="Enter Mobile Number" value="<?php echo $profile['emp_mobile'] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group w-50">
                            <label class="control-label">Employee Since</label>
                            <input name="emp_since" maxlength="200" type="date" required="required" class="form-control" value="<?php echo $profile['emp_since'] ?>">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12 mt-5">
                    <h3> Login Info</h3>
                    <div class="form-group my-3">
                        <label class="control-label">Username</label>
                        <input name="username" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter username" value="<?php echo $profile['username'] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label class="control-label">password</label>
                        <input name="password" maxlength="200" type="password" required="required" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <input class="btn btn-success btn-lg pull-right text-white" name="submit" type="submit" value="Update">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php' ?>