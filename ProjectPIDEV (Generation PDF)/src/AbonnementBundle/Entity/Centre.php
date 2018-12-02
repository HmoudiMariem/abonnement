<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centre
 *
 * @ORM\Table(name="centre", uniqueConstraints={@ORM\UniqueConstraint(name="nbr_centre", columns={"nbr_centre"})})
 * @ORM\Entity
 */
class Centre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_centre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCentre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="local", type="string", length=255, nullable=false)
     */
    private $local;

    /**
     * @var string
     *
     * @ORM\Column(name="proprietaire", type="string", length=255, nullable=false)
     */
    private $proprietaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_centre", type="integer", nullable=false)
     */
    private $nbrCentre;


}

