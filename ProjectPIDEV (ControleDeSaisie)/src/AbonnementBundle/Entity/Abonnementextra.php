<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnementextra
 *
 * @ORM\Table(name="abonnementextra")
 * @ORM\Entity
 */
class Abonnementextra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="N_carte_Membre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nCarteMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="centreInteret", type="string", length=255, nullable=false)
     */
    private $centreinteret;

    /**
     * @var string
     *
     * @ORM\Column(name="capacitePhy", type="string", length=255, nullable=false)
     */
    private $capacitephy;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


    /**
     * Get nCarteMembre
     *
     * @return integer
     */
    public function getNCarteMembre()
    {
        return $this->nCarteMembre;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Abonnementextra
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
     * @return Abonnementextra
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
     * Set dureeAbonnement
     *
     * @param string $dureeAbonnement
     *
     * @return Abonnementextra
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
     * @return Abonnementextra
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
     * @return Abonnementextra
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
     * @return Abonnementextra
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

    /**
     * Set centreinteret
     *
     * @param string $centreinteret
     *
     * @return Abonnementextra
     */
    public function setCentreinteret($centreinteret)
    {
        $this->centreinteret = $centreinteret;

        return $this;
    }

    /**
     * Get centreinteret
     *
     * @return string
     */
    public function getCentreinteret()
    {
        return $this->centreinteret;
    }

    /**
     * Set capacitephy
     *
     * @param string $capacitephy
     *
     * @return Abonnementextra
     */
    public function setCapacitephy($capacitephy)
    {
        $this->capacitephy = $capacitephy;

        return $this;
    }

    /**
     * Get capacitephy
     *
     * @return string
     */
    public function getCapacitephy()
    {
        return $this->capacitephy;
    }

    /**
     * Get user
     *
     * @return \AbonnementBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param \AbonnementBundle\Entity\User $user
     * @return Abonnementextra
     */
    public function setUser(\AbonnementBundle\Entity\User $user = null)
    {
        $this->user = $user;
    }

}
