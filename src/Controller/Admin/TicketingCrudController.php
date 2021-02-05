<?php

namespace App\Controller\Admin;

use App\Entity\Ticketing;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TicketingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ticketing::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextareaField::new('description', 'Contenu'),
            IntegerField::new('price', 'Prix'),
            IntegerField::new('quantity', 'Quantités'),
            ImageField::new('image')->setBasePath('/uploads/ticketings')->hideOnForm(),
            TextField::new('imageFile')->setFormType(VichImageType::class),
            
        ];
    }
    
}
