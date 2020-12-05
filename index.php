<?php
  
  // Include database file
  include 'Item.php';

  $itemObj = new Item();
 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP OOP Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>PHP OOP Project</h4>
</div><br><br> 

<div class="container">

  <h2>View Records for Task one
    <a href="tasktwo.php" class="btn btn-primary" style="float:right;">Check Task Two</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
      
        <th>Category Name</th>
        <th>Total Items</th>
       
      </tr>
    </thead>
    <tbody>
        <?php 
          $items = $itemObj->displayTaskOneData(); 
          foreach ($items as $item) {
        ?>
        <tr>
          <td><?php echo $item['category_name'] ?></td>
          <td><?php echo $item['total_items'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>