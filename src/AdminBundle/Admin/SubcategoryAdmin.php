<?php
/**
 * Created by PhpStorm.
 * User: datakernel
 * Date: 25/05/2016
 * Time: 20:56
 */

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Admin\Admin;


class SubcategoryAdmin extends Admin
{
    //easy function to simplify the string value when you create the object(flashbag)
    public function toString($object)
    {
        return $object instanceof SubcategoryAdmin
          ? $object->getName()
          : 'Subcategory';
    }


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('name', 'text')
          ->add('category', 'sonata_type_model', array(
            'class' => 'AdminBundle\Entity\Category',
            'property' => 'name'
          ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
          ->add('name')
          ->add("category.name");
    }
}