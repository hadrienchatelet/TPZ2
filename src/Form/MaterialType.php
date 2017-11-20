<?php

namespace App\Form;

use App\Entity\Material;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MaterialType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Material::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("name", TextType::class)
            ->add("weight", IntegerType::class)
            ->add("save", SubmitType::class, array("label"=>"Créer"));
    }
}