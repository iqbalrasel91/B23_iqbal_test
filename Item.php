<?php

	class Item
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "brainstation_test";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}

	
		// Fetch TaskOne records for show listing
		public function displayTaskOneData()
		{
		    $query = "SELECT `category`.`Name` AS category_name,COUNT(`item_category_relations`.`ItemNumber`) AS total_items FROM `category`
INNER JOIN `item_category_relations` ON (`category`.`Id` = `item_category_relations`.`categoryId` )
INNER JOIN `item` ON (`item`.`Number`= `item_category_relations`.`ItemNumber`)
GROUP BY category.`Id` ORDER BY COUNT(`item_category_relations`.`ItemNumber`) DESC";

		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}

		// Fetch TaskOne records for show listing
		public function displayTaskTwoData()
		{
		    $query = "SELECT tt.id,TPC,tt.MName,CName,CASE WHEN TS IS NULL THEN 0 ELSE TS END AS TS FROM (
			SELECT C.id,C.name AS MName,CR.name AS CName,CR.id AS pid FROM  
			(SELECT DISTINCT(`category`.`Id`) AS id, `Name`,`category`.`Id` AS parent_id
				FROM category
				INNER JOIN `catetory_relations` ON (`category`.`Id`=`catetory_relations`.`ParentcategoryId`)
				WHERE  `ParentcategoryId`  NOT IN (SELECT `catetory_relations`.`categoryId` FROM `catetory_relations`)) C INNER JOIN

			( SELECT `categoryId` AS id, `Name`,`ParentcategoryId` AS parent_id
				FROM category
				INNER JOIN `catetory_relations` ON (`category`.`Id`=`catetory_relations`.`categoryId`) ) CR ON C.ID=CR.parent_id) tt LEFT OUTER JOIN

			(
			SELECT categoryId,COUNT(Name1) AS TS FROM Item_category_relations icr INNER JOIN Item i ON
			icr.ItemNumber=i.Number
			GROUP BY categoryId
			) it ON tt.pid=it.categoryId 

			INNER JOIN 

			(SELECT id,MName,SUM(CASE WHEN TS IS NULL THEN 0 ELSE TS END) AS TPC FROM (
			SELECT C.id,C.name AS MName,CR.name AS CName,CR.id AS pid FROM  
			(SELECT DISTINCT(`category`.`Id`) AS id, `Name`,`category`.`Id` AS parent_id
				FROM category
				INNER JOIN `catetory_relations` ON (`category`.`Id`=`catetory_relations`.`ParentcategoryId`)
				WHERE  `ParentcategoryId`  NOT IN (SELECT `catetory_relations`.`categoryId` FROM `catetory_relations`)) C INNER JOIN

			( SELECT `categoryId` AS id, `Name`,`ParentcategoryId` AS parent_id
				FROM category
				INNER JOIN `catetory_relations` ON (`category`.`Id`=`catetory_relations`.`categoryId`) ) CR ON C.ID=CR.parent_id) tt LEFT OUTER JOIN

			(
			SELECT categoryId,COUNT(Name1) AS TS FROM Item_category_relations icr INNER JOIN Item i ON
			icr.ItemNumber=i.Number
			GROUP BY categoryId
			) it ON tt.pid=it.categoryId
			GROUP BY id,MName) t12 ON tt.id=t12.id";

		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}



	}
?>