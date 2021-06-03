<?php
require_once('header.php');
require_once('navigacija.php');
require_once('modeli/rezervacija.php');
require_once('modeli/auto.php');
require_once('kontroleri/sesija.php');


if(isset($_POST['cancel'])){
    Rezervacija::delete($_POST['cancel']);
}
?>

<body>

<h4 class="p-4">Rezervacije</h4>

<div class="container-fluid">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Datum početka</th>
        <th scope="col">Datum završetka</th>
        <th scope="col">Auto</th>
        <th scope="col">Akcije</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $result = Rezervacija::index();
        while($row = $result->fetch_assoc()){
            echo '
            
            <tr>
                <td>' . $row["Datum početka rezervacije"] . '</td>
                <td>' . $row["Datum završetka rezervacije"] . '</td>
                <td>' . Auto::car_by_id((int)$row["Šifra_auta"])['Model'] . '</td>
                <td>
                <form action="rezervacije.php" method="POST">
                    <button type="submit" name="cancel" value=' . $row['Šifra'] . ' class="btn btn-danger">Poništi</button>
                </form>
                </td>
            </tr>
            
            ';
        }
        
    
    ?>
        
    </tbody>
    </table>
</div>

</body>