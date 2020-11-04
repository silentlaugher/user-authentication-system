<?php 
    include_once 'includes/core/session.php';

    session_destroy();
    header('Location: index.php');
?>