<?php

class Product
{
    public function getList()
    {

        $db = new DB();
        $db->open('localhost', 'root', '', 'store', 'utf8');
        $products = $db->select('
            SELECT
                id,
                name,
                price
            FROM
                products
        ');

        return $products;
    }
}
