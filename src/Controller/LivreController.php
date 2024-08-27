<?php

namespace App\Controller;

use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LivreController extends AbstractController
{
    #[Route('/livre', name: 'app_livre')]
    public function index(Request $request, PaginatorInterface $paginator, EntityManagerInterface $entity)
    {
        $donnees = $entity->getRepository(Livre::class)->findBy([],['anné_publication' => 'desc']);
        $livre = $paginator->paginate(
            $donnees, 
            $request->query->getInt('page', 1), 
            12
        );
        return $this->render('livre/catalogue.html.twig', [
            'controller_name' => 'LivreController',
            'livre' => $livre
        ]);
    }
}
    