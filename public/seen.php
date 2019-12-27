<?php

include("config-release.php");

$db = mysqli_connect(
  $DB_HOST,
  $DB_USER,
  $DB_PASSWORD,
  $DB_NAME
);

if (!$db) {
  // TODO: handle connection errors so the image gets loaded anyway
  die("Failed to connect to database.");
}

$headers = getallheaders();

$image_url = $db->real_escape_string($_GET["image"]);
$remote_address = $_SERVER["REMOTE_ADDR"];
$time = strval(time());
$browser = $headers["User-Agent"];

// TODO: add time based protection from spamming the db
$query = "INSERT INTO `activity` (`time`, `remote_addr`, `browser`, `image`) VALUES ($time, '$remote_address', '$browser', '$image_url')";
$db->query($query);
$db->close();

redirect($image_url);

function redirect($url) {
  header("Location: $url");
  die();
}

?>