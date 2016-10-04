<?php

namespace Hm\CarroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hm\CarroBundle\Entity\Carro;
use Hm\CarroBundle\Form\CarroType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();

        $carros = $em->getRepository("HmCarroBundle:Carro")->findAll();

        return $this->render('HmCarroBundle:Default:index.html.twig', array("carros" => $carros)
        );
    }

    public function addAction(Request $request) {
        $carro = new Carro();
        $form = $this->createCreateForm($carro);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $carro->getImage();
            
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            
            $file->move(
                    $this->getParameter('image_directory'),
                    $fileName
                    );
            
            $carro->setImage($fileName);

            $carro = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($carro);
            $em->flush();
            return $this->redirectToRoute('hm_carro');
        }

        return $this->render('HmCarroBundle:Default:form_add.html.twig', array('form' => $form->createView()));
    }

    private function createCreateForm(Carro $carro) {
        $form = $this->createForm(CarroType::class, $carro, array('action' => $this->generateUrl('hm_carro_add'), 'method' => "POST"));
        return $form;
    }

    public function editarAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository("HmCarroBundle:Carro")->find($id);

        if (!$carro) {
            throw $this->createNotFoundException("Objeto carro não encontrado.");
        }

        $form = $this->createFormEdit($carro);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->flush();

            return $this->redirectToRoute('hm_carro');
        }


        return $this->render('HmCarroBundle:Default:form_edit.html.twig', array('form' => $form->createView(),'carro'=>$carro));
    }

    private function createFormEdit(Carro $carro) {
        $form = $this->createForm(CarroType::class, $carro, array(
            'action' => $this->generateUrl('hm_carro_editar', array('id' => $carro->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository('HmCarroBundle:Carro')->find($id);

        if (!$carro) {
            throw $this->createNotFoundException("Objeto carro não encontrado.");
        }

        $em->remove($carro);
        $em->flush();

        return $this->redirectToRoute('hm_carro');
    }

    public function visualizarAction($id) {
        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository('HmCarroBundle:Carro')->find($id);

        if (!$carro) {
            throw $this->createNotFoundException("Objeto carro não encontrado.");
        }

        return $this->render('HmCarroBundle:Default:visualizar.html.twig', array('carro' => $carro));
    }

    public function uploadAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository("HmCarroBundle:Carro")->find($id);

        if (!$carro) {
            throw $this->createNotFoundException("Objeto carro não encontrado.");
        }

        $form = $this->createFormEdit($carro);
        
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form -> isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $carro->getImage();
            
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            
            $file->move(
                    $this->getParameter('image_directory'),
                    $fileName
                    );
            
            $carro->setImage($fileName);
            $carro = $form->getData();
            $em = $this->getDoctrine()->getManager();
            
            $em->flush();

            return $this->redirectToRoute('hm_carro');
        }

        return $this->render('HmCarroBundle:Default:form_up.html.twig', array('form' => $form->createView()));
    }

}
