<?php

/**
 * Making a Class to be able to make a router with 
 * Method && URI
 */

class Router
{
  protected $routes = [];

  public function registerRoute($method, $uri, $controller)
  {
    // $this->routes[] =>> This means "push to the array" 
    $this->routes[] = [
      "method" => $method,
      "uri" => $uri,
      "controller" => $controller
    ];
  }

  /**
   * Load error page
   * With special http_code
   */
  public function error($httpCode = 404)
  {
    http_response_code($httpCode);
    loadView("error/{$httpCode}");
    exit;
  }




  /**
   * Add a GET route
   * The concept =>> "If the client visit a specific url, navigate him to this controller"
   */
  public function get($uri, $controller)
  {
    $this->registerRoute('GET', $uri, $controller);
  }

  /**
   * Add a POST route
   * The concept =>> "If the client visit a specific url, navigate him to this controller"
   */

  public function post($uri, $controller)
  {
    $this->registerRoute('POST', $uri, $controller);
  }

  /**
   * Add a PUT route
   * The concept =>> "If the client visit a specific url, navigate him to this controller"
   */
  public function put($uri, $controller)
  {
    $this->registerRoute('PUT', $uri, $controller);
  }

  /**
   * Add a DELETE route
   * The concept =>> "If the client visit a specific url, navigate him to this controller"
   */

  public function delete($uri, $controller)
  {
    $this->registerRoute('DELETE', $uri, $controller);
  }

  /**
   * Handling the routers
   * Or we should call it =>> "Route the request"
   * Loop all over the routes array to check if the type request match the array and if it doesn;t!!
   */
  public function resolve($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === $method) {
        require basePath($route['controller']);
        return;
      }
    }
    $this->error(404);
  }
}
