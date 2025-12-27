<!DOCTYPE php>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

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
      background-image: url('/img/randomimage.jpg?<?php echo time()?>');
    }
  </style>

<?php include 'includes/navigation.php'; ?>

<div class="container">
  <div class="content">
    <h3>Photos by Loomy</h3>
    <div class="footer">
      <button onclick="refresh()">random image</button>


<script>

  function refresh(){
    window.location.reload(true);
  }

</script>

</body>
</html>