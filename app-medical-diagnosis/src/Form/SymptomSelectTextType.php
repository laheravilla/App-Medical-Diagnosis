<?php


namespace App\Form;


use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;

class SymptomSelectTextType extends AbstractType
{
    public function getParent()
    {
        return TextType::class;
    }
}