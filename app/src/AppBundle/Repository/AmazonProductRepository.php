<?php
declare(strict_types=1);

namespace AppBundle\Repository;

use AppBundle\Entity\AmazonProduct;
use AppBundle\Entity\Donor;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

class AmazonProductRepository extends EntityRepository
{
    public function create(Donor $donor, string $name, string $description, float $minPrice): Product
    {
        $product =  new AmazonProduct($donor, $name, $description, $minPrice);
        $this->_em->persist($product);
        $this->_em->flush();

        return $product;
    }
}