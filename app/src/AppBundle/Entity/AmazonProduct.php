<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AmazonProductRepository")
 */
class AmazonProduct extends Product
{
    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $minPrice;

    public function __construct(Donor $donor, string $name, string $description, float $minPrice)
    {
        parent::__construct($donor, $name);
        $this->description = $description;
        $this->minPrice = $minPrice;
    }

    public function getRating(): string
    {
        return $this->description;
    }

    public function getMinPrice(): float
    {
        return $this->minPrice;
    }
}