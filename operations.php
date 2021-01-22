<?php
require "dbconnections.php";

function getAllData($limit) {
  $conn = OpenCon();
  $all_data = mysqli_query($conn, "SELECT * FROM `scoreboard` LIMIT {$limit}");

  if(mysqli_num_rows($all_data) > 0) {
     while ($row = $all_data->fetch_assoc()) {
         $alldata[] = $row;
     }
  }

  return $alldata;
  //CloseConnction($conn);
}

function get_score($id) {
  $conn = OpenCon();
  $getsingleuser = "SELECT * FROM `scoreboard` WHERE {$id}";
  $single_user = mysqli_query($conn, $getsingleuser);

  if(mysqli_num_rows($single_user) == 1) {
    return $single_user->fetch_assoc();
  } else {
    printf("Error: ", mysqli_error($conn));
    return "Error: " . mysqli_error($conn);
  }
  //return $single_user;
  //CloseConnction($conn);
}

function add_user($username, $displayname) {
  $conn = OpenCon();
  $insert_user = mysqli_query($conn, "INSERT INTO `scoreboard` (`username`, `displayname`) VALUES ('{$username}', '{$displayname}');");
  if($insert_user) {
    return "Sucessfully added  user!";
  } else {
    printf("Error: ", mysqli_error($conn));
    return "Error: " . mysqli_error($conn);
  }
  //CloseConnction($conn);
}

function update_score($id, $score) {
  $conn = OpenCon();
  $update_user = mysqli_query($conn, "UPDATE `scoreboard` SET `score` = '{$score}' WHERE `scoreboard`.`id` = {$id};");

  if($update_user) {
    return "Sucessfully updated score";
  } else {
    printf("Error: ", mysqli_error($conn));
    return "Error: " . mysqli_error($conn);
  }
  //CloseConnction($conn);
}

function getAllraw() {
  $conn = OpenCon();
  $getrawdata = "SELECT * FROM `scoreboard`";
  $rawdata = mysqli_query($conn, $getrawdata);

  if(mysqli_num_rows($rawdata) > 0) {
     while ($row = $rawdata -> fetch_assoc()) {
        $allscores[] = $row;
     }
  }
  return $allscores;
  //CloseConnction($conn);
}

function deleteaccount($id) {
  $conn = OpenCon();
  $delete_user = mysqli_query($conn, "DELETE FROM `scoreboard` WHERE `scoreboard`.`id` = {$id};");

  if($delete_user) {
    return "Sucessfully deleted account";
  } else {
    printf("Error: ", mysqli_error($conn));
    return "Error: " . mysqli_error($conn);
  }
  //CloseConnction($conn);
}
?>
