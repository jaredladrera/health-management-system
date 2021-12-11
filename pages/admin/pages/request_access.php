<?php 
    $sql = $database->conn->query("SELECT * FROM account_information WHERE is_activate=false");
?>
<style>
  input {
    border: 1px solid black!important;
    pointer-events: none;
  }
</style>


    <h2>Request Accounts</h2>

    <table class="table requestTable" style="margin-top: 3rem;">
  <thead class="thead-light">
    <tr>
      <th scope="col">Fullname</th>
      <th scope="col">Email</th>
      <th scope="col">Contact number</th>
      <th scope="col">Request access</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
      <?php while($row = $sql->fetch_array()):?>
        <tr>

          <td id="id_<?php echo $row['id']; ?>"><?php echo $row['name']." ".$row['lastname']; ?></td>
          <td><?php echo $row['email_address']; ?></td>
          <td><?php echo $row['contact_number']; ?></td>
          <td><?php echo $row['access']; ?></td>
          <td>
              <button class="btn btn-success" onclick="approveRequest(<?php echo $row['id']; ?>)"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
              <button class="btn btn-info" onclick="requestDetails(<?php echo $row['id']; ?>)"><i class="fa fa-info" aria-hidden="true"></i></button>
          <!-- <button type="button" class="btn btn-info" onclick="modalOpenForAccountUpdate(<?php echo $row['id']; ?>)">
            Change Status
          </button> -->
            <button class="btn btn-danger" onclick="deleteRequest(<?php echo $row['id']; ?>, 'delete_request')"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </td>

        </tr>
      <?php endwhile; ?>

     
    
  </tbody>
</table>


   <!-- The Modal -->
   <div class="modal fade" id="requestModal">
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
                            <label for="middlename">Middlename</label>
                            <input type="text" id="middlename" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="contact">Contact number <span>*</span></label>
                            <input type="text" id="contact" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="gender">Gender<span>*</span></label>
                            <input type="text" id="gender" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                                <label for="birthday">Birthday<span>*</span></label>
                                <input type="text" id="birthday" class="form-control">
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col col-md-4">

                    <div class="form-group">
                        <label for="access">Request Access</label>
                        <input type="text" class="form-control" id="access" >
                    </div>
      
                    </div>

                    <div class="col col-md-8">
                    <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col col-md-4">                            
                    <label for="id_number">ID Number</label>
                    <input type="text" id="id_number" class="form-control"></div>
                <div class="col col-md-4"></div>
                <div class="col col-md-4"></div>

                </div>
            </div>
                <input type="hidden" id="request_id">

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
    </div> 
    <!-- End modal -->