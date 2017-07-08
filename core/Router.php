<?php namespace Moz\Core;

class Router
{
    private $routes = [];
    private $parameters = [];
    private $request_payload;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
        $this->request_payload = $this->parse_json_payload();
    }

    private function parse_json_payload()
    {
        $data = json_decode( file_get_contents("php://input"), true );
        if( json_last_error() !== JSON_ERROR_NONE)
            die();

        return $data;
    }

    function direct()
    {
        foreach ($this->routes as $uri => $action)
        {
            if ($this->request_payload["type"] == $uri)
            {
                echo $this->callAction( ...explode("#", $this->routes[$uri]) );
                return;
            }
        }
    }

    private function callAction($controller, $action)
    {
        $controller = "\\App\\Controller\\" . ucfirst($controller);
        if( !method_exists($controller, $action) )
            die('no command');

        $result = (new $controller($this->request_payload))->$action();
        return json_encode( $result );
    }
}