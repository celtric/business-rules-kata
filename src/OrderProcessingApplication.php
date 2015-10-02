<?php

namespace BusinessRulesKata;

function has_generated($expected, $result)
{
    if ($expected !== $result) {
        throw new \DomainException("{$expected} has not been generated ({$result} given)");
    }
}

class OrderProcessingApplication
{
    public function if_is_for_a_physical_product($the_payment)
    {
        return $the_payment === payment::for_physical_product;
    }

    public function generate_packing_slip($the_payment)
    {
        if ($the_payment == payment::for_physical_product) {
            return packing_slip::for_shipping;
        }
    }
}

class packing_slip
{
    const for_shipping = "packing_slip_for_shipping";
}

class payment
{
    const for_physical_product = "payment_for_physical_product";
    const for_non_physical_product = "payment_for_non_physical_product";
}




