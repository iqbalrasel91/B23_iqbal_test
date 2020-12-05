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
  
  <style>
  * {margin: 0; padding: 0; list-style: none;}
ul li {
  margin-left: 15px;
  position: relative;
  padding-left: 5px;
}
ul li::before {
  content: " ";
  position: absolute;
  width: 1px;
  background-color: #000;
  top: 5px;
  bottom: -12px;
  left: -10px;
}
body > ul > li:first-child::before {top: 12px;}
ul li:not(:first-child):last-child::before {display: none;}
ul li:only-child::before {
  display: list-item;
  content: " ";
  position: absolute;
  width: 1px;
  background-color: #000;
  top: 5px;
  bottom: 7px;
  height: 7px;
  left: -10px;
}
ul li::after {
  content: " ";
  position: absolute;
  left: -10px;
  width: 10px;
  height: 1px;
  background-color: #000;
  top: 12px;
}
  </style>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>PHP OOP Project</h4>
</div><br><br> 

<div class="container">

  <h2>View Records for Task Two
    <a href="index.php" class="btn btn-primary" style="float:right;">Check Task One</a>
  </h2>
  
  <ul>
  
      <?php 
          $items = $itemObj->displayTaskTwoData(); 
          foreach ($items as $item) {
			  
			  
        ?>
		
  <li>
    <?php echo $item['MName'] ?>(<?php echo $item['TPC'] ?>)
    <ul>
    
      <li><?php echo $item['CName'] ?>(<?php echo $item['TS'] ?>)</li>
      
    </ul>
  </li>
  
  <?php } ?>
  
 
</ul>
 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>