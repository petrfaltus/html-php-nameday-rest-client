<?php

error_reporting(E_ALL);

// constants
const PATH_TO_CLASSES = ".class";

// user classes autoloading
spl_autoload_register(function($class_name)
{
  $class_source_file_path = PATH_TO_CLASSES."/".$class_name.".php";
  require_once $class_source_file_path;
});

// initial values
$error_message = "";
$query_value = "";
$result_value = "";

// request processing
if (isset($_GET["query"]))
{
  $query = trim($_GET["query"]);
  if ($query != "")
  {
    // searching
    $result = tSearch::run($query);
	if ($result != null)
	{
      $result_value = $result;
	}
	else
	{
      $query_value = $query; // query string back to the input field
	  $error_message = tSearch::getLastError();
	}
  }
  else
  {
    $error_message = "The name or date cannot be empty";
  }
}

?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>Name day REST client :: Petr Faltus</title>
<meta name='author' content='Petr Faltus'>
<link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<h1>Name day REST client</h1>
<form action='<?php echo $_SERVER["REQUEST_URI"]; ?>' method='get'>
Name or date:
<input type='text' name='query' value='<?php echo $query_value; ?>' size='40' maxlength='50' placeholder='Name or date'>
<button type='submit'>Search</button>
<?php

if ($error_message != "")
{
  echo "<p>".PHP_EOL;
  echo "<b class='error'>".$error_message."</b>".PHP_EOL;
}

?>
<p>
<textarea cols='55' rows='45' readonly='readonly' disabled='disabled'><?php echo $result_value; ?></textarea>
</form>
</body>
</html>
