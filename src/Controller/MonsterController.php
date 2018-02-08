<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MonsterController extends Controller
{
    /**
     * @Route("/monster", name="monster")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $monsterCollection = $em->getRepository("App:Monster")->findAll();
        //

        return $this->render('monster/index.html.twig', ["Monsters"=>$monsterCollection]);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @Route("/monster/{id}", name="monster_show")
     */
    public function show($id)
    {
        $em = $this->getDoctrine()->getManager();
        $monsterDetails = $em->getRepository("App:Monster")->find($id);

        return $this->render('monster/show.html.twig', ['monster' => $monsterDetails]);
    }
}

