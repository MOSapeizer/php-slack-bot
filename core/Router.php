<?php namespace Moz\Core;

class Router
{
    private $routes = [];
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
            if ( !$this->checkInRouter($uri) )
                continue;

            return $this->getResponse($action);
        }
    }

    private function checkInRouter($uri)
    {
        if( !isset($this->request_payload["event"]) )
            return $this->request_payload["type"] == $uri;

        $type_of_event = $this->request_payload["type"] . "/" . $this->request_payload["event"]["type"];
        return $type_of_event == $uri;
    }

    private function getResponse($action)
    {
        $action = explode("#", $action);
        echo $this->callAction( $action[0], $action[1] );
        return null;
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