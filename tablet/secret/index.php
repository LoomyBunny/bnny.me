<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bnny.me - Tablet Secret</title>

    <link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>">
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
      background-color: coral;
    }
  </style>

<div class="container">
  <div class="content">
    <h2>Here are the five sayings on the front of the board.</h2>
    <p>Be excellent to each other</p>
    <p>Love conquers all</p>
    <p>Embrace your flaws they make you human</p>
    <p>You are loved and valued just as you are</p>
    <p>Hope is always present even in the darkest moments</p>
    <p><a href="/tablet">Go Back</a></p>


<script>

  function refresh(){
    window.location.reload(true);
  }

</script>

</body>
</html>
