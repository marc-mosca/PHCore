<?php

namespace App\Http;

/**
 * Base controller class providing common response methods.
 *
 * All controllers in the application should extend this abstract class to benefit from utilities such as rendering HTML
 * views or returning JSON responses.
 */
abstract class AbstractController
{

    /**
     * Renders an HTML view and returns a `Response` object.
     *
     * The method extracts the given parameters into the local scope, includes the specified view file,
     * wraps it in a base template, and sends the response.
     *
     * @param string $view The name of the view file to render (relative to the templates directory).
     * @param array $params An associative array of variables to extract into the view.
     *
     * @return Response The generated and sent HTML response.
     */
    public function render(string $view, array $params = []): Response
    {
        extract($params, EXTR_SKIP);

        ob_start();
        require BASE_PATH . "/templates/$view";
        $content = ob_get_clean();

        ob_start();
        require BASE_PATH . "/templates/base.view.php";
        $html = ob_get_clean();

        $response = new Response($html, 200, ["Content-Type" => "text/html; charset=UTF-8"]);
        $response->send();
        return $response;
    }

    /**
     * Returns a JSON response with the given data and status code.
     *
     * The method encodes the data as JSON with Unicode support and pretty print, sets the appropriate Content-Type
     * header, and sends the response.
     *
     * @param array $data The data to encode into JSON.
     * @param int $status The HTTP status code for the response (default: 200).
     *
     * @return Response The generated and sent JSON response.
     */
    public function json(array $data, int $status = 200): Response
    {
        $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $response = new Response($json, $status, ["Content-Type" => "application/json"]);
        $response->send();
        return $response;
    }

}
