<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //Récupère les évènements de la base de données
        $events= $doctrine->getRepository(Event::class)->findBy([],['nameEvent' =>'DESC'] );
        return $this->render('event/index.html.twig', [
            'events' => $events
        ]);
    }

    #[Route('/event/add', name: 'add_event')]
    public function add(ManagerRegistry $doctrine, Event $event = null, Request $request): Response
    {
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $event = $form->getData();
            $entityManager = $doctrine->getManager();
            //prepare
            $entityManager->persist($event);
            //insert into (execute)
            $entityManager->flush();

            return $this->redirectToRoute('app_event');
        }

        //Vue pour afficher le formulaire d'ajout d'un évènement
        return $this->render('event/add.html.twig', [
            'formAddEvent' => $form->createView()
        ]);

    }

    #[Route('/event/{id}', name: 'show_event')]
    public function show(Event $event): Response
    {
        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }

 
}
