<?php
    // Lấy dữ liệu file
    $file = $_FILES["img"];

    // Kiểm tra xem file có phải là ảnh không
    if (!is_uploaded_file($file['tmp_name'])) {
    return false;
    }

    // Lấy tên file
    $filename = $file['name'];

    // Lấy đường dẫn thư mục đích
    // $destination_path = 'ai';

    // Copy file
    // move_uploaded_file($file['tmp_name'], $destination_path . '/' . $filename);
    // $new_filename = 'img_to_search.png';
    // rename($destination_path . '/' . $filename, $destination_path . '/' . $new_filename);

    move_uploaded_file($file['tmp_name'],$filename);
    $new_filename = 'img_to_search.png';
    rename($filename, $new_filename);


    // delete all files and sub-folders from a folder
    $dir = "metadata-files";

    // if (is_dir($folder)) {
    //     deleteAll($folder);
    //     function deleteAll($dir) {
    //         foreach(glob($dir . '/*') as $file) {
    //         if(is_dir($file))
    //             deleteAll($file);
    //         else
    //             unlink($file);
    //         }
    //         rmdir($dir);
    //     }
    // }

    function delTree($dir) {

        $files = array_diff(scandir($dir), array('.','..'));
     
         foreach ($files as $file) {
     
           (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
     
         }
     
         return rmdir($dir);
     
    }

    if(is_dir("$dir")){
        delTree($dir);
    }
    

    // $command = escapeshellcmd('python ai/ai.py'); 
    // $output = shell_exec($command); 
    // echo $output; 

    system("python ai.py");
?>