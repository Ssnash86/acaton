<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuteursController extends AbstractController
{
    #[Route('/auteurs', name: 'app_auteurs')]
    public function index(Request $request, PaginatorInterface $paginator, EntityManagerInterface $entity)
    {
        $donnees = $entity->getRepository(Auteur::class)->findBy([],['nom' => 'desc']);
        $auteur = $paginator->paginate(
            $donnees, 
            $request->query->getInt('page', 1), 
            12
        );
        return $this->render('auteurs/auteurs.html.twig', [
            'controller_name' => 'AuteursController',
            'auteur'=> $auteur,
        ]);
    }
    #[Route('/auteurs/desc/{id}', name: 'app_auteurs_desc')]
    public function auteurs($id, EntityManagerInterface $entity ,Request $request, PaginatorInterface $paginator,): Response
    {
        $donnees = $entity->getRepository(Livre::class)->findBy([],['titre' => 'desc']);
        $livre_pag = $paginator->paginate(
            $donnees, 
            $request->query->getInt('page', 1), 
            12
        );
            $livre=$entity->getRepository(Livre::class)->findby(['auteur' =>$id]);
            $auteur_desc = $entity->getRepository(Auteur::class)->findOneBy(['id'=>$id]);
            $auteur = $entity->getRepository(Auteur::class)->findBy(["id" => $id]);
            
        return $this->render('auteurs/auteurs_desc.html.twig', [
            'controller_name' => 'FormationController',
            'auteur_desc' => $auteur_desc,
            'auteur'=> $auteur,
            'livre'=> $livre,
            'livre_pag' => $livre_pag

            
        ]);
    }

}
