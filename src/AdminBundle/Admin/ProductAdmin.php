<?php
/**
 * Created by PhpStorm.
 * User: datakernel
 * Date: 25/05/2016
 * Time: 23:29
 */

namespace AdminBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;


/**
 * Class ProductAdmin
 * @package AdminBundle\Admin
 */
class ProductAdmin extends Admin
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
          : 'Subcategory';
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('name', 'text')
          ->add('description', 'textarea')
          ->add('price', 'integer')
          ->add('subcategory', 'sonata_type_model', array(
            'class' => 'AdminBundle\Entity\Subcategory',
            'property' => 'name'
          ));
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('subcategory.name')
            ->add('draft');
    }

}