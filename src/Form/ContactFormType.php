<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', null, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Firstname']
            ])
        ->add('lastname', null, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Lastname']
            ])
        ->add('email', null, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Email']
            ])
        ->add('message', null, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Message']
            ])
        ->add('subject', null, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Subject']
            ])
    ;
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
