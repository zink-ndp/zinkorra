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

    function uploadImage($file, $filename, $tar_dir, $fname){

        move_uploaded_file($file['tmp_name'],$tar_dir.$filename);

        $new_filename = $fname;

        rename($tar_dir.$filename, $tar_dir.$new_filename);

        return $new_filename;
    }

?>