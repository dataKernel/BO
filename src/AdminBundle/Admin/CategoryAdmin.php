<?php
/**
 * Created by PhpStorm.
 * User: datakernel
 * Date: 25/05/2016
 * Time: 19:56
 */

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends Admin
{
    //easy function to simplify the string value when you create the object(flashbag)
    /**
     * @param $object
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof SubcategoryAdmin
          ? $object->getName()
          : 'Category';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('name', 'text')
          ->add('Subcategory', 'entity', array(
            'class' => 'AdminBundle\Entity\Subcategory',
            'choice_label' => 'name',
            'multiple' => true
          ));

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name');
    }
}