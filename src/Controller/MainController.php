<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Entity\Auteur;
use App\Entity\Commentaire;
use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(EntityManagerInterface $entity): Response
    {
        
        $commentaire=$entity->getRepository(Commentaire::class)->findBy([], ["date"=>"ASC"],5);
        $livre=$entity->getRepository(Livre::class)->findBy([], ["anné_publication"=>"ASC"],12);
        $auteur=$entity->getRepository(Auteur::class)->findAll();
        $actu= $entity->getRepository(Actu::class)->findAll();
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'actu' => $actu,
            'auteur' => $auteur,
            'commentaire' => $commentaire,
            'livre' => $livre,
        ]);
    }
}
