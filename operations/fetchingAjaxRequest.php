<?php 

include 'globalFunction.php';
include './../connections/mysqlConnection.php';

$obj = new DataOperation;
$database = new Database;

if(isset($_POST['key'])) : 
    $key = $_POST['key'];

    if($key == 'registerUser') :
        $message = "You are now register! Please wait to confirm your account by the admin. Thank you!";

        $data = array(
            "name" => $_POST['fname'],
            "lastname" => $_POST['lname'],
            "middlename" => $_POST['middle'],
			"email_address" => $_POST['email'],
			"id_number" => $_POST['id_number'],
			"contact_number" => $_POST['phone'],
            "address" => $_POST['address'],
			"birthday" => $_POST['birthday'],
			"gender" => $_POST['gender'],
			"account_password" => $_POST['pass'],
			"access" => $_POST['account_access'],
			"is_activate" => false
        );

       $obj->insertAny('account_information', $data, $message);

    endif;

    if($key == 'delete_request'): 
        $id = $_POST['id'];

        $sql = $database->conn->query("DELETE FROM account_information where id = '$id'");
 
        if($sql) {
            exit("Deleted Successfully");
        } else {
            exit($sql);
        }
    endif;

    if($key == 'delete_patient'): 
        $id = $_POST['id'];

        $sql = $database->conn->query("DELETE FROM patient_data where id = '$id'");
 
        if($sql) {
            exit("Deleted Successfully");
        } else {
            exit($sql);
        }
    endif;

    if($key == 'approve_request'): 
        $id = $_POST['id'];

        $sql = $database->conn->query("UPDATE account_information SET is_activate = true WHERE id = '$id'");
        if($sql) {
            exit("Update Successfully");
        } else {
            exit($sql);
        }

    endif;

    if($key == 'get_reqest_details'): 
        $id = $_POST['id'];
        $sql = $database->conn->query("SELECT * FROM account_information WHERE id = '$id'");

        if($row = $sql->fetch_array()) {

            $data = array(
                'name' => $row['name'],
                'lastname' => $row['lastname'],
                'middlename' => $row['middlename'],
                'email_address' => $row['email_address'],
                'birthday' => $row['birthday'],
                'access' => $row['access'],
                'id_number' => $row['id_number'],
                'contact_number' => $row['contact_number'],
                'address' => $row['address'],
                'gender' => $row['gender'],
                'id' => $id
            );

            // exit("SELECT * FROM account_information WHERE id = '$id'");
            exit(json_encode($data));
        } else {
            exit('message Not working queries');
        }

        
    endif;

    if($key == 'update_my_account') : 
        $id = $_POST['id'];
        $message = "Your account is updated successfully!";

        $data = array(
            "name" => $_POST['name'],
            "lastname" => $_POST['lastname'],
            "middlename" => $_POST['middlename'],
			"email_address" => $_POST['email'],
			"id_number" => $_POST['id_number'],
			"contact_number" => $_POST['contact_number'],
            "address" => $_POST['address'],
			"birthday" => $_POST['birthday'],
			"gender" => $_POST['gender'],
			"account_password" => $_POST['password'],
        );

        $obj->updateAny('account_information', $data, $id);
    
    endif;

    if($key == 'getUpdatingData') :
        $id = $_POST['id'];

        $sql = $database->conn->query("SELECT * FROM patient_data WHERE id = '$id'");
       if($row = $sql->fetch_array()) {

           $data = array(
               'name' => $row['name'],
               'lastname' => $row['lastname'],
               'id_number' => $row['id_number'],
               'issue' => $row['issue'],
               'contact_number' => $row['contact_number'],
               'address' => $row['address'],
               'gender' => $row['gender'],
               'note' => $row['note'],
               'age' => $row['age'],
               'guardian' => $row['guardian'],
               'parent_contact' => $row['parent_contact'],
               'issue_status' => $row['issue_status'],
               'date_issue' => $row['date_issue'],
               'time_issue' => $row['time_issue'],
               'medicine' => $row['medicine_take'],
               'id' => $id
           );
    
          exit(json_encode($data));
       } else {
           exit('Queries not executed properly');
       }

    endif;

    if($key == 'updatePatient') : 
        $id = $_POST['id'];

        $data = array(
            "name" => $_POST['name'],
            "address" => $_POST['address'],
			"contact_number" => $_POST['contact_number'],
			"gender" => $_POST['gender'],
			"id_number" => $_POST['id_number'],
			"issue" => $_POST['issue'],
			"lastname" => $_POST['lastname'],
			"age" => $_POST['age'],
			"parent_contact" => $_POST['parent_contact'],
            "guardian" => $_POST['guardian'],
            "issue_status" => $_POST['issue_status'],
            "note" => $_POST['note'],
            "date_issue" => $_POST['date_issue'],
            "time_issue" => $_POST['time_issue'],
            "medicine_take" => $_POST['medicine_take']
        );
        $obj->updateAny('patient_data', $data, $id);
        exit('Updated Successfully');

    endif;

endif;

?>