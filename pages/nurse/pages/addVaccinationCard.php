<?php 
if(isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];

    $getPatientInformation = $database->conn->query("SELECT * FROM patient_data WHERE id = ".$patientId."");
    $row = $getPatientInformation->fetch_array();

    $getVaccineData = $database->conn->query("SELECT * FROM vacination_data WHERE patient_id = ".$patientId."");
    $vacData = $getVaccineData->fetch_array();

} else {
    header('Location: ndex.php?page=patients');
}

?>
<h2>Vaccination information Form</h2>
<div class="container">
    <div class="row">
        <p><span class="font-weight-bold">Name : </span> <?php echo $row['name'].' '.$row['lastname']; ?>   </p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="card_numbae">Card Number</label>
                <input type="text" class="form-control" id="card_number" value="<?php echo isset($vacData['vaccination_card_number']) ? $vacData['vaccination_card_number'] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="card_numbae">Vaccination Area</label>
                <input type="text" class="form-control" id="vaccination_area" value="<?php echo isset($vacData['vaccination_area']) ? $vacData['vaccination_area'] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="vaccine_brand">Vaccine brand</label>
                <input type="text" class="form-control" id="vaccine_brand" value="<?php echo isset($vacData['brand_vaccine']) ? $vacData['brand_vaccine'] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="first_dose">First Dose</label>
                <input type="date" class="form-control" id="first_dose" value="<?php echo isset($vacData['first_dose_date']) ? $vacData['first_dose_date'] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="second_dose">Second Dose</label>
                <input type="date" class="form-control" id="second_dose" value="<?php echo isset($vacData['second_dose_date']) ? $vacData['second_dose_date'] : ""; ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
            <img src="<?php echo isset($vacData['vaccination_card_photo']) ? "./../../images/vaccination_photos/".$vacData['vaccination_card_photo'] : "./../../images/upload_icon.png"; ?>" alt="upload image" srcset="" class="mb-3" id="image_add"  style="width: 300px!important">
            <input type="file"  name="file_add" id="file_add">
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button class="btn btn-primary form-control text-white" onclick="addVaccineInformation(<?php echo $patientId; ?>)">Save</button>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end container -->
</div>

