<?php

namespace AbonnementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamations
 *
 * @ORM\Table(name="reclamations")
 * @ORM\Entity
 */
class Reclamations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="objet_rec", type="string", length=500, nullable=false)
     */
    private $objetRec;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=250, nullable=false)
     */
    private $nomUser;


}

