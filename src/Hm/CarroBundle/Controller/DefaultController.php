<?php

namespace Hm\CarroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hm\CarroBundle\Entity\Carro;
use Hm\CarroBundle\Form\CarroType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {
	//Teste Git
        //Teste Git2
    public function indexAction() {
        return $this->render('HmCarroBundle:Default:index.html.twig');
    }

    public function addAction() {

        $carro = new Carro();
        $form = $this->createCreateForm($carro);

        return $this->render('HmCarroBundle:Default:form_add.html.twig', array('form' => $form->createView()));
    }

    private function createCreateForm(Carro $carro) {
        $form = $this->createForm(CarroType::class, $carro, array('action' => $this->generateUrl('hm_carro_salvar'), 'method' => "POST"));
        return $form;
    }

    public function salvarAction(Request $request) {
        $carro = new Carro();
        $form = $this->createCreateForm($carro);
        $form->handleRequest($request);


        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carro);
            $em->flush();

            return $this->redirectToRoute('hm_carro_homepage');
        //} else {



        //    return $this->addAction();
        //}
    }

}
