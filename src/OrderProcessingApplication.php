<?php

namespace BusinessRulesKata;

class OrderProcessingApplication
{
    public function generate_packing_slip($a_payment)
    {
        if ($a_payment == payment::for_physical_product) {
            return packing_slip::for_shipping;
        }

        if ($a_payment == payment::for_a_book) {
            return packing_slip::for_royalty_department;
        }
    }

    public function activate_membership($a_payment)
    {
        if ($a_payment == payment::for_a_membership) {
            return membership::activated;
        }
    }
}

class packing_slip
{
    const for_shipping = "packing_slip_for_shipping";
    const for_royalty_department = "packing_slip_for_royalty_department";
}

class payment
{
    const for_physical_product = "payment_for_physical_product";
    const for_non_physical_product = "payment_for_non_physical_product";
    const for_a_book = "payment_for_a_book";
    const for_a_membership = "payment_for_a_membership";
}

class membership
{
    const activated = "activated_membership";
}




