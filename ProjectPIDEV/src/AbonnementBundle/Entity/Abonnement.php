<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity
 */
class Abonnement
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="N_carteMembre", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nCartemembre;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     *
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;


    /**
     * @var string
     *
     * @ORM\Column(name="duree_abonnement", type="string", length=255, nullable=false)
     */
    private $dureeAbonnement;

    /**
     * @var string
     *
     * @ORM\Column(name="pack", type="string", length=255, nullable=false)
     */
    private $pack;

    /**
     * @var string
     *
     * @ORM\Column(name="mode_paiement", type="string", length=255, nullable=false)
     */
    private $modePaiement;

    /**
     * @var integer
     *
     * @ORM\Column(name="validite", type="integer", nullable=false)
     */
    private $validite;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Abonnement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Abonnement
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nCartemembre
     *
     * @param integer $nCartemembre
     *
     * @return Abonnement
     */
    public function setNCartemembre($nCartemembre)
    {
        $this->nCartemembre = $nCartemembre;

        return $this;
    }

    /**
     * Get nCartemembre
     *
     * @return integer
     */
    public function getNCartemembre()
    {
        return $this->nCartemembre;
    }

    /**
     * Set dureeAbonnement
     *
     * @param string $dureeAbonnement
     *
     * @return Abonnement
     */
    public function setDureeAbonnement($dureeAbonnement)
    {
        $this->dureeAbonnement = $dureeAbonnement;

        return $this;
    }

    /**
     * Get dureeAbonnement
     *
     * @return string
     */
    public function getDureeAbonnement()
    {
        return $this->dureeAbonnement;
    }

    /**
     * Set pack
     *
     * @param string $pack
     *
     * @return Abonnement
     */
    public function setPack($pack)
    {
        $this->pack = $pack;

        return $this;
    }

    /**
     * Get pack
     *
     * @return string
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * Set modePaiement
     *
     * @param string $modePaiement
     *
     * @return Abonnement
     */
    public function setModePaiement($modePaiement)
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    /**
     * Get modePaiement
     *
     * @return string
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }

    /**
     * Set validite
     *
     * @param integer $validite
     *
     * @return Abonnement
     */
    public function setValidite($validite)
    {
        $this->validite = $validite;

        return $this;
    }

    /**
     * Get validite
     *
     * @return integer
     */
    public function getValidite()
    {
        return $this->validite;
    }
}
