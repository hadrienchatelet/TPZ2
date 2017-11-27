<?php

namespace App\Form;

use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ItemType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Item::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("name")
            ->add("typeItem", ChoiceType::class, array(
                'choices' => array(
                    'Bouclier' => 'shield',
                    'Armes' => 'weapon',
                    'Santé' => 'health',
                )
            ))
            ->add("save", SubmitType::class, array("label"=>"Créer"));
    }
}