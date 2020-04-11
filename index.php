<?php
define("MOHABDULS","CORONA-LIVE-UPDATE");
require("_header.php");
require("function.class.php");

//class
$corona = new corona();
//function
$dataglobal = $corona->getApiGlobal();
$dataid = $corona->getApiIndonesia();

//total global
$totalPositive = $corona->getTotalPositive();
$totalRecovered = $corona->getTotalRecovered();
$totalDeaths = $corona->getTotalDeaths();
$positif = $totalPositive["value"];
$meninggal = $totalDeaths["value"];
$sembuh = $totalRecovered["value"];

$positif_id = $dataid[0]["positif"];
$meninggal_id = $dataid[0]["meninggal"];
$sembuh_id = $dataid[0]["sembuh"];
?>
<div class="container p-2 shadow shadow-sm primary-bg mt-2 mb-2">
    <h1 class="lead text-light">Data Indonesia</h1>
</div>
<div class="container p-2 shadow shadow-sm content-bg mt-2 mb-2">
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card rounded">
                        <img class="img-fluid img-thumb" src="assets/flag/indonesia.png" alt="Indonesian Flag"/>
                        <div class="card-body">
                            <h2 class="primary-text">Indonesia</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <table class="table">
                            <thead class="primary-bg text-light rounded">
                                <tr>
                                    <th scope="col">Indonesia</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Positif</td>
                                    <td><?php echo $positif_id; ?></td>
                                </tr>
                                <tr>
                                    <th>Meninggal</td>
                                    <td><?php echo $meninggal_id; ?></td>
                                </tr>
                                <tr>
                                    <th>Sembuh</td>
                                    <td><?php echo $sembuh_id; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-2 shadow shadow-sm primary-bg mt-2 mb-2">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="lead text-light">Data Global</h1>
        </div>
        <div class="float-right">
            <div class="input-group">
                <div class="input-group-prepend">
                    <input class="form-control custom-input text-secondary" type="text" id="findCountry" placeholder="Cari Negara">
                </div>
                <div class="input-group-prepend ml-2">
                    <button class="btn btn-sm custom-btn rounded-sm" id="findBtn">Cari</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-2 shadow shadow-sm content-bg mt-2 mb-2">
    <span class="text-dark">Total Positif : <span class="text-warning"><?php echo $positif; ?></span></span> - <span class="text-dark">Total Meninggal : <span class="text-danger"><?php echo $meninggal; ?></span></span> - <span class="text-dark">Total Sembuh : <span class="text-success"><?php echo $sembuh; ?></span></span>
</div>
<div class="container p-2 shadow shadow-sm content-bg mt-2 mb-2">
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="row" id="find" style="display: none;">

            </div>
            <div class="row" id="current">
                <?php
                for($i = 0; $i < count($dataglobal); $i++){
                    $g = $dataglobal[$i];
                    $attr = $g["attributes"];
                    $country = $attr["Country_Region"];
                    $confirmed = $attr["Confirmed"];
                    $death = $attr["Deaths"];
                    $recovered = $attr["Recovered"];
                    $active = $attr["Active"];
                    ?>
                    <div class="col-sm-4 mb-2">
                        <div class="card round">
                            <div class="secondary-bg p-2">
                                <p class="text-light lead m-0"><?php echo $country; ?></p>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Confirmed</td>
                                            <td><?php echo $confirmed; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Meninggal</td>
                                            <td><?php echo $death; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Positif</td>
                                            <td><?php echo $active; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sembuh</td>
                                            <td><?php echo $recovered; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include("_footer.php");
?>