<?php



require 'insertorder.php';

require 'update.php';

require 'delete.php';

require 'select.php';

require 'dropdown.php';

?>


<?php

// CHECK IF EDIT MODE

$editUser = null;

if (isset($_GET['edit'])) {

  $order_id = $_GET['edit'];
  $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
  $stmt->execute([$order_id]);
  $editUser = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>



    <div class="container-xl mb-5 mt-5" >


    
    <div class="container">
<div class="mb-2">
<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="landing_orders.php">Add Orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="landing_addcustomer.php">Add Customer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="landing_menuitems.php">Add Menu Item</a>
  </li>

</ul>
</div>

<div class="card text-white border-dark mb-3">
  <div class="card-header" id="head">
    <h3  class="text-center">Order Section</h3>
  </div>
  <div id="cardbody" class="card-body">
    
  
   
    <div class="row">
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card border-dark mb-3">
      <div id="cardinput" class="card-body">

      

      
      <form id="formid" method="POST" class="row g-3">
<h3 class="text-center"><?= $editUser ? 'Update Order' : 'Add Order' ?></h3>
  

  <?php if (!empty($editUser)): ?>

    <input type="hidden" name="order_id" value="<?= $editUser['order_id'] ?>">

  <?php endif; ?>






<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Customer Name</label>
  <select class="form-select" id="inputGroupSelect01" name="customer_id" required>

    <option value="<?= !empty($editUser)
     ? $editUser['customer_id'] : '' ?>">Choose a name</option>

      <?php foreach ($orders_name as $orders_name): ?>
        <option value="<?= $orders_name['customer_id']; ?>">
            <?= $orders_name['first_name']; ?>
        </option>
    <?php endforeach; ?>

  </select>
</div>


<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Menu Item</label>
  <select class="form-select" id="inputGroupSelect01" name="item_id" required>

    <option value="<?= !empty($editUser)
     ? $editUser['item_id'] : '' ?>">Choose an item</option>

      <?php foreach ($menu_item_name as $menu_item_name): ?>
        <option value="<?= $menu_item_name['item_id']; ?>">
            <?= $menu_item_name['dish_name']; ?>
        </option>
    <?php endforeach; ?>

  </select>
</div>


      <div class="col-12">
    <label for="inputAddress" class="form-label">Quantity</label>
    <input type="number" name="quantity" value="<?= !empty($editUser)
     ? $editUser['quantity'] : '' ?>"  required class="form-control" placeholder="Enter quantity">
  </div>


  <!-- Submit buttons -->

  <?php if (!empty($editUser)): ?>

    <button type="submit" class="btn btn-success" name="update_order">Update</button>

    <a class="btn btn-danger" href="landing_orders.php">Cancel</a>

  <?php else: ?>

    <button type="submit" class="btn btn-success" name="add_order">Add</button>

  <?php endif; ?>

</form>


      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="card border-info mb-3">
      <div id="cardtable" class="card-body">
        
        
<div id="tablediv">

<h3 id="usertablelabel" class="text-center mb-4">Orders Table</h3>

<table  class="table table-warning table-striped table-hover">


  <tr>


 

    <th>ID</th>
    <th>Customer</th>
<th>Dish</th>

    <th>Total</th>
<th>Date</th>

    <th>Action</th>

  </tr>



  <?php foreach ($order_display as $order_display): ?>

  <tr>

    <td><?= $order_display['order_id'] ?></td>

        <td><?= $order_display['full_name'] ?></td>

    <td><?= $order_display['dish_quantity'] ?></td>

    <td><?= $order_display['total_price'] ?></td>

    <td><?= $order_display['order_date'] ?></td>

    


    <td>

      <a class="btn btn-outline-success" href="?edit=<?= $order_display['order_id'] ?>">Edit</a> |

      <a class="btn btn-outline-danger" href="?delete=<?= $order_display['order_id'] ?>">Delete</a>

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