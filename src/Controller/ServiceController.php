<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }
    #[Route('/showService/{name}', name: 'showservice')]
    public function showService($name): Response
    {
        // Utilisation de la variable $name pour générer le texte
        $serviceName = "Service: " . $name;

        // Renvoi d'une réponse avec le texte généré
        return $this->render('service/showService.html.twig', [
            'name' => $serviceName, // Passer la variable à la vue
        ]);
    }
    #[Route('/goto', name: 'goto')]
    public function goto(): Response
    {
        // Redirection vers la méthode index du contrôleur HomeController
        return $this->redirectToRoute('show');
    }


}
