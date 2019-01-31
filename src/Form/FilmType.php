<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Character;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => "Titre du film"
            ])
            ->add('abstract', null, [
                'label' => "Description/accroche du film"
            ])
            ->add('date', DateType::class, [
                'years' => $this->buildYearChoices(),
                'label' => "Date de sortie du film"
            ])
            ->add('characters', EntityType::class, [
                'class' => Character::class,
                'choice_label' => 'name',
                'label' => "Liste des personages du film",
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }

    private function buildYearChoices() {
        $yearsBefore = date('Y', mktime(0, 0, 0, date("m"), date("d"), 1900));
        $yearsAfter = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") + 10));
        return array_combine(range($yearsBefore, $yearsAfter), range($yearsBefore, $yearsAfter));
    }
}
