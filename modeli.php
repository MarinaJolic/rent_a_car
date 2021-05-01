<?php

require_once('header.php');

    
if(!$session->is_signed_in()){
    header("Location: index.php");
}

?>

<body>

    <h1>Modeli page!</h1>


</body>