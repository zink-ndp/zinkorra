<?php

    function getMaxId($conn, $sql){
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['maxid'];
    }

    function querySql($conn, $sql){
        $conn->query($sql);
    }

    function querySqlwithResult($conn, $sql){
        $result = $conn->query($sql);
        return $result;
    }

?>