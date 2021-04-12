<?php
include_once('header.php');
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://deepikaweb.000webhostapp.com/cricketAPIS/jwt-api/PlayerApi.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "name":"getAllPlayers",
    "param":{
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
        <h3>Players</h3>
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Players</li>
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
                            <img class="img-responsive" src="<?php echo ($response->resonse->result[$i]->player_pic) ?>" alt="John" style="width:100%">
                            <div class="">
                                <h4><?php echo ($response->resonse->result[$i]->name) ?></h4>
                                <p class="title"><?php echo ($response->resonse->result[$i]->team_name) ?></p>
                                <p class="title">AGE : <?php echo ($response->resonse->result[$i]->age) ?></p>
                                <p class="title">MAtched : <?php echo ($response->resonse->result[$i]->matches) ?></p>
                                <p class="title">highscore<?php echo ($response->resonse->result[$i]->highscore) ?></p>
                                <p>
                                    <!-- <div class="center"><button class="button">Contact</button></div> -->
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