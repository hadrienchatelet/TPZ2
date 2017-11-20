<?php

namespace App\Form;

use App\Entity\Inventory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InventoryType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Inventory::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("person")
            ->add("numberOfItem")
            ->add("material")
            ->add("save", SubmitType::class, array("label"=>"Créer"));
    }
}