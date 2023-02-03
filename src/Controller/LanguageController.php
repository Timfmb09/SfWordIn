<?php

namespace App\Controller;

use App\Entity\Language;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LanguageController extends AbstractController
{
    #[Route('/language', name: 'app_language')]
    public function index(ManagerRegistry $doctrine): Response

    {   //Récupère les langues de la base de données
        $languages = $doctrine->getRepository(Language::class)->findBy([ ], ['nameLanguage' => 'asc']);
        return $this->render('language/index.html.twig', [
            'languages' => $languages
        ]);
    }

    #[Route('/language/{id}', name: 'show_language')]
    public function show(Language $language): Response

    { 
        return $this->render('language/show.html.twig', [
            'language' => $language
        ]);
    }

}
