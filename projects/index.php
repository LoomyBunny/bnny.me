<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>bnny.me - Projects</title>

    <link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>">
  </head>    
<body>



<?php include '../includes/navigation.php'; ?>

<div class="container coral">
  <div class="content">
    <h3>Projects</h3>
    <p class="fixed-width">Welcome to my projects page! This is where I showcase the various hardware and software projects I've worked on.</p>
    <p class="fixed-width">Below you'll find links to some of my favorite projects that I'm proud to share with the community.</p>
    <div class="content-buttons">
      <form action="/tablet/">
        <button type="submit" class="content-btn">Tablet Project</button>
      </form>
      <form action="/fluid/">
        <button type="submit" class="content-btn">Fluid Simulation</button>
      </form>
    </div>
  </div>
</div>

<script>

  function refresh(){
    window.location.reload(true);
  }

</script>

</body>
</html>