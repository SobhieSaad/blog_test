<?php
namespace BlogPHP;
use BlogPHP\App;
define('ROOT_PATH', __DIR__ . '/');
define('ROOT_HOME', str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');

if (empty($_SESSION)) {
    session_start();
}

require ROOT_PATH . 'app/Autoloader.php';
app\autoLoader::init(); 
if(!empty($_GET['p'])) {
	$controller = $_GET['p'];
} else {
	$controller = 'blogController';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  
  <div class="row ml-3">
      <a href=""><img src="" alt="logo" width="40px" height="40px"></a>
  </div>
  <hr />
  <div class="row ml-3">
      <a href="" class="">Ubersitcht</a>
      <!-- <--?php if ($this->isLoggedIn) : ?> -->
      <a href="" class="ml-3">Neuer Eintrag</a>
      <!-- <--?php endif; ?> -->

      <a href="" class="ml-3">Impressum</a>

      <a href="" class="ml-3 float-right">Login</a>

  </div>
  <hr/>
	</body>
</html>