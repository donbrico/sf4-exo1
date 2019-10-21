<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends AbstractController
{
    /**
     * @return Response
     */
    public function index()
    {
        return $this->render('blog/index.html.twig');
    }

    /**
     * @return Response
     */
    public function add()
    {
        return new Response('<h1>Ajouter un article</h1>');
    }

    /**
     * @param $url
     * @return Response
     */
    public function show($url)
    {
        return $this->render('blog/show.html.twig', [
           'slug' => $url
        ]);
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