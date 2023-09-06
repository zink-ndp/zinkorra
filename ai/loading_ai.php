<?php
    $op = exec('echo "no" | python3 ai.py');
    echo $op;
    header('Location: ../search-result.php');
?>