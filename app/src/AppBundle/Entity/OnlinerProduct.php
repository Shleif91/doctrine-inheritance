<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OnlinerProductRepository")
 */
class OnlinerProduct extends Product
{
    /**
     * @ORM\Column(type="float")
     */
    private $rating;

    /**
     * @ORM\Column(type="float")
     */
    private $minPrice;

    public function __construct(Donor $donor, string $name, float $rating, float $minPrice)
    {
        parent::__construct($donor, $name);
        $this->rating = $rating;
        $this->minPrice = $minPrice;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getMinPrice(): float
    {
        return $this->minPrice;
    }
}