<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\User;
use App\Entity\Video;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/home", name="default")
     */
    public function index(GiftsService $gifts)
    {

        $em = $this->getDoctrine()->getManager();

        // $user = new User();
        // $user->setName('Robert');
        // for ($i = 0; $i <= 3; $i++) {
        //     $video = new Video();
        //     $video->setTitle('Video title - ' . $i);
        //     $user->addVideo($video);
        //     $em->persist($video);
        // }
        // $em->persist($user);
        // $em->flush();
        // $user = $em->getRepository(User::class)->find(5);
        // dump($user);

        $user1 = $em->getRepository(User::class)->findWithVideos(5);
        dump($user1);


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => null,
            'random_gift' => $gifts->gifts,
        ]);
    }


    public function mostPopularPOsts($number = 3)
    {
        $posts = ["post1", "post2", "post3", "post4"];

        return $this->render('default/most_popular_posts.html.twig', ["posts" => $posts]);
    }
}
