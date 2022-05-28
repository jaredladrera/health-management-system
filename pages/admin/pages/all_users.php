<?php 
    $sql = $database->conn->query("SELECT * FROM account_information WHERE is_activate=true");
?>

<h2>All Users</h2>
<div class="container">
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
                <button class="btn btn-success" onclick="revertUser(<?php echo $row['id']; ?>)"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
                <a href="index.php?page=user_details&id=<?php echo $row['id']; ?>" class="btn btn-info" ><i class="fa fa-info" aria-hidden="true"></i></a>
            <!-- <button type="button" class="btn btn-info" onclick="modalOpenForAccountUpdate(<?php echo $row['id']; ?>)">
              Change Status
            </button> -->
              <button class="btn btn-danger" onclick="deleteRequest(<?php echo $row['id']; ?>, 'delete_request')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </td>
  
          </tr>
        <?php endwhile; ?>
  
       
      
    </tbody>
  </table>
</div>






