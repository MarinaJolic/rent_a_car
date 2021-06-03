<?php

require_once('navigacija.php');
require_once('header.php');
require_once('modeli/proizvodac.php');
require_once('modeli/auto.php');
require_once('modeli/korisnik.php');
require_once('modeli/rezervacija.php');
require_once('kontroleri/sesija.php');

    
if(!$session->is_signed_in()){
    header("Location: index.php");
}


if(isset($_POST['submit'])){

    $auto = new Auto();
    $auto->godina = $_POST['godina_proizvodnje'];
    $auto->serijski_broj = $_POST['serijski_broj'];
    $auto->registracija = $_POST['registracija'];
    $auto->vrsta_motora = $_POST['vrsta_motora'];
    $auto->oprema = $_POST['oprema'];
    $auto->gorivo = $_POST['gorivo'];
    $auto->broj_vrata = $_POST['broj_vrata'];
    $auto->broj_sjedista = $_POST['broj_sjedista'];
    $auto->proizvodac = $_POST['proizvodac'];
    $auto->model = $_POST['model'];

    $auto->create() == true ? $status = "uspjeh" : $status = "neuspjeh";
}

if(isset($_POST['delete'])){
    Auto::delete($_POST['delete']) == 1 ? $status = "uspjeh" : $status = "neuspjeh";
}

if(isset($_POST['create_reservation'])){
    $current_user_id = $session->get_user_id();
    $auto_id = $_POST['create_reservation'];
    Rezervacija::create_reservation($current_user_id, $auto_id);
}

$user_role = User::check_user_role($session->get_user_id());


?>

<body>
    <?php  
        if(isset($status)){
            if($status == 'uspjeh'){
                echo '
                
                <div class="alert alert-success" role="alert">
                Uspjeh!
              </div>
                
                ';
            }else{
                echo '
                
                <div class="alert alert-danger" role="alert">
                Neuspjeh!
                </div>
                
                ';
            }
        }
    
    ?>
    <form class="p-5" action="modeli.php" method="POST" <?php if($user_role == "Administrator"){ echo "style='display: block;'";}else{ echo "style='display: none;'"; }  ?>>
        <div class="form-group">
            <label for="exampleInputEmail1">Godina prozvodnje</label>
            <input type="text" class="form-control mb-3" name="godina_proizvodnje"  placeholder="Godina proizvodnje">

            <label for="exampleInputEmail1">Serijski broj</label>
            <input type="text" class="form-control mb-3" name="serijski_broj"  placeholder="Serijski broj">

            <label for="exampleInputEmail1">Registracija</label>
            <input type="text" class="form-control mb-3" name="registracija"  placeholder="Registracija">

            <label for="exampleInputEmail1">Vrsta motora</label>
            <input type="text" class="form-control mb-3" name="vrsta_motora"  placeholder="Vrsta motora">

            <label for="exampleInputEmail1">Oprema</label>e
            <input type="text" class="form-control mb-3" name="oprema"  placeholder="OPrema">

            <label for="exampleInputEmail1">Gorivo</label>
            <input type="text" class="form-control mb-3" name="gorivo"  placeholder="Gorivo">

            <label for="exampleInputEmail1">Broj vrata</label>
            <input type="text" class="form-control mb-3" name="broj_vrata"  placeholder="Broj vrata">

            <label for="exampleInputEmail1">Broj sjedišta</label>
            <input type="text" class="form-control mb-3" name="broj_sjedista" placeholder="Broj sjedišta">

            <label for="exampleFormControlSelect1">Proizvodac</label>
            <select class="form-control mb-3" id="exampleFormControlSelect1" name="proizvodac">
                <?php 
                    foreach(Proizvodac::index() as $manufacturer){
                        echo "<option value=" . $manufacturer->id . ">" . $manufacturer->naziv . "</option>";
                    }
                ?>
            </select>

            <label for="exampleInputEmail1">Model</label>
            <input type="text" class="form-control mb-3" name="model" placeholder="Model">
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-3">Spremi</button>
    </form>


    <div>

    <div class="container-fluid mt-3">
        <div class="row">
            
        <?php 
        foreach(Auto::index() as $auto){
            if($user_role == "Administrator"){
                echo '
                    <div class="col-6 mb-5">
                    <div class="author-card">
                        <img src="Slike/mini.jpg" alt="Jelena Sjeran" style="width:100%">
                        <div class="author-container">
                            <h3>' . $auto->model . '</h3>
                            <p> Godina: ' . $auto->godina . '</p> 
                            <p> Gorivo: ' . $auto->gorivo . '</p> 
                            <p> Oprema: ' . $auto->oprema . '</p> 
                            <form action="modeli.php" method="POST">
                                <button type="submit" name="delete" value=' . $auto->id . ' class="btn btn-danger mb-3">Izbriši</button>
                                <button type="submit" name="create_reservation" value=' . $auto->id . ' class="btn btn-success mb-3">Rezerviraj</button>
                            </form>
                            </div>
                        </div>     
                    </div>
                    
                    ';
            }else{
                echo '
                    <div class="col-6 mb-5">
                    <div class="author-card">
                        <img src="Slike/mini.jpg" alt="Jelena Sjeran" style="width:100%">
                        <div class="author-container">
                            <h3>' . $auto->model . '</h3>
                            <p> Godina: ' . $auto->godina . '</p> 
                            <p> Gorivo: ' . $auto->gorivo . '</p> 
                            <p> Oprema: ' . $auto->oprema . '</p> 
                            <form action="modeli.php" method="POST">
                                <button type="submit" class="btn btn-success mb-3">Rezerviraj</button>
                            </form>
                            </div>
                        </div>     
                    </div>
                    
                    ';
            }
            
        } ?>
            </div>
        </div>

    </div>
</body>