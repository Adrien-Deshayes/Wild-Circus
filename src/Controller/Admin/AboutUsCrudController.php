<?php

namespace App\Controller\Admin;

use App\Entity\AboutUs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AboutUsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutUs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('description', 'Contenu'),
            ImageField::new('image')->setBasePath('/uploads/abouts')->hideOnForm(),
            TextField::new('imageFile')->setFormType(VichImageType::class),
        ];
    }
    
}
