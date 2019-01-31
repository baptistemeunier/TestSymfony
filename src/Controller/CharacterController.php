<?php

namespace App\Controller;

use App\Entity\Character;
use App\Form\CharacterType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CharacterController extends AbstractController
{
    /**
     * @Route("/characters", name="characters")
     */
    public function index()
    {
        // TODO
        die();
    }

    /**
     * @Route("/character/create", name="character_create")
     */
    public function create(Request $request)
    {
        $character = new Character();
        $form = $this->createForm(CharacterType::class, $character)
        ->add('save', SubmitType::class, ['label' => 'Ajouter le personnage']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $character = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($character);
            $em->flush();
            return $this->redirectToRoute('films');
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
