<?php 

    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'fishhead';
    
   

    $db = new PDO("mysqli:host={$db_host};dbname={$db_name}",$db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    ?>
