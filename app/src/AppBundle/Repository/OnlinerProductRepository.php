<?php
declare(strict_types=1);

namespace AppBundle\Repository;

use AppBundle\Entity\Donor;
use AppBundle\Entity\OnlinerProduct;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

class OnlinerProductRepository extends EntityRepository
{
    public function create(Donor $donor, string $name, float $rating, float $minPrice): Product
    {
        $product = new OnlinerProduct($donor, $name, $rating, $minPrice);
        $this->_em->persist($product);
        $this->_em->flush();

        return $product;
    }
}