<?php
$sql = $database->conn->query("SELECT * FROM patient_data");
?>

<style>
    input, textarea, select {
        border: 1px solid #AAB7B8 !important;
    }
    label span {
        color: red;
    }
    textarea {
    /* width: 300px !important; */
    height: 400px !important;
    }
</style>

<h2>Patients</h2>

<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><b>Patient List</b></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><b>Add new patient</b></a>
	</li>

</ul><!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="tabs-1" role="tabpanel">

    <div class="container mt-5">
        
    <table class="table" id="patient_table">
        <thead class="thead-light">
            <tr>
            <th scope="col">Fullname</th>
            <th scope="col">Contact #</th>
            <th scope="col">ID Number</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $sql->fetch_array()): ?>
            <tr>
            <td id="id_<?php echo $row['id']; ?>"><?php echo $row['name']." ".$row['lastname']; ?></td>
            <td><?php echo $row['contact_number']; ?></td>
            <td><?php echo $row['id_number']; ?></td>
            <td><?php echo $row['issue_status']; ?></td>
            <td>
                <button class="btn btn-sm btn-primary" onclick="patientDetails(<?php echo $row['id']; ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteRequest(<?php echo $row['id']; ?>, 'delete_patient')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>



    </div>
		
	</div>

    <!-- this is for add new patients tab -->
	<div class="tab-pane" id="tabs-2" role="tabpanel">
    <div class="container-fluid mt-5">

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
                <select class="form-control" id="gender">
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
                    <select class="form-control" id="issue_status">
                        <option value="minor">Minor</option>
                        <option value="major">Major</option>
                    </select>
                </div>

            </div>

            <div class="col col-md-4">
                    <div class="form-group">
                        <label for="medecine">Medecine Take</label>
                        <input type="text" id="medecine" class="form-control" >
                    </div>
            </div>

            <div class="col col-md-4">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" id="department" class="form-control" >
                    </div>
            </div>


        </div>

        <div class="row">

          <div class="col col-md-4">
                    <div class="form-group">
                        <label for="course">Course</label>
                        <input type="text" id="course" class="form-control" >
                    </div>
            </div>

            <div class="col col-md-8">
                <div class="form-group">
                    <label for="note">Notes</label>
                    <textarea class="form-control" id="notes" rows="4" style="height:100%;"></textarea>
                    <!-- <textarea class="form-control form-control-lg mb-3" rows="3" placeholder="Large textarea"></textarea> -->
                </div>
            </div>
        </div>

        </div>
        <div class="row text-right">
            <div class="col col-md-12">
                <button  class="btn btn-primary" id="savePatientsBtn" onclick="savePatients()" >Save</button>
            </div>
        </div>
	</div>

</div>



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
            <input type="hidden" id="student_id">
            <div class="container-fluid">

                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" id="ename" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="lastname">Lastname <span>*</span></label>
                            <input type="text" id="elastname"  class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="id_number">ID Number <span>*</span></label>
                            <input type="text" id="eid_number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="issue">Issue / Problem <span>*</span></label>
                            <input type="text" id="eissue" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="contact_number">Contact Number <span>*</span></label>
                            <input type="text" id="econtact_number" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="age">Age <span>*</span></label>
                            <input type="text" id="eage" class="form-control">
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender <span>*</span></label>
                        <select class="form-control" id="egender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="guardian">Guardian's Full Name <span>*</span></label>
                            <input type="text" id="eguardian" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                    <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="eaddress" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                                <label for="parent_conact">Parent's Contact Number</label>
                                <input type="text" id="eparent_contact" class="form-control">
                            </div>
                    </div>
                    <div class="col col-md-4">
                    <div class="form-group">
                            <label for="date_issue">Date</label>
                            <input type="date" id="edate_issue" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                    <div class="form-group">
                            <label for="time_issue">Time</label>
                            <input type="time" id="etime_issue" class="form-control">
                            <p id="timeDetails" style="font-weight: bolder;"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4">
 
                    <div class="form-group">
                        <label for="issue_status">Status <span>*</span></label>
                        <select class="form-control" id="eissue_status">
                            <option value="minor">Minor</option>
                            <option value="major">Major</option>
                        </select>
                    </div>
  
                    </div>

                    <div class="col col-md-4">
                    <div class="form-group">
                        <label for="medecine">Medecine Take</label>
                        <input type="text" id="emedecine" class="form-control" >
                    </div>
                    </div>

                    <div class="col col-md-4">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" id="edepartment" class="form-control" >
                            </div>
                    </div>
             
     
                </div>

                <div class="row">

                <div class="col col-md-4">
                        <div class="form-group">
                            <label for="course">Course</label>
                            <input type="text" id="ecourse" class="form-control" >
                        </div>
                </div>

                <div class="col col-md-8">
                    <div class="form-group">
                        <label for="note">Notes</label>
                        <textarea class="form-control" id="enotes" rows="4" style="height:100%;"></textarea>
                        <!-- <textarea class="form-control form-control-lg mb-3" rows="3" placeholder="Large textarea"></textarea> -->
                    </div>
                </div>
                </div>

            </div>
                <input type="hidden" id="patientID">

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button  class="btn btn-secondary" id="updatePatientsBtn" onclick="updatePatients()" >Update</button>
       
            <button type="button" class="btn btn-info" onclick="print_only()">Print</button>
            <button type="button" class="btn btn-info" onclick="print_all()">Print all data</button>
            </div>
            
        </div>
        </div>
    </div> 
    <!-- End modal -->












