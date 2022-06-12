<?php

namespace AdminController;

use App\Entity\Emploi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmploiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emploi::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
