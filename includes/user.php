<?php
include_once('db.php');
class user extends dbconnect
{

    public function __construct()
    {
        parent::__construct();
    }

    public function UserRegister(
        $username,
        $password,
        $emp_name,
        $emp_title,
        $emp_email,
        $emp_mobile,
        $emp_since,
        $company_category,
        $company_name,
        $company_address,
        $company_phone,
        $company_mobile,
        $company_since,
        $company_website,
        $company_capital,
        $company_emp_count,
        $company_profile,
        $company_logo
    ) {
        $password = md5($password);
        $qr = "INSERT INTO users(username, password, emp_name, emp_title, emp_email, emp_mobile, emp_since, company_category, company_name, company_address, company_phone, company_mobile, company_since, company_website, company_capital, company_emp_count, company_profile, company_logo)";
        $qr .= "values('" . $username . "','" . $password . "','" . $emp_name . "','" . $emp_title . "','" . $emp_email . "','" . $emp_mobile . "','" . $emp_since . "','" . $company_category . "','" . $company_name . "','" . $company_address . "','" . $company_phone . "','" . $company_mobile . "','" . $company_since . "','" . $company_website . "','" . $company_capital . "','" . $company_emp_count . "','" . $company_profile . "','" . $company_logo . "')";
        $result = $this->connection->query($qr);
        // if (!$result) {
        //     echo "Error description: " . mysqli_error($this->connection);
        // }
        return $result;
    }




    public function Login($username, $password)
    {
        $qr = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . md5($password) . "'";
        $result = $this->connection->query($qr);
        if (!$result) {
            echo "Error description: " . mysqli_error($this->connection);
        }
        $no_rows = mysqli_num_rows($result);


        if ($no_rows == 1) {
            session_start();
            $user = mysqli_fetch_array($result);

            $_SESSION['login'] = true;
            $_SESSION['userid'] = $user['id'];
            $_SESSION['name'] = $user['emp_name'];
            $_SESSION['email'] = $user['emp_email'];
            return TRUE;
        } else {
            return FALSE;
        }
    }




    public function isUserExist($username)
    {
        $qr = "SELECT * FROM users WHERE username = '" . $username . "'";
        $result = $this->connection->query($qr);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function logOut()
    {
        unset($_SESSION['login']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['userid']);
    }

    public function getUser()
    {
        $id = (int)$_SESSION['userid'];
        $qr = "SELECT * FROM users WHERE id = '" . $id . "'";
        $result = $this->connection->query($qr);
        $user = mysqli_fetch_array($result);
        return $user;
    }

    public function UserUpdate(
        $username,
        $password,
        $emp_name,
        $emp_title,
        $emp_email,
        $emp_mobile,
        $emp_since,
        $company_category,
        $company_name,
        $company_address,
        $company_phone,
        $company_mobile,
        $company_since,
        $company_website,
        $company_capital,
        $company_emp_count,
        $company_profile,
        $company_logo
    ) {
        // , company_logo='$company_logo'
        if (!empty($company_logo)) {
            $id = $_SESSION['userid'];
            $password = md5($password);
            $qr = "UPDATE users SET company_logo='$company_logo' WHERE id=$id";
            $result = $this->connection->query($qr);
        }
        $id = $_SESSION['userid'];
        $password = md5($password);
        $qr = "UPDATE users SET username='$username', password='$password', emp_name='$emp_name', emp_title='$emp_title', emp_email='$emp_email', emp_mobile='$emp_mobile', emp_since='$emp_since', company_category='$company_category', company_name='$company_name', company_address='$company_address', company_phone='$company_phone', company_mobile='$company_mobile', company_since='$company_since', company_website='$company_website', company_capital='$company_capital', company_emp_count=$company_emp_count, company_profile='$company_profile' WHERE id=$id";
        $result = $this->connection->query($qr);
        // if (!$result) {
        //     echo "Error description: " . mysqli_error($this->connection);
        // }
        return $result;
    }
}
