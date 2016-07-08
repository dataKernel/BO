<?php

namespace AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="sm_category")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\CategoryRepository")
 */
class Category
{

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->subcategory = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\Subcategory", mappedBy="category", cascade={"persist"})
     */
    private $subcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return ArrayCollection
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * @param ArrayCollection $subcategory
     * @return Category
     */
    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;
    }


    /**
     * Add subcategory
     *
     * @param \AdminBundle\Entity\Subcategory $subcategory
     *
     * @return Category
     */
    public function addSubcategory(\AdminBundle\Entity\Subcategory $subcategory)
    {
        $this->subcategory[] = $subcategory;

        return $this;
    }

    /**
     * Remove subcategory
     *
     * @param \AdminBundle\Entity\Subcategory $subcategory
     */
    public function removeSubcategory(\AdminBundle\Entity\Subcategory $subcategory)
    {
        $this->subcategory->removeElement($subcategory);
    }
}
