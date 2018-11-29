<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_351268BBA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class Abonnement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="N_carteMembre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nCartemembre;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * Get nom
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set prix
     *
     * @param int $prix
     *
     * @return Abonnement
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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
     * Set user
     *
     * @param \AbonnementBundle\Entity\User $user
     * @return Abonnement
     */
    public function setUser(\AbonnementBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
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

}
