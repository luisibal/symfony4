<?php

namespace App\Services;

use Doctrine\ORM\Event\PostFlushEventArgs;

class MyService implements ServiceInterface
{
    public function __construct()
    {
        dump("hello");
    }
}
