<?php

namespace App\Services;

use App\Services\MySecondService;

trait OptionalServiceTrait
{

    private $service;

    /**
     * @required
     */
    public function setSecondService(MySecondService $second_service)
    {
        //calls MySecondService
        $this->service = $second_service;
    }
}
