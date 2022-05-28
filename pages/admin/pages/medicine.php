<?php
    $sql = $database->conn->query("SELECT * FROM medicine_data");
?>

<div class="container">

    <ul id="tabs" class="nav nav-tabs">
                <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-uppercase active">Medicine list</a></li>
                <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link small text-uppercase">Add medicine</a></li>
    </ul>

    <br>
    <div id="tabsContent" class="tab-content">
        <div id="home1" class="tab-pane fade active show">
            
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Fields</th>
                <th scope="col">availability</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $sql->fetch_array()): ?>
                    <tr>
                        <th><?php echo $row['name']; ?></th>
                        <td><?php echo $row['brand']; ?></td>
                        <td><?php echo $row['fields']; ?></td>
                        <td class="<?php echo $row['availability'] ? 'text-primary' : 'text-danger'; ?>"><?php echo $row['availability'] ? 'Available' : 'Out of stocks'; ?></td>
                        <td>
                        <button class="btn btn-primary" onclick="medicineDetails(<?php echo $row['id']; ?>)"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
        <button class="btn btn-danger" onclick="deleteRequest(<?php echo $row['id']; ?>, 'delete_medicine')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


        <!-- End of medicine list -->
        </div>
        <div id="profile1" class="tab-pane fade">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" class="form-control border border-secondary">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" id="brand" class="form-control border border-secondary">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="medicine_field">Medicine field</label>
                    <select class="form-control border border-secondary" id="medicine_field" >
                        <option value="antibiotics">Antibiotics</option>
                        <option value="vitamins">Vitamins</option>
                        <option value="antihypertensive">Antihypertensive</option>
                        <option value="antiacid">Antiacid</option>
                        <option value="antihistamine">Antihistamine</option>
                        <option value="pain_reliever">Pain reliever</option>
                        <option value="anticoagulants">Anticoagulants</option>
                        <option value="antilipidemics">Antilipidemics</option>
                        <option value="local_anesthesia">Local Anesthesia</option>
                        <option value="bronchodilators">Bronchodilators</option>
                        <option value="diuretics">Diuretics</option>
                        <option value="antispasmodic">Antispasmodic</option>
                        <option value="analgesic">Analgesic</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="medicine_field">Availability</label>
                    <select class="form-control border border-secondary" id="availability" >
                        <option value="1">Available</option>
                        <option value="0">Out of stock</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="comment">Comment(optional)</label>
                    <textarea name="comment" id="comment" class="form-control border border-secondary" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" onclick="postMedicine()">Save</button>
            </div>
        </div>



        <!-- end of insert medicine -->
        </div>
    </div>


</div>

   <!-- The Modal -->
   <div class="modal fade" id="modalMedicine">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="modalTitle"></h4><br>
            
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <div class="vaccination_status"></div>
            <div class="container-fluid">

            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" class="form-control border border-secondary">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" id="brand" class="form-control border border-secondary">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="medicine_field">Medicine field</label>
                    <select class="form-control border border-secondary" id="medicine_field" >
                        <option value="antibiotics">Antibiotics</option>
                        <option value="vitamins">Vitamins</option>
                        <option value="antihypertensive">Antihypertensive</option>
                        <option value="antiacid">Antiacid</option>
                        <option value="antihistamine">Antihistamine</option>
                        <option value="pain_reliever">Pain reliever</option>
                        <option value="anticoagulants">Anticoagulants</option>
                        <option value="antilipidemics">Antilipidemics</option>
                        <option value="local_anesthesia">Local Anesthesia</option>
                        <option value="bronchodilators">Bronchodilators</option>
                        <option value="diuretics">Diuretics</option>
                        <option value="antispasmodic">Antispasmodic</option>
                        <option value="analgesic">Analgesic</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="medicine_field">Availability</label>
                    <select class="form-control border border-secondary" id="availability" >
                        <option value="1">Available</option>
                        <option value="0">Out of stock</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="comment">Comment(optional)</label>
                    <textarea name="comment" id="comment" class="form-control border border-secondary" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>

             
                <input type="hidden" id="medicineID">

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <!-- <button class="btn btn-primary" onclick="vaccinationInformation()">Vaccination Details</button> -->
            <!-- <button  class="btn btn-secondary" id="savePatientsBtn" onclick="savePatients()" >Save</button> -->
            <button  class="btn btn-secondary" id="updatePatientsBtn" onclick="updateMedicine()" >Update</button>
       
            </div>
            
        </div>
        </div>
    </div> 