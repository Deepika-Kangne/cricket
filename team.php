<?php
include_once('header.php');
$curl = curl_init();

curl_setopt_array($curl, array(
   CURLOPT_URL => 'https://deepikaweb.000webhostapp.com/cricketAPIS/jwt-api/TeamApi.php',
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => '',
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 0,
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'POST',
   CURLOPT_POSTFIELDS => '{
    "name":"getTeams",
    "param":{
    }
}',
   CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
   ),
));

$response = curl_exec($curl);

curl_close($curl);

$response = json_decode($response);
?>
<div class="inner-page-banner">
   <div class="container">
   </div>
</div>
<div class="inner-information-text">
   <div class="container">
      <h3>Our Team</h3>
      <ul class="breadcrumb">
         <li><a href="index.html">Home</a></li>
         <li class="active">Our Team</li>
      </ul>
   </div>
</div>
</section>
<section id="contant" class="contant main-heading team">
   <div class="row">
      <div class="container">
         <div class="col-md-12 column">
            <h4>Points Table</h4>
            <aside id="sidebar" class="left-bar">
               <div class="feature-matchs">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Team</th>
                           <th>P</th>
                           <th>W</th>
                           <th>L</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (isset($response)) {
                           for ($i = 0; $i < sizeof($response->resonse->result); $i++) {
                        ?>
                              <tr>
                                 <td>1</td>
                                 <td><img src="images/img-01_004.png" alt=""><?php echo ($response->resonse->result[$i]->team_name) ?></td>
                                 <td>10</td>
                                 <td>12</td>
                                 <td>20</td>
                              </tr>
                        <?php
                           }
                        } ?>
                     </tbody>
                  </table>
               </div>
            </aside>
         </div>
      </div>
   </div>
</section>
<?php
include_once('footer.php');
?>