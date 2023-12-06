<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('texte')
            ->add('datePublication', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'data' => new \DateTime('now'),
            ])
            ->add('auteur')
            ->add('image')
            ->add('categorie',
            EntityType::class,
                [
                    'class' => Categorie::class,
                    'choice_label' => 'titre',
                    'expanded' => false,
                    'multiple' => false,
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
