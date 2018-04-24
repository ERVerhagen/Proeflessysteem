<?php

namespace ProeflesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class inschrijvingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('email')
            ->add('telefoon')
            ->add('via')
            ->add('gebeld')
            ->add('bevestigd')
            ->add('aanwezig')
            ->add('ingeschreven')
            ->add('afgezegd')
            ->add('sms')
            ->add('ipAdres')
            ->add('apparaat')
            ->add('browser')
            ->add('lesNr')
            ->add('actief');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProeflesBundle\Entity\inschrijving'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'proeflesbundle_inschrijving';
    }


}
