<?php


namespace App\Controller;


use App\Entity\Post;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use App\Service\SerializerService;
use Art\CatchphraseBundle\GenerateCatchphrase;

class DefaultController extends AbstractController
{
    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index(GenerateCatchphrase $generateCatchphraseService)
    {
        $generateCatchphrase = $generateCatchphraseService->getCatchphrase();

        return $this->render('default/index.html.twig', array(
            'catchphrase' => $generateCatchphrase
        ));
    }

    /**
     * @Route("/api/users", name="users")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getUsers(EntityManagerInterface $entityManager, SerializerInterface $serializer, SerializerService $serializerService)
    {
        $repository = $entityManager->getRepository(User::class);
        $users = $repository->findAll();

        $userArray = $serializerService->serialize($users, 'json');

        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent($userArray);

        return $response;
    }

    /**
     * @Route("/api/posts", name="posts")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getPosts(EntityManagerInterface $entityManager, SerializerInterface $serializer, SerializerService $serializerService)
    {
        $repository = $entityManager->getRepository(Post::class);
        $posts = $repository->findAll();

        $postArray = $serializerService->serialize($posts, 'json');

        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent($postArray);

        return $response;
    }

}