<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\YandexMarketProductRepository")
 */
class YandexMarketProduct extends Product
{
    /**
     * @ORM\Column(type="integer")
     */
    private $offersCount;

    public function __construct(Donor $donor, string $name, int $offersCount)
    {
        parent::__construct($donor, $name);
        $this->offersCount = $offersCount;
    }

    public function getRating(): int
    {
        return $this->offersCount;
    }
}