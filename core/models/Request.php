<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 6:50 PM
 * Description: Request class for accessing URI elements to route requests
 */

namespace App\Core;

class Request
{
    private $uri;
    private $method;
    private $query;

    // Static class, empty contructor to avoid instantiation
    public function __construct()
    {
        $this->setPath();
        $this->setMethod();
        $this->setQuery();
    }

    public function setPath()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    public function getPath()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery()
    {
        $this->query = htmlspecialchars($_SERVER['QUERY_STRING']);
    }

}