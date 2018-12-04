<?php

namespace AbonnementBundle\Controller;

use AbonnementBundle\Entity\Abonnement;
use AbonnementBundle\Form\AbonnementType;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class AbonnementCrudController extends Controller
{
    public function readAction()
    {
        $user = $this->getUser();
        if ($user != null) {
            if ($user->getRoles()[0] == 'ROLE_ADMIN') {
                //yhezek normal
                $abonnement = $this->getDoctrine()->getRepository(Abonnement::class)->findAll();
                return $this->render('@Abonnement/Abonnement/read.html.twig', array('abonnement' => $abonnement
                ));
            } else {
                return $this->redirectToRoute('readc');
            }
        }
        else {
            return $this->redirectToRoute('abonnement_homepage');
        }
    }
     public function readcAction() {
         //yhezek normal
         $user = $this->getUser();
         if ($user != null) {
             $idUser = $this->getUser()->getId();
             $abonnement = $this->getDoctrine()->getRepository(Abonnement::class)->findOneBy(['user' => $this->getUser()]);
             //die('id: '.$abonnement->getNCartemembre());
             return $this->render('@Abonnement/Abonnement/readC.html.twig', array('abonnement' => $abonnement
             ));
         }
         else { return $this->redirectToRoute('abonnement_homepage');}
     }
    public function grapheAction()
    {
        $pieChart = new PieChart();

        $abonnement1 = $this->getDoctrine()->getRepository(Abonnement::class)->stat1();
        $abonnement2 = $this->getDoctrine()->getRepository(Abonnement::class)->stat2();
        $abonnement3 = $this->getDoctrine()->getRepository(Abonnement::class)->stat3();

        $n1 = (int)$abonnement1[0]['nm'];
        //die(' '.$n1);
        $n2 = (int)$abonnement2[0]['nm'];
        $n3 = (int)$abonnement3[0]['nm'];
        //die("n1 ".$n1." n2 ".$n2." n3 ".$n3);
        $pieChart->getData()->setArrayToDataTable(
            [['Duree', 'Abonnement'],
                ['3 mois', $n1],
                ['6 mois', $n2],
                ['1 an',   $n3]
            ]
        );
            $pieChart->getOptions()->setTitle('Pourcentages des abonnements par durée d abonnement ');
            $pieChart->getOptions()->setHeight(500);
            $pieChart->getOptions()->setWidth(900);
            $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
            $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
            $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
            $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
            $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render('@Abonnement\Abonnement\graphe.html.twig', array('piechart' => $pieChart));
    }

    public function search_ModeAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $modePaiement = $request->get('modePaiement');
            $abonnement = $this->getDoctrine()->getRepository(Abonnement::class)->myfindall($modePaiement);

            //initialiser Serializer
            $se = new Serializer(array(new ObjectNormalizer()));
            //normaliser la liste
            $data = $se->normalize($abonnement);
            return new JsonResponse($data);
        }
        return $this->render('@Abonnement/Abonnement/search.html.twig');
    }

    public function createAction(Request $request)
    {
        $user = $this->getUser();
        if ($user != null) {
            //yhezek normal
            //1-form
            //1-a Objet vide
            $abonnement = new Abonnement();
            //1-b create form
            $form = $this->createForm(AbonnementType::class, $abonnement);
            //2- recuperation des données
            $form = $form->handleRequest($request);

            if ($form->isSubmitted()) {
                //3-sauvegarde des donnees (utilisation de l'orm pour la cnx avec la bd)
                $em = $this->getDoctrine()->getManager();

                $em->persist($abonnement);
                $em->flush();
                return $this->redirectToRoute('read');
            }
            //1-c:envoi du formulaire
            return $this->render('@Abonnement/Abonnement/create.html.twig', array(
                'f' => $form->createView()
            ));
        } else {
            return $this->redirectToRoute('abonnement_homepage');
        }
    }

    public function deleteAction($nCartemembre)
    {
        $em = $this->getDoctrine()->getManager();
        $abonnement = $em->getRepository(Abonnement::class)->find($nCartemembre);

        $em->remove($abonnement);
        $em->flush();
        return $this->redirectToRoute('read');
    }

    public function updateAction($nCartemembre, Request $request)
    {
        //1-formulaire
        //1.a Objet
        $em = $this->getDoctrine()->getManager();
        $abonnement = $em->getRepository(Abonnement::class)->find($nCartemembre);
        //1.b create form
        $form = $this->createForm(AbonnementType::class, $abonnement);
        //2
        $form = $form->handleRequest($request);
        //3
        if ($form->isValid()) {

            $em->flush();
            return $this->redirectToRoute('read');
        }
        //1.c
        return $this->render('@Abonnement/Abonnement/update.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function pdfAction($nCartemembre)
    {
        $user = $this->getUser();
        if ($user != null) {
            //yhezek normal
            $abonnement = $this->getDoctrine()->getManager()->getRepository(Abonnement::class)->find($nCartemembre);
        }
            foreach ($abonnement as $ab) {
                $nom = $ab->getNom();
            }

            $html = $this->renderView('@Abonnement/Abonnement/pdf.html.twig', array(
                "abonnement" => $abonnement,
                "nom" => $nom
                //..Send some data to your view if you need to //
            ));

            return new PdfResponse(
                $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
                'Abonnement '.$nom .'.pdf'
            );

    }
}
