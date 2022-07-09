<?php
    require_once 'connect.php';

    if (isset($_POST['save'])) {
        $uID = $connect->real_escape_string($_POST['uID']);
        $ratedIndex = $connect->real_escape_string($_POST['ratedIndex']);
        $ratedIndex++;

        if (!$uID) {
            $connect->query("INSERT INTO stars (rateIndex) VALUES ('$ratedIndex')");
            $sql = $connect->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
            $uData = $sql->fetch_assoc();
            $uID = $uData['id'];
        } else
            $connect->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID'");

        exit(json_encode(array('id' => $uID)));
    }

    $sql = $connect->query("SELECT id FROM stars");
    $numR = $sql->num_rows;

    $sql = $connect->query("SELECT SUM(rateIndex) AS total FROM stars");
    $rData = $sql->fetch_array();
    $total = $rData['total'];

    $avg = $total / $numR;

?>