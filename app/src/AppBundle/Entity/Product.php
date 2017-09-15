<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Product
{
    /**
     * @ORM\ManyToOne(targetEntity="Don")
     */
    protected $name;
}