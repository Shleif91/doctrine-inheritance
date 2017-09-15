<?php
declare(strict_types=1);

namespace AppBundle\Repository;

use AppBundle\Entity\Donor;
use AppBundle\Entity\YandexMarketProduct;
use Doctrine\ORM\EntityRepository;

class YandexMarketProductRepository extends EntityRepository
{
    public function create(Donor $donor, string $name, int $offersCount)
    {
        $product = new YandexMarketProduct($donor, $name, $offersCount);
        $this->_em->persist($product);
        $this->_em->flush();

        return $product;
    }
}