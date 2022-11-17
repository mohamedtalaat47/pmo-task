<?php

include_once('includes/user.php');

$auth = new user();

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
    // $company_logo = $_POST['company_logo'];
    $emp_name = $_POST['emp_name'];
    $emp_title = $_POST['emp_title'];
    $emp_email = $_POST['emp_email'];
    $emp_mobile = $_POST['emp_mobile'];
    $emp_since = $_POST['emp_since'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];


    // var_dump($_POST['company_logo']);

    if ($password == $re_password) {

        if (!empty($_FILES['company_logo'])) {
            $company_logo = date('Y-m-d-h-s') . $_FILES['company_logo']['name'];
            $company_logo_tmp = $_FILES['company_logo']['tmp_name'];
            move_uploaded_file($company_logo_tmp, "uploads/logos/$company_logo");
        } else{
            $company_logo = null;
        }

        if (
            preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $emp_email) && !empty($category) && !empty($company_name) && !empty($company_address)
            && !empty($company_phone) && !empty($company_mobile) && !empty($company_since) && !empty($company_website) && !empty($company_capital) && !empty($company_employees_num)
            && !empty($emp_name) && !empty($emp_title) && !empty($emp_email) && !empty($emp_mobile) && !empty($emp_since) && !empty($username) && !empty($password)
        ) {


            $email = $auth->isUserExist($emp_email);
            if (!$email) {
                $register = $auth->UserRegister(
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
                if ($register) {
                    echo "<script>alert('Registration done Successfully')</script>";
                    header('Location:login.php');
                } else {
                    echo "<script>alert('Registration failed, please fill all fields and try again')</script>";
                }
            } else {
                echo "<script>alert('Email Already Exist')</script>";
            }
        } else {
            echo "<script>alert('Password doesn't match')</script>";
        }
    }
}
?>

<?php include 'includes/header.php' ?>

<div class="login-hero">
    <h1 class="text-white">Signup</h1>
</div>
<div class="container" id="signup">
    <div class="col-sm-12 col-md-8 m-auto border p-5 rounded shadow" style="margin: 80px auto !important;">

        <div class="stepwizard col-md-offset-3 m-auto">
            <div class="stepwizard-row setup-panel ">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Category</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Company Info</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Employee Info</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>Login Info</p>
                </div>
            </div>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row setup-content" id="step-1">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12 mt-5">
                        <h3> We are a company specialized in</h3>
                        <div class="form-group">
                            <select class="form-select my-3" name="category" id="category">
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
                        <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12 mt-5">
                        <h3> Company Info</h3>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Company Name</label>
                                <input name="company_name" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name">
                            </div>
                            <div class="form-group w-50">
                                <label class="control-label">Company Address</label>
                                <input name="company_address" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Phone Number</label>
                                <input name="company_phone" maxlength="200" type="tel" pattern="[0-9]+" required="required" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group w-50">
                                <label class="control-label">Mobile Number</label>
                                <input name="company_mobile" maxlength="200" type="tel" pattern="[0-9]+" required="required" class="form-control" placeholder="Enter Mobile Number">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Established Since</label>
                                <input name="company_since" maxlength="200" type="date" required="required" class="form-control">
                            </div>
                            <div class="form-group w-50">
                                <label class="control-label">Company website</label>
                                <input name="company_website" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company website">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Company Capital</label>
                                <input name="company_capital" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Capital">
                            </div>
                            <div class="form-group w-50">
                                <label class="control-label">Number of Employees</label>
                                <input name="company_employees_num" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Number of Employees">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="control-label">Company Profile</label>
                            <textarea name="company_profile" class="form-control" name="company-profile" id="" rows="3"></textarea>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Company logo</label>
                                <input name="company_logo" type="file" class="form-control-file">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn btn-primary prevBtn btn-lg pull-left mt-3" type="button">Previous</button>
                            <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12 mt-5">
                        <h3> Employee Info </h3>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Employee Name</label>
                                <input name="emp_name" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Employee Name">
                            </div>
                            <div class="form-group w-50">
                                <label class="control-label">Employee Title</label>
                                <input name="emp_title" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Employee Title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Email Address</label>
                                <input name="emp_email" type="email" required="required" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group w-50">
                                <label class="control-label">Mobile Number</label>
                                <input name="emp_mobile" maxlength="200" type="tel" pattern="[0-9]+" required="required" class="form-control" placeholder="Enter Mobile Number">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group w-50">
                                <label class="control-label">Employee Since</label>
                                <input name="emp_since" maxlength="200" type="date" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn btn-primary prevBtn btn-lg pull-left mt-3" type="button">Previous</button>
                            <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-4">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12 mt-5">
                        <h3> Login Info</h3>
                        <div class="form-group my-3">
                            <label class="control-label">Username</label>
                            <input name="username" maxlength="200" type="text" required="required" class="form-control" placeholder="Enter username">
                        </div>
                        <div class="form-group my-3">
                            <label class="control-label">password</label>
                            <input name="password" maxlength="200" type="password" required="required" class="form-control" placeholder="Enter password">
                        </div>
                        <div class="form-group my-3">
                            <label class="control-label">confirm password</label>
                            <input name="re_password" maxlength="200" type="password" required="required" class="form-control" placeholder="retype same password">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                            <input class="btn btn-success btn-lg pull-right text-white" name="submit" type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php' ?>