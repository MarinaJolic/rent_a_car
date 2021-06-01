<?php

require_once('header.php');
require_once('navigacija.php');
require_once('modeli/auto.php');

    
if(!$session->is_signed_in()){
    header("Location: index.php");
}

?>

<body>

    <h1>Modeli page!</h1>


    <div>

        <?php foreach(Auto::index() as $auto){
            echo '
            
            
            <div class="author-card">
                <img src="Slike/mini.jpg" alt="Jelena Sjeran" style="width:100%">
                <div class="author-container">
                    <h3>' . $auto->model . '</h3>
                    <p> Godina: ' . $auto->godina . '</p> 
                    <p> Gorivo: ' . $auto->gorivo . '</p> 
                    <p> Oprema: ' . $auto->oprema . '</p> 
                </div>
            </div>
            
            ';
        } ?>

    </div>
</body>