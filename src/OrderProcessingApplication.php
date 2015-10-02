<?php

namespace BusinessRulesKata;


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

        if ($the_payment == payment::for_a_book) {
            return packing_slip::for_royalty_department;
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
}




