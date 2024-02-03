<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $roomName = $_POST['room_name'];
  $roomTopic = $_POST['room_topic'];
  $roomAbout = $_POST['room_about'];
  
  $username = $_SESSION['username'];

  include_once '../model/roomModel.php';

  createRoom($roomName, $roomTopic, $roomAbout, $username);

  header('Location: ../view/theme/index.php');
  exit();
} else {
  header('Location: create-room.php');
  exit();
}
