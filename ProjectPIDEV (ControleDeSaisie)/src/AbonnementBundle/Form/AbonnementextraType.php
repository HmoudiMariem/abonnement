<?php

namespace AbonnementBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonnementextraType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prenom')
           // ->add('nCartemembre')
            ->add('dureeAbonnement')
            ->add('pack')
            ->add('modePaiement')
            ->add('validite')
            ->add('centreinteret')
            ->add('capacitephy')
            ->add('user',EntityType::class, array(
                    'class' => 'AbonnementBundle\Entity\User',
                    'choice_label' => 'id',
                    'multiple' => false)
            );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AbonnementBundle\Entity\Abonnementextra'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'abonnementbundle_abonnementextra';
    }


}
