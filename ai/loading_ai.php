<?php
    $command = "echo 'no' | python ai.py"; 
    shell_exec($command);
    header('Location: ../search-result.php');
?>