<?php
    require_once('functions.php');

    if(!empty($_POST['value']) || $_POST['value']==="0"){
        $value = countValue( $_POST['value']);
    } else {
        echo 'invalid';
    }
?>