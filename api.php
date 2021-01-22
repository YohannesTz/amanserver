<?php
require "operations.php";
header('content-type: application/json');

if($_SERVER['REQUEST_METHOD'] == "GET") {
  if(isset($_GET['id'])) { //if there is an id return single user score
	  $id = $_GET['id'];
	  $userscore =  get_score($id);
	  /* if(isset($userscore)) {
		echo json_encode($userscore);
	  } else {
		echo json_encode("error : no user with id");
	  } */
	  echo json_encode($userscore);
  } elseif (isset($_GET['limit'])) { //if there is  no id and if there is limit specified get all users with the limit\
	 $limit = $_GET['limit'];
	 $usersscorewithlimit = getAllData($limit);
	 if(isset($userscorewithlimit)){
	   echo json_encode($usersscorewithlimit);
	 } else {
	   echo json_encode("error : couldn't get data");
	 }
  } else { //if there is noting specified fetch all raw data
	$alldata = getAllraw();
	if(isset($alldata)){
	  echo json_encode($alldata);
	} else {
	  echo "error : no data";
	}
 }

} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
	if(isset($_POST['username']) && isset($_POST['displayname'])) {
		$username = $_POST['username'];
		$displayname = $_POST['diplayname'];
		$addeduser = add_user($username, $displayname);
		return json_encode($addeduser);
	}
} elseif ($_SERVER['REQUEST_METHOD'] == "DELETE") {
  if(isset($_DELETE['id'])) {
	$id = $_DELETE['id'];
	$deleteuser = deleteaccount($id);
	return json_encode($deleteuser);
  }
} elseif ($_SERVER['REQUEST_METHOD'] == "PUT") {
	if(isset($_PUT['id']) && isset($_PUT['score'])) {
		$id = $_PUT['id'];
		$score = $_PUT['score'];
		$updateScore = update_score($id, $score);
		return json_encode($updateScore);
	}
}
