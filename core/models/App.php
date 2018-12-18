<?php
/**
 * Created by PhpStorm.
 * User: tom_d
 * Date: 12/12/18
 * Time: 9:55 AM
 */

namespace App\Core;

use App\Core\{Request, Response};

class App
{
    private $req;

    public function __construct($routefile)
    {
        $this->setReq();

        $this->loadRoute($routefile);

    }

    /**
     * @return mixed
     */
    public function getReq()
    {
        return $this->req;
    }

    /**
     * @param mixed $req
     */
    public function setReq()
    {
        $this->req = new Request();
    }

    public function loadRoute($routefile)
    {
        try {
            Router::load($routefile)->direct($this->req->getMethod(), $this->req->getPath());
        }
        catch (Exception $e) {
            echo json_encode($e->getTrace(), JSON_UNESCAPED_UNICODE);
        }
    }


}