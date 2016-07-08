<?php

namespace AdminBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * SubCategory
 *
 * @ORM\Table(name="sm_subcategory")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\SubcategoryRepository")
 */
class Subcategory
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft = false;

    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Category", inversedBy="subcategory", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\Product", mappedBy="subcategory")
     */
    private $product;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return mixed
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getSubCategory()
    {
        return $this;
    }



    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * @param mixed $draft
     * @return mixed
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;
        return $this;
    }

    /**
     * @param boolean $name
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \AdminBundle\Entity\Product $product
     *
     * @return Subcategory
     */
    public function addProduct(\AdminBundle\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AdminBundle\Entity\Product $product
     */
    public function removeProduct(\AdminBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product;
    }
}
