<?php

namespace CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Category;

/**
 * Class DefaultController
 * @package CatalogBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AdminBundle:Category')->findAll();


        return $this->render('@Catalog/Default/index.html.twig', array('category' => $category));
    }

    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function subcategoriesAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $subcategory = $em->getRepository('AdminBundle:Subcategory')->findAll();
        $subCategoryName = array();

        //Here i was trying to get the subcategories with the findBy method, but without success
        //I did it with a foreach and a simple if statment
        foreach($subcategory as $key => $value)
        {
            if($value->getCategory()->getName() == $name)
                $subCategoryName[] = $value->getName();
        }

        return $this->render('@Catalog/Default/subcategories.html.twig', array('name' => $name, 'subcategoryName' => $subCategoryName));
    }

    public function productAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AdminBundle:Product')->findAll();
        $productName = array();

        //Here i was trying to get the subcategories with the findBy method, but without success
        //I did it with a foreach and a simple if statment
        foreach($products as $key => $value)
        {
            if($value->getSubcategory()->getName() == $name)
                $productName[] = $value->getName();
        }

        return $this->render('@Catalog/Default/product.html.twig', array('name' => $name, 'productName' => $productName));
    }

    public function detailProductAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $detailProduct = $em->getRepository('AdminBundle:Product')
            ->findOneBy(array('name' => $name));


        return $this->render('@Catalog/Default/details.html.twig', array('name' => $name, 'detailProduct' => $detailProduct));
    }
}
