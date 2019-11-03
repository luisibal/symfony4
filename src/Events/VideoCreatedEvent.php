<?php

namespace App\Events;

use Symfony\Component\EventDispatcher\Event;

class VideoCreatedEvent extends Event
{

    public function __construct($video)
    {
        $this->video = $video;
    }
}
