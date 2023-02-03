<?php

namespace App\Controller;

use App\Entity\Place;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlaceController extends AbstractController
{
    #[Route('/place', name: 'app_place')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //Récupère les lieux de la base de données
        $places= $doctrine->getRepository(Place::class)->findBy([ ], ['namePlace' => 'asc']);
        return $this->render('place/index.html.twig', [
            'places' => $places,
        ]);
    }

    #[Route('/place/{id}', name: 'show_place')]
    public function show(Place $place): Response
    {
    
        return $this->render('place/show.html.twig', [
            'place' => $place,
        ]);
    }


}
