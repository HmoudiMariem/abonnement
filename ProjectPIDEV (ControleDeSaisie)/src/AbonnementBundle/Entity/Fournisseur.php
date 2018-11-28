<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur", uniqueConstraints={@ORM\UniqueConstraint(name="tel", columns={"tel"})})
 * @ORM\Entity
 */
class Fournisseur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fournisseur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_fournisseur", type="string", length=255, nullable=false)
     */
    private $nomFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_fournisseur", type="string", length=255, nullable=false)
     */
    private $prenomFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;


}

