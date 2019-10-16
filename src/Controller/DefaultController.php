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

//this is a test pull request.
class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService $gifts)
    {

        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository(Pdf::class)->findAll();
        dump($items);
        $items2 = $em->getRepository(Video::class)->findAll();
        dump($items2);
        $items3 = $em->getRepository(File::class)->findAll();
        dump($items3);
        // $author = $em->getRepository(Author::class)->find(2);
        // dump($author);
        
        // foreach ($author->getFiles() as $file) {
        //     if ($file instanceof Pdf) {
        //         dump($file->getFileName());
        //     }
        // }
        
        $author2 = $em->getRepository(Author::class)->findByIdWithPdf(2);
        dump($author2);
        
        

        // $user = new User();
        // $user->setName('Robert');
        // for ($i = 0; $i <= 3; $i++) {
        //     $video = new Video();
        //     $video->setTitle('Video title - ' . $i);
        //     $user->addVideo($video);
        //     $em->persist($video);
        // }
        // $em->persist($user); aa
        // $em->flush();
        // $user = $em->getRepository(User::class)->find(5);

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
