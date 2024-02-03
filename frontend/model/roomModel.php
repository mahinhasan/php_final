<?php
include_once 'db.php';

function createRoom($roomName, $roomTopic, $roomAbout, $username) {
  $connection = getConnection();

  if (!$connection) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  $sql = 'INSERT INTO posts (post_id, user_id, title, content, created_at,roomTopic) 
          SELECT seq_post_id.NEXTVAL, ID, :roomName, :roomAbout, CURRENT_TIMESTAMP ,:roomTopic	
          FROM users 
          WHERE username = :username';

  $stmt = oci_parse($connection, $sql);

  oci_bind_by_name($stmt, ':roomName', $roomName);
  oci_bind_by_name($stmt, ':roomAbout', $roomAbout);
  oci_bind_by_name($stmt, ':roomTopic', $roomTopic);
  oci_bind_by_name($stmt, ':username', $username);

  $result = oci_execute($stmt, OCI_DEFAULT);
  
  if (!$result) {
    $e = oci_error($stmt);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  oci_commit($connection);

  oci_free_statement($stmt);

  oci_close($connection);
}



function getRooms() {
  $connection = getConnection();

  $sql = 'SELECT * FROM posts';

  $stmt = oci_parse($connection, $sql);

  oci_execute($stmt);

  $rows = array();
  while ($row = oci_fetch_assoc($stmt)) {
    $rows[] = $row;
  }

  return $rows;
}


function getRoomById($roomId) {
  $connection = getConnection();

  $sql = 'SELECT * FROM rooms WHERE room_id = :room_id';

  $stmt = $connection->prepare($sql);

  $stmt->bindValue(':room_id', $roomId);

  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row ?: null;
}

function deleteRoom($roomId) {
  $connection = getConnection();

  $sql = 'DELETE FROM rooms WHERE room_id = :room_id';

  $stmt = $connection->prepare($sql);

  $stmt->bindValue(':room_id', $roomId);

  $result = $stmt->execute();

  return $result;
}

function updateRoom($roomId, $roomName, $roomTopic, $roomAbout) {
  $connection = getConnection();

  $sql = 'UPDATE rooms SET room_name = :room_name, room_topic = :room_topic, room_about = :room_about WHERE room_id = :room_id';

  $stmt = $connection->prepare($sql);

  $stmt->bindValue(':room_id', $roomId);
  $stmt->bindValue(':room_name', $roomName);
  $stmt->bindValue(':room_topic', $roomTopic);
  $stmt->bindValue(':room_about', $roomAbout);

  $result = $stmt->execute();

  return $result;
}

function getRoomsByUser($username) {
  $connection = getConnection();

  $sql = 'SELECT * FROM rooms WHERE created_by = :created_by';

  $stmt = $connection->prepare($sql);

  $stmt->bindValue(':created_by', $username);

  $stmt->execute();

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $rows;
}

function searchRooms($keyword) {
  $connection = getConnection();

  $sql = 'SELECT * FROM rooms WHERE room_name LIKE :keyword OR room_topic LIKE :keyword';

  $stmt = $connection->prepare($sql);

  $stmt->bindValue(':keyword', '%' . $keyword . '%');

  $stmt->execute();

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $rows;
}
?>
