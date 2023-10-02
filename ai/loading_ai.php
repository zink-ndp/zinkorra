<?php
    // $op = exec('echo "no" | python ai.py');
    system('echo "no" | python ai.py');
    header('Location: ../search-result.php');
?>