<?php
define("UPLOAD_DIR", "/afs/cad/u/b/j/bjc36/public_html/is218assignments/assignment11/");
if(!empty($_FILES["myFile"])){
  $myFile = $_FILES["myFile"];

  if ($myFile["error"] !== UPLOAD_ERR_OK){
    echo "<p> An error has occured. </p>";
    exit;
  }


  $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

  $i = 0;
  $parts = pathinfo($name);
  while (file_exists(UPLOAD_DIR . $name)){
    $i++;
    $name = $parts["filename"] . "_" . $i . "." . $parts["extensions"];
  }

  $success = move_uploaded_file($myFile["tmp_name"], UPLOAD_DIR . $name);
  if(!$success){
    echo "<p> Unabe to save file. </p>";
    exit;
  }
  chmod(UPLOAD_DIR . $name, 0644);
}


 ?>
