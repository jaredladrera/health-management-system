<?php 

include "../connections/mysqlConnection.php";
$database = new Database;

if(isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if(empty($email)) {
        header("Location: ../index.php?error=Email is required");
        exit();
    } elseif(empty($password)) {
        header("Location: ../index.php?error=Password is required");
        exit();
    } else { 

        $query = "SELECT * FROM account_information WHERE email_address='$email' AND account_password='$password'";
        $res = $database->conn->query($query);


        if($res->num_rows === 1) {
            $row = $res->fetch_array();
            if($row['email_address'] === $email && $row['account_password'] === $password) {
                if($row['is_activate']) {
                    session_start();
                    
                    if($row['access'] === 'admin') { 
                        $_SESSION['email'] = $row['email_address'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['access'] = $row['access'];

                        header("Location: ../pages/admin/index.php");

                    } elseif($row['access'] === 'nurse') {
                        $_SESSION['email'] = $row['email_address'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['access'] = $row['access'];

                        header("Location: ../pages/nurse/index.php");
                    } else {
                        header("Location: ../index.php?error=The database connection is broken");
                        exit();
                    }

                } else {
                    header("Location: ../index.php?error=You're account is not already approve by the admin");
                    exit();
                }
            }
        
        } else {
            header("Location: ../index.php?error=Email or password not match!");
            exit();  
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}



?>