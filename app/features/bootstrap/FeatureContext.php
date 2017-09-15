<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Donor;
use AppBundle\Entity\Product;
use AppBundle\Entity\OnlinerProduct;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @var Donor
     */
    private $donor;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @BeforeScenario
     */
    public function up()
    {
        $this->em->getConnection()->beginTransaction();
    }

    /**
     * @AfterScenario
     */
    public function down()
    {
        $this->em->getConnection()->rollback();
    }

    /**
     * @When I create donor :arg1
     */
    public function iCreateDonor(string $arg1)
    {
        $this->donor = new Donor($arg1);
    }

    /**
     * @When I add product with params :arg1, :arg2, :arg3 to this donor
     */
    public function addProductWithParamsToIt($arg1, $arg2, $arg3)
    {
        $this->product = $this->em->getRepository('AppBundle:OnlinerProduct')
            ->create($this->donor, $arg1, $arg2, $arg3);
    }

    /**
     * @Then I have this products with params :arg1, :arg2, :arg3 in table
     */
    public function iHaveThisProductsInTable($arg1, $arg2, $arg3)
    {
        $product = $this->em->getRepository('AppBundle:OnlinerProduct')->findOneBy([
            'donor' => $this->donor
        ]);

        Assert::assertEquals($product->getName(), $arg1);
        Assert::assertEquals($product->getRating(), $arg2);
        Assert::assertEquals($product->getMinPrice(), $arg3);
    }

}
