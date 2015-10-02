<?php

namespace BusinessRulesKata;



final class OrderProcessingApplicationTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function first_rule()
    {
        $app = new OrderProcessingApplication();

        // If the payment is for a physical product, generate a packing slip for shipping.
        has_generated(packing_slip::for_shipping, $app->generate_packing_slip(payment::for_physical_product));

        $this->setExpectedException(\DomainException::class);

        has_generated(packing_slip::for_shipping, $app->generate_packing_slip(payment::for_non_physical_product));
    }

    /** @test */
    public function second_rule()
    {
        $app = new OrderProcessingApplication();

        // If the payment is for a book, create a duplicate packing slip for the royalty department.
        has_generated(two(packing_slip::for_royalty_department), $app->generate_packing_slip(payment::for_a_book));
    }
}

function has_generated($expected, $result)
{
    foreach (is_array($expected) ? $expected : [$expected] as $expectation) {
        if ($expectation !== $result) {
            throw new \DomainException("{$expectation} has not been generated ({$result} given)");
        }
    }
}

function two($expectation) {
    return [$expectation, $expectation];
}
