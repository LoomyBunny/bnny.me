<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>bnny.me - Fluid</title>

    <link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>">
  </head>    
<body>



  <style>
    .container {
      background-color: coral;
    }
  </style>

<?php include '../includes/navigation.php'; ?>

<div class="container">
  <div class="content">
    <h3>Fluid Simulation Badge</h3>
    <p class="fixed-width">Thank you for visiting this page!  I spent about three months and two hardware revisons making this badge.
      It's been a work of love!</p>
    <p class="fixed-width">If youre interested,  I added all the code and schematics are uploaded <a href="https://github.com/LoomyBunny/FluidSim">here</a>. 
  If you run into any bugs or problems feel free to reach out and I'll try to get you a patched file.</p>
  </div>
</div>




<script>

  function refresh(){
    window.location.reload(true);
  }

</script>

</body>
</html>
