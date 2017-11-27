<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PlayerType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Player::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("name")
            ->add("save", SubmitType::class, array("label"=>"Créer"));
    }
}