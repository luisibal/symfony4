<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class VideoCreatedSubscriber implements EventSubscriberInterface
{
    public function onVideoCreatedEvent($event)
    {
        dump($event->video->title);
    }

    public static function getSubscribedEvents()
    {
        return [
            // 'video.created.event' => 'onVideoCreatedEvent',
            // KernelEvents::RESPONSE => [
            //     ['onKernelResponse1', 1], // to be executed first
            //     ['onKernelResponse2', 2]
            // ],
        ];
    }

    public function onKernelResponse1(FilterResponseEvent $event)
    {
        $response = new Response('dupa1');
        //$event->setResponse($response);
        dump('1');
    }

    public function onKernelResponse2(FilterResponseEvent $event)
    {
        $response = new Response('dupa2');
        //$event->setResponse($response);
        dump('2');
    }
}
