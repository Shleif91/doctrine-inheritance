<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="donors")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "onliner" = "OnlinerProduct",
 *     "amazon" = "AmazonProduct",
 *     "yandex" = "YandexMarketProduct"
 * })
 */
abstract class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Donor")
     * @ORM\JoinColumn(name="donor_id", referencedColumnName="id")
     */
    protected $donor;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    public function __construct(Donor $donor, string $name)
    {
        $this->donor = $donor;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDonor(): Donor
    {
        return $this->donor;
    }

    public function getName(): string
    {
        return $this->name;
    }
}