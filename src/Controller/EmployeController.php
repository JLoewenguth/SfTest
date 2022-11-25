<?php

namespace App\Controller;

use App\Entity\Employe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //récup les entreprises de la BDD
        $employes = $doctrine->getRepository(Employe::class)->findBy([],["nom" => "ASC"]);
        //method findBy du repository
        //(array $criteria, array $orderBy = null, $limit = null, $offset = null)
        return $this->render('employe/index.html.twig', [
            'employes' => $employes
        ]);
    }

    /**
     * @Route("/employe/{id}", name="show_employe")
     */
    public function show(Employe $employe): Response
    {
        return $this->render('employe/show.html.twig', [
            'employe' => $employe
        ]);
    }
}
