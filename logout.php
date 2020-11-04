<?php 
    include_once 'includes/core/session.php';
    include_once 'includes/core/utilities.php';

    session_destroy();
    redirectTo('index');
?>