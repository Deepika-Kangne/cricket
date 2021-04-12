<?php
include_once('header.php');
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://deepikaweb.000webhostapp.com/cricketAPIS/jwt-api/countryApi.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "name":"getCountries",
    "param":{
        "name":"India"
    }
}',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);
$response = json_decode($response);
curl_close($curl);

?>
<div class="inner-page-banner">
    <div class="container">
    </div>
</div>
<div class="inner-information-text">
    <div class="container">
        <h3>Countries</h3>
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Countries</li>
        </ul>
    </div>
</div>
</section>
<section id="contant" class="contant main-heading team">
    <div class="row">
        <div class="container">
            <?php if (isset($response)) {
                for ($i = 0; $i < sizeof($response->resonse->result); $i++) {
            ?>
                    <div class="col-md-3 column">
                        <div class="card">
                            <img class="img-responsive" src="images/img-1-4.jpg" alt="John" style="width:100%">
                            <div class="">
                                <h4><?php echo ($response->resonse->result[$i]->country_name) ?></h4>
                                <p class="title">Designer</p>
                                <p>
                                <div class="center"><button class="button">Contact</button></div>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>
        </div>
    </div>
</section>
<?php
include_once('footer.php');
?>