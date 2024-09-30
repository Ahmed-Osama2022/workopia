<?php

// Get the base path
function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}


/**
 * Load a view
 */

function loadView($name)
{
  $viewPath =  basePath("views/{$name}.view.php");

  // inspect($viewPath);
  if (file_exists($viewPath)) {
    require $viewPath;
  } else {
    echo "View {$name} not Found!";
  }
}

/**
 * Load a Partial
 */

function loadPartial($name)
{

  $partialPath =  basePath("views/partials/{$name}.php");

  if (file_exists($partialPath)) {
    require $partialPath;
  } else {
    echo "Partial {$name} not Found!";
  }
}

/**
 * Inspect a value
 * To check your code while you're working...
 */

function inspect($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
}
/**
 * Inspect a value and kill the whole code after it
 * To check your code while you're working...
 */

function inspectAndDie($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}
