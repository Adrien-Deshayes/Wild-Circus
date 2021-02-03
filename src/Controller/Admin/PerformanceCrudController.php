<?php

namespace App\Controller\Admin;

use App\Entity\Performance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PerformanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Performance::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextareaField::new('description', 'Contenu'),
            ImageField::new('image')->setBasePath('/uploads/performances')->hideOnForm(),
            TextField::new('imageFile')->setFormType(VichImageType::class),
        ];
    }
    
}
