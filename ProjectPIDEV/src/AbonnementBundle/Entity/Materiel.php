<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiel
 *
 * @ORM\Table(name="materiel", uniqueConstraints={@ORM\UniqueConstraint(name="nbr_materiel", columns={"nbr_materiel"})}, indexes={@ORM\Index(name="id_salle", columns={"id_salle"}), @ORM\Index(name="id_stock", columns={"id_stock"})})
 * @ORM\Entity
 */
class Materiel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_materiel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMateriel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_materiel", type="string", length=255, nullable=false)
     */
    private $nomMateriel;

    /**
     * @var string
     *
     * @ORM\Column(name="image_materiel", type="string", length=225, nullable=false)
     */
    private $imageMateriel;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_materiel", type="integer", nullable=false)
     */
    private $nbrMateriel;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat_location", type="integer", nullable=false)
     */
    private $etatLocation;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_location", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut_location", type="string", length=225, nullable=false)
     */
    private $dateDebutLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_location", type="string", length=225, nullable=false)
     */
    private $dateFinLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_stock", type="string", length=225, nullable=false)
     */
    private $nomStock;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_salle", type="string", length=225, nullable=false)
     */
    private $nomSalle;

    /**
     * @var \Salle
     *
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salle", referencedColumnName="id_salle")
     * })
     */
    private $idSalle;

    /**
     * @var \Stock
     *
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_stock", referencedColumnName="id_stock")
     * })
     */
    private $idStock;


}

