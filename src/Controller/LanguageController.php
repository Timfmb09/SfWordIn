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
        $languages = $doctrine->getRepository(Language::class)->findAll();
        return $this->render('language/index.html.twig', [
            'languages' => $languages
        ]);
    }
}
