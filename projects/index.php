<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

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
    <h3>Projects</h3>
    <p class="fixed-width">Welcome to my projects page! This is where I showcase the various hardware and software projects I've worked on.</p>
    <p class="fixed-width">Below you'll find links to some of my favorite projects that I'm proud to share with the community.</p>
    
    <form action="/tablet/">
      <button type="submit">Tablet Project</button>
    </form>
    <form action="/fluid/">
      <button type="submit">Fluid Simulation</button>
    </form>
  </div>
</div>

<script>

  function refresh(){
    window.location.reload(true);
  }

</script>

</body>
</html>