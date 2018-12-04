<?php

namespace AbonnementBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonnementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prenom')
          //  ->add('nCartemembre')
            ->add('dureeAbonnement', ChoiceType::class, array(
                'choices' => array(
                    '3 mois' => '3 mois',
                    '6 mois' => '6 mois',
                    '1 an' => '1 an',
                ),
              'attr' => array(
                  'style' => 'width: 179px; height: 30px; ; border: 2px solid #000'
              )
          ))
            ->add('pack',ChoiceType::class, array(
                'choices' => array(
                    'Unique' => 'Unique',
                    'Couple' => 'Couple',
                    'Famille' => 'Famille',
                ),
                'attr' => array(
                    'style' => 'width: 179px; height: 30px; border: 2px solid #000'
                )))
            ->add('modePaiement', ChoiceType::class, array(
                'choices' => array(
                    'Par chèque' => 'Par chèque',
                    'Espèces' => 'Espèces',
                ),
                'attr' => array(
                    'style' => 'width: 179px; height: 30px; border: 2px solid #000'
                )))
            ->add('validite')
            ->add('user',EntityType::class, array(
                'class' => 'AbonnementBundle\Entity\User',
                'choice_label' => 'id',
                'multiple' => false)

            )
            ->add('prix' , NumberType::class, array(
                'attr'=> array(
                    'style' => 'display: none'
                )
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AbonnementBundle\Entity\Abonnement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'abonnementbundle_abonnement';
    }


}
