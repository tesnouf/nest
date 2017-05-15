<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Basic mockup of the Yard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/formatting.css">


</head>
<body>



    <header class="site-header-wrap">
    <div class="site-header">
      <h1><a class="site-logo" href="http://whistlerblackcomb.com">Daily Yard<br><span>
        <h6>
          <?php echo "Last updated: ".date("F d Y H:i:s.",filemtime("php/uploads/".$filename.""));?>
          <br>
          <?php $date = date("F d H:i"); echo "<br> Information retrieved: ".$date."<br>"; ?>
      </h6>
      </span></a></h1>


      <nav class="site-nav">
        <a href="/phonelist/index.html">Instructor Phonelist</a>
        <span> | </span>
        <a href="php/upload.php"><span class="align-right">Upload New Yard</span></a>


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
