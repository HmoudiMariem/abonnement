<?php

namespace AbonnementBundle\Controller;

use AbonnementBundle\Entity\Abonnementextra;
use AbonnementBundle\Form\AbonnementextraType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;


class AbonnementExtraCrudController extends Controller
{
    public function readAction()
    {
        $user = $this->getUser();

        if($user!= null)
        {
            //yhezek normal
            $abonnementextra=$this->getDoctrine()->getRepository(Abonnementextra::class)->findAll();
            return $this->render('@Abonnement/AbonnementExtra/read.html.twig', array('abonnementextra'=>$abonnementextra
            ));
        }
        else{
            return $this->redirectToRoute('abonnement_homepage'); }

    }
    public function createAction(Request $request)
    {   $user = $this->getUser();

        if($user!= null)
        {
            //yhezek normal
            //1-form
            //1-a Objet vide
            $abonnementextra=new Abonnementextra();
            //1-b create form
            $form=$this->createForm(AbonnementextraType::class,$abonnementextra);
            //2- recuperation des données
            $form=$form->handleRequest($request);
            if ($form->isValid()){
                //3-sauvegarde des donnees (utilisation de l'orm pour la cnx avec la bd)
                $em=$this->getDoctrine()->getManager();
                $em->persist($abonnementextra);
                $em->flush();
                return $this->redirectToRoute('read_e');
            }
            //1-c:envoi du formulaire
            return $this->render('@Abonnement/AbonnementExtra/create.html.twig', array('f'=>$form->createView()
            ));
        }
        else{
            return $this->redirectToRoute('abonnement_homepage'); }

    }

    public function deleteAction($nCartemembre)
    {
        $em=$this->getDoctrine()->getManager();
        $abonnementextra=$em->getRepository(Abonnementextra::class)->find($nCartemembre);
        $em->remove($abonnementextra);
        $em->flush();
        return $this->redirectToRoute('read_e');
    }

    public function updateAction($nCartemembre,Request $request)
    {
        //1-formulaire
        //1.a Objet
        $em=$this->getDoctrine()->getManager();
        $abonnementextra=$em->getRepository(Abonnementextra::class)->find($nCartemembre);

        //1.b create form
        $form=$this->createForm(AbonnementextraType::class,$abonnementextra);
        //2
        $form=$form->handleRequest($request);
        //3
        if($form->isValid()){
            $em->flush();
            return $this->redirectToRoute('read_e');

        }
        //1.c
        return $this->render('@Abonnement/AbonnementExtra/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function pdfAction()
    {
        $user = $this->getUser();
        if ($user != null) {
            //yhezek normal
            $abonnementextra = $this->getDoctrine()->getRepository(Abonnementextra::class)->findAll();
        }
        foreach ($abonnementextra as $ab) {
            $nom = $ab->getNom();
        }

        $html = $this->renderView('@Abonnement/AbonnementExtra/pdf.html.twig', array(
            "abonnementextra" => $abonnementextra,
            "nom" => $nom
            //..Send some data to your view if you need to //
        ));

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'Abonnement-'.$nom .'.pdf'
        );

    }
}
