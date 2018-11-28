<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle", uniqueConstraints={@ORM\UniqueConstraint(name="nbr_salle", columns={"nbr_salle"})}, indexes={@ORM\Index(name="id_centre", columns={"id_centre"})})
 * @ORM\Entity
 */
class Salle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_salle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_salle", type="string", length=255, nullable=false)
     */
    private $nomSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=false)
     */
    private $role;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_salle", type="integer", nullable=false)
     */
    private $nbrSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_centre", type="string", length=255, nullable=false)
     */
    private $nomCentre;

    /**
     * @var \Centre
     *
     * @ORM\ManyToOne(targetEntity="Centre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_centre", referencedColumnName="id_centre")
     * })
     */
    private $idCentre;


}

