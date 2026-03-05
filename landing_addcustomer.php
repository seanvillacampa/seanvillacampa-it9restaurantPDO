<?php



require 'insertnewcustomer.php';

require 'update.php';

require 'delete.php';

require 'select.php';

?>


<?php

// CHECK IF EDIT MODE

$editUser = null;

if (isset($_GET['edit'])) {

  $customer_id = $_GET['edit'];
  $stmt = $pdo->prepare("SELECT * FROM customers WHERE customer_id = ?");
  $stmt->execute([$customer_id]);
  $editUser = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


    <div class="container-xl mb-5 mt-5" >
    <div class="container">

<div class="mb-2">
<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="landing_orders.php">Add Orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="landing_addcustomer.php">Add Customer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="landing_menuitems.php">Add Menu Item</a>
  </li>

</ul>
</div>

<div class="card text-white border-dark mb-3">
  <div class="card-header" id="head">
    <h3  class="text-center">Customer Section</h3>
  </div>
  <div id="cardbody" class="card-body">
    
  
   
    <div class="row">
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card border-dark mb-3">
      <div id="cardinput" class="card-body">

      

      <form id="formid" method="POST" class="row g-3">
<h3 class="text-center"><?= $editUser ? 'Update Customer' : 'Add Customer' ?></h3>
  

  <?php if (!empty($editUser)): ?>

    <input type="hidden" name="customer_id" value="<?= $editUser['customer_id'] ?>">

  <?php endif; ?>


<div class="col-12">
    <label for="inputAddress" class="form-label">First Name</label>
    <input type="text" name="first_name" value="<?= !empty($editUser) ? $editUser['first_name'] : '' ?>" required class="form-control" placeholder="Enter  first name">
  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Last Name</label>
    <input type="text" name="last_name" value="<?= !empty($editUser)
     ? $editUser['last_name'] : '' ?>" required class="form-control" placeholder="Enter last name">
  </div>

    <div class="col-12">
    <label for="inputAddress" class="form-label">Phone Number</label>
    <input type="text" name="phone_number" value="<?= !empty($editUser)
     ? $editUser['phone_number'] : '' ?>" required class="form-control" placeholder="Enter phone number">
  </div>


  <!-- Submit buttons -->

  <?php if (!empty($editUser)): ?>

    <button type="submit" class="btn btn-success" name="update_customer">Update</button>

    <a class="btn btn-danger" href="landing_addcustomer.php">Cancel</a>

  <?php else: ?>

    <button type="submit" class="btn btn-success" name="add_customer">Add</button>

  <?php endif; ?>

</form>


      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="card border-info mb-3">
      <div id="cardtable" class="card-body">
        
        
<div id="tablediv">

<h3 id="usertablelabel" class="text-center mb-4">Customer Table</h3>

<table  class="table table-warning table-striped table-hover">


  <tr>


 

    <th>First Name</th>
    <th>Last Name</th>

    <th>Phone Number</th>

    <th>Action</th>

  </tr>



  <?php foreach ($customers as $customers): ?>

  <tr>

    <td><?= $customers['first_name'] ?></td>

    <td><?= $customers['last_name'] ?></td>

    <td><?= $customers['phone_number'] ?></td>


    <td>

      <a class="btn btn-outline-success" href="?edit=<?= $customers['customer_id'] ?>">Edit</a> |

      <a class="btn btn-outline-danger" href="?delete=<?= $customers['customer_id'] ?>">Delete</a>

    </td>

  </tr>

  <?php endforeach; ?>

</table>
</div>

    </div>
  </div>
        
      </div>
    </div>
  </div>
</div>

  </div>
</div>


</div>

<style>

#head{

background:#713600;
}


body{
background:#38240d;

}



#formid, #cardinput, #cardtable{

background:#fdfbd4;
border-radius: 2%;


}

#cardbody{
background:#c05800;


}

</style>

</body>
</html>