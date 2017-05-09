<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Basic mockup of the Yard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">

  
</head>
<body>


  

    <header class="site-header-wrap">
    <div class="site-header">
      <h1><a class="site-logo" href="http://whistlerblackcomb.com">Daily Yard<br><span>some text
      </span></a></h1>

      <nav class="site-nav">
        <a href="/phonelist/index.html"><span class="fa-reply"></span>Instructor Phonelist</a>
        <a href="php/upload.php"><span class="fa-eye"></span>Upload New Yard</a>

      </nav>

    </div>
  </header>

<div class="container">

<ul class="accordion">

<?php include 'php/accord.php'; ?>

</ul>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</div>
</body>
</html>
