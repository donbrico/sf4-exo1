<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Article;
use App\Repository\ArticleRepository;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends AbstractController
{

    /**
     * @return Response
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => "BlogController",
            'articles' => $articles,
        ]);
    }

    /**
     * @return Response
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('blog/home.html.twig', [
            'title' => "Bienvenue ici les amis !",
            'age' => 47
        ]);
    }

    /**
     * @param $url
     * @return Response
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article)
    {

        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);
    }


    /**
     * @return Response
     */
    public function add()
    {
        return new Response('<h1>Ajouter un article</h1>');
    }



    /**
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        return new Response('<h1>Modifier l\'article ' .$id. '</h1>');
    }

    /**
     * @param $id
     * @return Response
     */
    public function remove($id)
    {
        return new Response('<h1>Supprimer l\'article ' .$id. '</h1>');
    }
}