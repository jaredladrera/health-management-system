<?php 
$myId = $_SESSION['id'];
$query = 'SELECT * FROM account_information WHERE id = '.$myId.'';
$stmt = $database->conn->query($query);

$row = $stmt->fetch_array();
$count = $stmt->num_rows;


?>

<div class="jumbotron">

 <div class="row">
     <div class="col col-md-4">
        <div class="form-group">
    
        <label for="name">Your Name:</label>

        <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
     </div>

     <div class="col col-md-4">
        <div class="form-group">
    
        <label for="lastname">Your Lastname:</label>

        <input type="text" class="form-control" id="lastname" value="<?php echo $row['lastname']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
     </div>

     <div class="col col-md-4">
        <div class="form-group">
    
        <label for="middlename">Your Middlename:</label>

        <input type="text" class="form-control" id="middlename" value="<?php echo $row['middlename']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
     </div>
 </div>

<div class="row">
    <div class="col col-md-4">
        <div class="form-group">
    
        <label for="email">Email address</label>

        <input type="text" class="form-control" id="email" value="<?php echo $row['email_address']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>

    </div>
    <div class="col col-md-4">
    <div class="form-group">
        
        <label for="id_number">ID Number</label>

        <input type="text" class="form-control" id="id_number" value="<?php echo $row['id_number']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>

    </div>
    <div class="col col-md-4">
        <div class="form-group">
        
        <label for="contact_number">Contact Number</label>

        <input type="text" class="form-control" id="contact_number" value="<?php echo $row['contact_number']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-4">
        <div class="form-group">
        
        <label for="address">Home address</label>

        <input type="text" class="form-control" id="address" value="<?php echo $row['address']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
    </div>

    <div class="col col-md-4">
        <div class="form-group">
        
        <label for="birthday">Birthday</label>

        <input type="date" class="form-control" id="birthday" value="<?php echo $row['birthday']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
    </div>
    <div class="col col-md-4">
        <div class="form-group">
        
        <label for="gender">Gender</label>

        <select class="form-control" id="gender"  value="<?php echo $row['gender']; ?>">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
        </select>

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-4">
        <div class="form-group">
        
        <label for="password">Password</label>

        <input type="text" class="form-control" id="password" value="<?php echo $row['account_password']; ?>" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
    </div>

    <div class="col col-md-4">
        <div class="form-group">
        
        <label for="re_pass">Re-enter Password</label>

        <input type="text" class="form-control" id="re_pass" aria-describedby="nameHelp" >

        <small id="nameHelp" class="form-text text-muted"></small>

        </div>
    </div>
    <div class="col col-md-4"></div>
</div>
    
  <button onclick="updateAccount(<?php echo $row['id']; ?>)" class="btn btn-success mt-4">Save Update</button>
 

 
</div>