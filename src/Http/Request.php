<?php

namespace App\Http;

class Request
{

    protected string $method;

    protected string $uri;

    protected string $path;

    protected array $queryParameters;

    protected array $postParameters;

    protected array $serverParameters;

    public function __construct(array $query, array $post, array $server)
    {
        $this->method = strtoupper($server["REQUEST_METHOD"]) ?? "GET";
        $this->uri = $server["REQUEST_URI"] ?? "/";
        $this->path = $this->extractPath($this->uri);
        $this->queryParameters = $query;
        $this->postParameters = $post;
        $this->serverParameters = $server;
    }

    public static function createFromGlobals(): self
    {
        return new self($_GET, $_POST, $_SERVER);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQueryParameters(): array
    {
        return $this->queryParameters;
    }

    public function getBody(): array
    {
        return $this->postParameters;
    }

    public function getServerParameters(): array
    {
        return $this->serverParameters;
    }

    protected function extractPath(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH) ?? "/";
        return rtrim($path, "/") ?: "/";
    }

}
