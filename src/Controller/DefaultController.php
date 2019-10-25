<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Author;
use App\Entity\Pdf;
use App\Entity\Video;
use App\Entity\File;
use App\Services\ServiceInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;

//this is a test pull request.
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(ServiceInterface $service)
    {
        return $this->render('default/index.html.twig', []);
    }

    public function mostPopularPOsts($number = 3)
    {
        $posts = ["post1", "post2", "post3", "post4"];

        return $this->render('default/most_popular_posts.html.twig', ["posts" => $posts]);
    }
}
