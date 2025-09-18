<?php

namespace App\Form\Member;

use App\Entity\Member\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('accept', CheckboxType::class, [
                'mapped' => false,
                'label' => 'J\'ai lu et j\'accepte le règlement',
                'required' => true,
                'constraints' => [
                    new Assert\IsTrue(message: 'Vous devez lire et accepter le règlement.'),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Request::class,
        ]);
    }
}
