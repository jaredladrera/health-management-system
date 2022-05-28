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
        $sql2 = $database->conn->query("DELETE FROM vaccination_data where patient_id = '$id'");
 
        if($sql && $sql2) {
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

    if($key == 'revert_request'): 
        $id = $_POST['id'];

        $sql = $database->conn->query("UPDATE account_information SET is_activate = false WHERE id = '$id'");
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

    if($key == 'getMedicineDetails'): 
        $id = $_POST['id'];
        $sql = $database->conn->query("SELECT * FROM medicine_data WHERE id = '$id'");

        if($row = $sql->fetch_array()) {
            $data = array(
                'name' => $row['name'],
                'comment' => $row['comment'],
                'fields' => $row['fields'],
                'availability' => $row['availability'],
                'brand' => $row['brand']
            );

            exit(json_encode($data));
        } else {
            exit('This feature is not available')
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
               'department' => $row['department'],
               'course' => $row['course'],
               'vaccinated' => $row['vaccinated'],
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

    if($key === 'post_medicine'): 

        $message = 'Successfully inserted';
        $data = array(
            "name" => $_POST['name'],
            "brand" => $_POST['brand'],
            "comment" => $_POST['comment'],
            "availability" => $_POST['availability'],
            "fields" => $_POST['fields'],
        );

        $obj->insertAny('medicine_data', $data, $message);
    endif;

    if($key == 'delete_medicine'): 
        $id = $_POST['id'];

        $sql = $database->conn->query("DELETE FROM medicine_data where id = '$id'");
 
        if($sql) {
            exit("Deleted Successfully");
        } else {
            exit($sql);
        }
    endif;

    if($key == 'save_patient'): 

        $message = "New patient save";

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
            "date_issue" => $_POST['date_issue'],
            "time_issue" => $_POST['time_issue'],
            "note" => $_POST['note'],
            "medicine_take" => $_POST['medecine'],
            "department" => $_POST['department'],
            "course" => $_POST['course'],
            "vaccinated" => false,
        );
        $obj->insertAny('patient_data', $data, $message);

    
    endif;

    // if($key == 'graph_for_monthly_patient'): 
    //      $data = array();   

    //     $sql = $database->conn->query("select date_format(date_issue,'%M') AS month,COUNT(*) AS total
    //     from patient_data
    //     group by year(date_issue),month(date_issue)
    //     order by year(date_issue),month(date_issue)");

    //     while($row = $sql->fetch_array()) {
    //         $data[] = $row;
    //     }
    //     $j = count($data);
    //     for($i = 0; $i < $j; $i++) {
    //         $data2 = array(
    //             $data[$i]['month'] => $data[$i]['total'], 
    //         );
    //     }
    
    //     exit(json_encode($data2));
    // endif;

endif;

if(isset($_GET['get_key'])): 

$get_key = $_GET['get_key'];

    if($get_key == 'vaccine_information'): 
        $message = 'Save Successfully!';
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        $query = 'SELECT * FROM vacination_data WHERE patient_id = '.$id.'';
        $sql = $database->conn->query($query);
 
        $data = array(
            'first_dose_date' => $_GET['first_dose'],
            'second_dose_date' => $_GET['second_dose'],
            'vaccination_area' => $_GET['area'],
            'vaccination_card_number' => $_GET['card_number'],
            'brand_vaccine' => $_GET['vaccine_brand'],
            'patient_id' => $id,
        );

        // print_r($data);
        $updateVaccineStatus = "UPDATE patient_data SET vaccinated = true WHERE id = $id";
        if($sql->num_rows > 0) {
            if ($obj->updateAnyBool('vacination_data', $data, 'patient_id', $id)) {
                if(isset($_FILES["file_add"]["name"]) || isset($_FILES["file_add"]["name"]) != ""){

                    $test=explode(".", $_FILES["file_add"]["name"]);
                    $extension = end($test);
                    $image = $id.'_'.$image_name.'.'.$extension;
                    $location = '../images/vaccination_photos/'.$image;
                    move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
            
                    $query = "UPDATE vacination_data SET vaccination_card_photo='$image' WHERE patient_id='$id'";
                    
                    if($database->conn->query($query)){
                        if($database->conn->query($updateVaccineStatus)) {
                            exit('Updated');
                        }
                    } else {
                        exit($sql['brand_vaccine']);
                    }
                } else {
                    if($database->conn->query($updateVaccineStatus)) {
                        exit('Updated');
                    }
                }
            }
        } else {
            if ($obj->insertAnyBool('vacination_data', $data)) {
                if($_FILES["file_add"]["name"] != ""){
                    $test=explode(".", $_FILES["file_add"]["name"]);
                    $extension = end($test);
                    $image = $id.'_'.$image_name.'.'.$extension;
                    $location = '../images/vaccination_photos/'.$image;
                    move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
            
                    $query = "UPDATE vacination_data SET vaccination_card_photo='$image' WHERE patient_id='$id'";
            
                    if($database->conn->query($query) && $database->conn->query($updateVaccineStatus)){
                        exit('Updated');
                    } else {
                        exit('Not Updated');
                    }
                }
            }
        }


    
    endif;

endif;

?>