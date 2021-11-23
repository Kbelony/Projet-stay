<?php

include "db_conn.php"; // Using database connection file here
$sql = "SELECT rental.id, rental.title, rental.description, rental.price, rental.image_id, image.image_url, rental.type_id, type.type FROM rental
JOIN image ON rental.image_id = image.id 
JOIN type ON rental.type_id = type.id";
$result = $conn->query($sql);

require('vendor/autoload.php');
$faker = 'Faker\Factory'::create()
?><!DOCTYPE html>
<html>
<head> 
  <title>Title</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin=""/>
  <link rel="stylesheet" href="style.css">
</head>
<body>



<h1 style="padding-left: 30px;">Tous nos <strong>logements</strong></h1>

<div class="container">

  <div class="list">
      <?php 
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
        <div class="item js-marker" data-lat="<?= $faker->latitude(48.86325, 48.86852) ?>" data-lng="<?= $faker->longitude(2.26993, 2.40441) ?>" data-price="<?= $row["price"] ?>">
          <img src="uploads/<?=$row['image_url']?>">
          <h4><?php echo $row["type"]; ?></h4>
          <p>
          <?php echo $row["description"] ?></p>
        </div>
      <?php } ?>
  </div>

  <div class="map" id="map"></div>

</div>
<script src="vendor.js"></script>   
<script src="app.js"></script>

<?php
    } else { ?>
    0 results
    <?php  }

    $conn->close();
    ?>
</body>
</html>
