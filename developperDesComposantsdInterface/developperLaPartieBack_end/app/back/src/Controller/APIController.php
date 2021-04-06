<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class APIController extends AbstractController
{
    /**
     * @Route("/article/liste", name="liste", methods={"GET"})
     */
    public function liste(ArticleRepository $articlesRepo)
    {
        // On récupère la liste des articles
        $articles = $articlesRepo->apiFindAll();

        // On spécifie qu'on utilise l'encodeur JSON
        $encoders = [new JsonEncoder()];

        // On instancie le "normaliseur" pour convertir la collection en tableau
        $normalizers = [new ObjectNormalizer()];

        // On instancie le convertisseur
        $serializer = new Serializer($normalizers, $encoders);

        // On convertit en json
        $jsonContent = $serializer->serialize($articles, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // On instancie la réponse
        $response = new Response($jsonContent);

        // On ajoute l'entête HTTP
        $response->headers->set('Content-Type', 'application/json');

        // On envoie la réponse
        return $response;
    }

    /**
     * @Route("/article/lire/{id}", name="article", methods={"GET"})
     */
    public function getArticle(Article $article)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($article, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/article/ajout", name="ajout", methods={"POST"})
     */
    public function addArticle(Request $request)
    {

        $article = new Article();

        // On décode les données envoyées
        $donnees = json_decode($request->getContent());

        // On hydrate l'objet
        $article->setId($donnees->id);
        $article->setDescription($donnees->description);

        // On sauvegarde en base
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        // On retourne la confirmation
        return new Response('ok', 201);

    }

    /**
     * @Route("/article/editer/{id}", name="edit", methods={"POST"})
     */
    public function editArticle(?Article $article, Request $request)
    {


        // On décode les données envoyées
        $donnees = json_decode($request->getContent());

        // On initialise le code de réponse
        $code = 200;

        // Si l'article n'est pas trouvé
        if (!$article) {
            // On instancie un nouvel article
            $article = new Article();
            // On change le code de réponse
            $code = 201;
        }

        // On hydrate l'objet
        $article->setId($donnees->id);
        $article->setDescription($donnees->description);


        // On sauvegarde en base
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        // On retourne la confirmation
        return new Response('ok', $code);
    }

    /**
     * @Route("/article/supprimer/{id}", name="supprime", methods={"DELETE"})
     */
    public function removeArticle(Article $article)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        return new Response('ok');
    }

}