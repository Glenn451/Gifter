<?php
include 'dbConnect.php';
session_start();

$jTableResult = array();

//Get records from database
if(isset($_GET['table']) AND $_GET['table'] == "shop"){ //requesting the shopping list
	$result = query("UPDATE gifts SET gifterId = NULL WHERE gifterId = ".$_SESSION['userInfo']['userId']." AND giftID = ". $_POST["giftId"]);
}else if(isset($_GET['table']) AND $_GET['table'] == "thank"){ //requesting the thank-you list
	$result = query("UPDATE gifts SET thanked = TRUE WHERE userId = ".$_SESSION['userInfo']['userId']." AND giftID = ". $_POST["giftId"]);
}else{
	$result = query("DELETE FROM gifts WHERE giftId = " . $_POST["giftId"]." AND userId = ".$_SESSION['userInfo']['userId']);
}
 
 if (mysqli_errno($mysqli))
  {
  	$jTableResult['Result'] = "ERROR";
  }else{
  	$jTableResult['Result'] = "OK";
  }
 
//Return result to jTable
print json_encode($jTableResult);


/*
{
 "Result":"OK",
}*/

?>