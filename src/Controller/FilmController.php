<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilmController extends AbstractController
{
    /**
     * @Route("/films", name="films")
     */
    public function index()
    {
        // TODO
        die();
    }

    /**
     * @Route("/film/create", name="film_create")
     */
    public function create(Request $request)
    {
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film)
        ->add('save', SubmitType::class, ['label' => 'Ajouter le film']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $film = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();
            return $this->redirectToRoute('films');
        }

        return $this->render('film/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
