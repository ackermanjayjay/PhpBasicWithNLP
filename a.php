<!doctype html>
<html lang="en">
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;

$vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());


?>

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
        <input type="submit" class="btn btn-primary" value="Submit">
      </div>
    </form>
  </div>
  <div class="mt-5 mb-5 container">
    <?php
    // Check if form data was submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      // Retrieve and sanitize the form data
      $name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "";
      $name_to_array = explode(" ", strtolower($name));
      $vectorizer->fit($name_to_array);
      $vectorizer->transform($name_to_array);

      // Display the submitted data
      //  print_r($name);
      print("<pre>" . print_r($vectorizer->getVocabulary(), true) . "</pre>");
      print("<pre>" . print_r($name, true) . "</pre>");
      print("<pre>" . print_r($name_to_array, true) . "</pre>");
    }
    ?>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>