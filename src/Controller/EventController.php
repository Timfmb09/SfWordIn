<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //Récupère les évènements de la base de données
        $events= $doctrine->getRepository(Event::class)->findAll();
        return $this->render('event/index.html.twig', [
            'events' => $events
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
