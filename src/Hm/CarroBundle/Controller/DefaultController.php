<?php

namespace Hm\CarroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hm\CarroBundle\Entity\Carro;
use Hm\CarroBundle\Form\CarroType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();

        $carros = $em->getRepository("HmCarroBundle:Carro")->findAll();



        return $this->render('HmCarroBundle:Default:index.html.twig', array("carros" => $carros)
        );
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

        $carro = $form->getData();

        $em = $this->getDoctrine()->getManager();
        $em->persist($carro);
        $em->flush();
        return $this->redirectToRoute('hm_carro');
    }

    public function editarAction($id) {

        $em = $this->getDoctrine()->getManager();

        $carro = $em->getRepository("HmCarroBundle:Carro")->find($id);

        if (!$carro) {
            throw $this->createNotFoundException("Objeto carro não encontrado.");
        }


        $form = $this->createFormEdit($carro);


        return $this->render('HmCarroBundle:Default:form_edit.html.twig', array('form' => $form->createView()));
    }

    private function createFormEdit(Carro $carro) {
        $form = $this->createForm(CarroType::class, $carro, array(
            'action' => $this->generateUrl('hm_carro_salvar_up', array('id' => $carro->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));
        return $form;
    }

    
    
    public function salvarUpAction(Request $request,$id) {

        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository('HmCarroBundle:Carro')->find($id);

        // $carro = new Carro();


        $form = $this->createFormEdit($carro);

        $form->handleRequest($request);

       // $carro = $form->getData();



       // $em->persist($carro);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

}
