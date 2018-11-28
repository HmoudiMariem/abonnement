<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_horaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHoraire;

    /**
     * @var string
     *
     * @ORM\Column(name="type_seance", type="string", length=20, nullable=false)
     */
    private $typeSeance;

    /**
     * @var string
     *
     * @ORM\Column(name="date_travail", type="string", length=20, nullable=false)
     */
    private $dateTravail;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_debut", type="string", length=11, nullable=false)
     */
    private $heureDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_fin", type="string", length=11, nullable=false)
     */
    private $heureFin;

    /**
     * @var string
     *
     * @ORM\Column(name="coach", type="string", length=20, nullable=false)
     */
    private $coach;


}

