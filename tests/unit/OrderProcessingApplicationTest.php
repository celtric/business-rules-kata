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
    public function first_rule_with_opposite_input()
    {
        $app = new OrderProcessingApplication();

        // If the payment is for a physical product, generate a packing slip for shipping.
        has_generated(packing_slip::for_shipping, $app->generate_packing_slip(payment::for_physical_product));
    }

    //private function discarded_ideas()
    //{
    //    $app = new OrderProcessingApplication();
    //    $payment = payment::for_physical_product();
    //
    //    // If the payment is for a physical product, generate a packing slip for shipping.
    //    $app->generate_packing_slip_for_shipping_if_the_payment_is_for_a_physical_product();
    //    $app->generate(packing_slip::for_shipping())->if($payment->is_for_a_physical_product());
    //    if ($payment->is_for_a_physical_product()) $app->generate(packing_slip::for_shipping());
    //
    //    // If the payment is for a physical product, generate a packing slip for shipping.
    //    $it  = new OrderProcessingApplication();
    //    $it->generate_packing_slip_for_shipping_if_the_payment_is_for_a_physical_product();
    //    $it->generate(packing_slip::for_shipping())->if($payment->is_for_a_physical_product());
    //    if ($payment->is_for_a_physical_product()) $it->generate(packing_slip::for_shipping());
    //
    //    $this->assertInstanceOf(
    //            PackingSlipForShipping::class,
    //            $app->generate_packing_slip_for_shipping_if_the_payment_is_for_a_physical_product()
    //    );
    //}

    ///** @test */
    //public function second_rule()
    //{
    //    $this->assertInstanceOf(
    //        DuplicateSlipForTheRoyaltyDepartment::class,
    //        if_the_payment_is_for_a_book_create_a_duplicate_packing_slip_for_the_royalty_department()
    //    );
    //}
}
