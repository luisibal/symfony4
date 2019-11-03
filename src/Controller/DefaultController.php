<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Events\VideoCreatedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Form\VideoFormType;

//this is a test pull request.
class DefaultController extends AbstractController
{
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @Route("/", name="default")
     */
    public function index(Request $request)
    {
        $video = new \stdClass();
        $video->title = 'funny movie';
        $video->category = 'funny';
        $event = new VideoCreatedEvent($video);
        $this->dispatcher->dispatch('video.created.event', $event);
        return $this->render('default/index.html.twig', []);
    }

    public function mostPopularPOsts($number = 3)
    {
        $posts = ["post1", "post2", "post3", "post4"];

        return $this->render('default/most_popular_posts.html.twig', ["posts" => $posts]);
    }
}
