<?php

namespace AbonnementBundle\Controller;

use AbonnementBundle\Entity\Abonnement;
use AbonnementBundle\Form\AbonnementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AbonnementCrudController extends Controller
{
    public function readAction()
    {
        $user = $this->getUser();
        if($user!= null)
        {
            //yhezek normal
            $abonnement=$this->getDoctrine()->getRepository(Abonnement::class)->findAll();
            return $this->render('@Abonnement/Abonnement/read.html.twig', array('abonnement'=>$abonnement
            ));
        }
        else{
            return $this->redirectToRoute('abonnement_homepage'); }
     }

    public function search_ModeAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $modePaiement=$request->get('modePaiement');
            $abonnement=$this->getDoctrine()->getRepository(Abonnement::class)->myfindall($modePaiement);

            //initialiser Serializer
            $se=new Serializer(array(new ObjectNormalizer()));
            //normaliser la liste
            $data=$se->normalize($abonnement);
            return new JsonResponse($data);
        }
        return $this->render('@Abonnement/Abonnement/search.html.twig');
    }


    public function createAction(Request $request)
    {
        $user = $this->getUser();
        if($user!= null)
        {
            //yhezek normal
            //1-form
            //1-a Objet vide
            $abonnement=new Abonnement();
            //1-b create form
            $form=$this->createForm(AbonnementType::class,$abonnement);
            //2- recuperation des données
            $form=$form->handleRequest($request);

            if ($form->isSubmitted()){
                //3-sauvegarde des donnees (utilisation de l'orm pour la cnx avec la bd)
                $em=$this->getDoctrine()->getManager();

                $em->persist($abonnement);
                $em->flush();
                return $this->redirectToRoute('read');
            }
            //1-c:envoi du formulaire
            return $this->render('@Abonnement/Abonnement/create.html.twig', array(
                'f'=>$form->createView()
            ));
        }
        else{
            return $this->redirectToRoute('abonnement_homepage');
        }
    }
    public function deleteAction($nCartemembre)
    {
        $em=$this->getDoctrine()->getManager();
        $abonnement=$em->getRepository(Abonnement::class)->find($nCartemembre);

        $em->remove($abonnement);
        $em->flush();
        return $this->redirectToRoute('read');
    }
    public function updateAction($nCartemembre,Request $request)
    {
        //1-formulaire
        //1.a Objet
        $em=$this->getDoctrine()->getManager();
        $abonnement=$em->getRepository(Abonnement::class)->find($nCartemembre);
        //1.b create form
        $form=$this->createForm(AbonnementType::class,$abonnement);
        //2
        $form=$form->handleRequest($request);
        //3
        if($form->isValid()){

            $em->flush();
            return $this->redirectToRoute('read');
        }
        //1.c
        return $this->render('@Abonnement/Abonnement/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }
}
