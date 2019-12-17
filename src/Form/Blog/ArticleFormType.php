<?php
namespace App\Form\Blog;

use App\Entity\Article;
use App\Entity\Auteur;
use phpDocumentor\Reflection\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType

{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class,
                [
                    'required' => true
                ])
            ->add('content', TextareaType::class,
                [
                    'required' => true,
                ])
            ->add('date', DateType::class)
            ->add('auteur', EntityType::class,[
                'class' => Auteur::class,
                'choice_label' => function($auteur){
                return $auteur->getFirstname()." ".$auteur->getLastname();}
    ])

            ->add('valider', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class
        ]);
    }
}
