<?php 
$servername = "localhost";
$username = "root";
$password = "";
$conn="";
try {
  $conn = new PDO("mysql:host=$servername;dbname=base", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$l=$_POST['login'];
$p=$_POST['pass'];

try {
	  $sql = "SELECT `orders`.`orderID`,`orders`.`productName`,`orders`.`price`,`user`.`name` FROM `orders` INNER JOIN `user` ON `orders`.`userID`=`user`.`id` WHERE `user`.`login`='$l' and `user`.`pass`='$p'";
	    $result = $conn->query($sql);
    	echo "<table ><tr><th>ORDER_ID</th><th>PRODUCT_NAME</th><th>PRICE</th><th>USERID</th></tr>";
    	while($row = $result->fetch())
    	{
        	echo "<tr>";
	            echo "<td>" . $row["orderID"] . "</td>"; // the name of the keys must match the name of the table attribute 
	            echo "<td>" . $row["productName"] . "</td>";
	            echo "<td>" . $row["price"] . "</td>";
	            echo "<td>" . $row["name"] . "</td>";
        	echo "</tr>";
    	}
    	echo "</table>";

} catch (Exception $e) {
echo $sql . "<br>" . $e->getMessage();	
}
$conn=null;
?>