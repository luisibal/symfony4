<?php

namespace App\Controller;

use App\Entity\SecurityUser;
use App\Entity\Video;
// use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use App\Events\VideoCreatedEvent;
use App\Form\RegisterUserType;
use App\Form\VideoFormType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
// use App\Form\VideoFormType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



//this is a test pull request.
class DefaultController extends AbstractController
{
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        /*$em = $this->getDoctrine()->getManager();
        $video = $em->getRepository(Video::class)->find(3);
        $this->denyAccessUnlessGranted('VIDEO_DELETE', $video);

        // dump($video);

        // $users = $em->getRepository(SecurityUser::class)->findAll();
        // dump($users);

        $user = new SecurityUser();
        $form = $this->createForm(RegisterUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($passwordEncoder->encodePassword($user, $form->get('password')->getData()));
            $user->setEmail($form->get('email')->getData());
            $user->setRoles(['ROLE_ADMIN']);
            $em = $this->getDoctrine()->getManager();

            // $video = new Video();
            // $video->setTitle('video title');
            // $video->setFile('video path');
            // $video->setFilename('video 1');
            // $video->setSize(1);
            // $video->setDescription('descr');
            // $video->setFormat('mp4');
            // $video->setDuration(9);
            // $video->setCreatedAt(new \DateTime());
            // $em->persist($video);
            // $user->addVideo($video);


            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('default');
        }*/

        return $this->render('default/index.html.twig', [
            //'form' => $form->createView()
        ]);
    }

    /**
     * Login page
     *
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    public function mostPopularPOsts($number = 3)
    {
        $posts = ["post1", "post2", "post3", "post4"];

        return $this->render('default/most_popular_posts.html.twig', ["posts" => $posts]);
    }
}
