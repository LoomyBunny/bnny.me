<!DOCTYPE php>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/style.css">
  </head>    
<body>

<?php
  $imageDir = '/data/pictures/Keepers/compressed/';
  $images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
  $randomImage = $images[array_rand($images)];
  copy($randomImage, "/var/www/html/img/randomimage.jpg");
?>

  <style>
    .container {
      background-image: url('/img/randomimage.jpg?<?php echo time()?>');
    }
  </style>

<div class="container">
  <div class="content">
    <h3>Recent Photo Albums</h3>
    <?php
    $albumlinks = ["https://photos.app.goo.gl/ZqCPHinV63Uywk4w7",
                   "https://photos.app.goo.gl/DaXNGG7DonLoumNn8",
                   "https://photos.app.goo.gl/KTKAC2EotdpLxki5A",
                   "https://photos.app.goo.gl/sVC681wB7vv1mYLR6",
                   "https://photos.app.goo.gl/k8Db4PhAUxzVEMoZ6",
                   "https://photos.app.goo.gl/LU48d8fXZUYnZ7XU9",
                   "https://photos.app.goo.gl/AUaXknVo7Tnkg4u3A",
                   "https://photos.app.goo.gl/FGh2Nda1yeds8Txu7",
                   "https://photos.app.goo.gl/CzSreDg4PqdrVqRM8",
                   "https://photos.app.goo.gl/woUCJjwNMHMVfPJV2"];
    $albumNames = ["September 2022 Furbowl",
                   "Denfur 2022",
                   "April 2022 Foxtrot",
                   "Febuary 2022 Foxtrot",
                   "December 2021 Foxtrot",
                   "November 2019 Furbowl",
                   "September 2019 Furbowl",
                   "Denfur 2019",
                   "April 2019 Foxtrot",
                   "Jan 2018 Furbowl"];
    foreach ($albumlinks as $index => $album) {
      $name = $albumNames[$index];
      echo "<form action=\"$album\">\n";
      echo "<button type=\"submit\">$name</button>";
      echo "</form>";
    }

    ?>

<script>

  function refresh(){
    window.location.reload(true);
  }

</script>

</body>
</html>