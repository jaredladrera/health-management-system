<?php
$sql = $database->conn->query("SELECT * FROM patient_data");
?>

<style>
    input {
        border: 1px solid #CACFD2!important;
    }
</style>


<h2>Patient list</h2>


<table class="table" id="patientTable" style="margin-top: 4rem;">
  <thead class="thead-light">
    <tr>
      <th scope="col">Fullname</th>
      <th scope="col">Contact #</th>
      <th scope="col">ID Number</th>
      <th scope="col">Issue</th>
      <th scope="col">Status</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = $sql->fetch_array()): ?>
      <tr>
      <td id="id_<?php echo $row['id']; ?>"><?php echo $row['name']." ".$row['lastname']; ?></td>
      <td><?php echo $row['contact_number']; ?></td>
      <td><?php echo $row['id_number']; ?></td>
      <td><?php echo $row['issue']; ?></td>
      <td><?php echo $row['issue_status'] == 'major' ? '<span class="badge badge-danger">'.$row['issue_status'].'</span>': '<span class="badge badge-primary">'.$row['issue_status'].'</span>'; ?></td>
      <td>


        <button class="btn btn-primary" onclick="patientDetails(<?php echo $row['id']; ?>)"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
        <button class="btn btn-danger" onclick="deleteRequest(<?php echo $row['id']; ?>, 'delete_patient')"><i class="fa fa-trash" aria-hidden="true"></i></button>
 
      </td>
      </tr>
    <?php endwhile; ?>

    
  </tbody>
</table>


   <!-- The Modal -->
   <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="modalTitle"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">

            <div class="container-fluid">

                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="lastname">Lastname <span>*</span></label>
                            <input type="text" id="lastname"  class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="id_number">ID Number <span>*</span></label>
                            <input type="text" id="id_number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="issue">Issue / Problem <span>*</span></label>
                            <input type="text" id="issue" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="contact_number">Contact Number <span>*</span></label>
                            <input type="text" id="contact_number" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="age">Age <span>*</span></label>
                            <input type="text" id="age" class="form-control">
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender <span>*</span></label>
                        <select class="form-control" id="gender" style=" border: 1px solid #CACFD2!important;">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="guardian">Guardian's Full Name <span>*</span></label>
                            <input type="text" id="guardian" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                    <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                                <label for="parent_conact">Parent's Contact Number</label>
                                <input type="text" id="parent_contact" class="form-control">
                            </div>
                    </div>
                    <div class="col col-md-4">
                    <div class="form-group">
                            <label for="date_issue">Date</label>
                            <input type="date" id="date_issue" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                    <div class="form-group">
                            <label for="time_issue">Time</label>
                            <input type="time" id="time_issue" class="form-control">
                            <p id="timeDetails" style="font-weight: bolder;"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4">
 
                    <div class="form-group">
                        <label for="issue_status">Status <span>*</span></label>
                        <select class="form-control" id="issue_status" style="border: 1px solid #CACFD2!important;"> 
                            <option value="minor">Minor</option>
                            <option value="major">Major</option>
                        </select>
                    </div>


                    <div class="form-group">
                            <label for="medecine">Medecine Take</label>
                            <input type="text" id="medecine" class="form-control" >
                    </div>
  
                    </div>
                    <div class="col col-md-8">
                    <div class="form-group">
                        <label for="note">Notes</label>
                        <textarea class="form-control" id="notes" rows="3" style=" border: 1px solid #CACFD2!important;"></textarea>
                    </div>
                    </div>
     
                </div>

            </div>
                <input type="hidden" id="patientID">

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button  class="btn btn-secondary" id="savePatientsBtn" onclick="savePatients()" >Save</button>
            <button  class="btn btn-secondary" id="updatePatientsBtn" onclick="updatePatients()" >Update</button>
       
            </div>
            
        </div>
        </div>
    </div> 
    <!-- End modal -->