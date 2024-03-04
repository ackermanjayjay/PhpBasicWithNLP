<?php
require_once('processing.php')
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar bg-body-tertiary bg-danger text-white shadow-lg rounded container mt-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="https://www.php.net/images/logos/new-php-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        PHP NLP Basic
      </a>
    </div>
  </nav>
  <div class="input-group mt-5 container mx-5 ">
    <form action="a.php" method="get">
      <div class="input-group mb-3">
        <span class="input-group-text">Words</span>
        <input type="text" class="form-control" id="name" name="name"><br>
        <input type="submit" class="btn btn-primary" value="Processing">
      </div>
    </form>
  </div>
  <div class="mt-5 mb-5 container">
    <?php

    // Check if form data was submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      // Retrieve and sanitize the form data
      $name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "";
    
      print("<pre> You Input: " . print_r($name, true) . "</pre>");

      $textProcessing = processingText($name);
      
      $name_to_array = explode(" ", $textProcessing);
      $weightText = weightedText($name_to_array);
      $vocabText = getVocabWords($name_to_array);
      print("<pre>Result Preprocessing: " . print_r($name_to_array, true) . "</pre>");
      print("<pre>Result VocabWords: " . print_r($vocabText, true) . "</pre>");
      print("<pre>Result BagOfWords: " . print_r($weightText, true) . "</pre>");
    }

    ?>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>