<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>bnny.me - Tablet</title>

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
    <h3>You found the tablet's secret!</h3>
    <p>Thank you for solving the puzzle!</p>
    <p>If you would like to see the solution for the five other items, click <A href="/tablet/secret">here</A></p>
  </div>
</div>



<script>

  function refresh(){
    window.location.reload(true);
  }

</script>

</body>
</html>
