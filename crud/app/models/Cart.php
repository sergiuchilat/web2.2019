<?php

class Cart
{
    public function add($product)
    {
        $_SESSION['CART']['PRODUCTS'][$product['id']] = $product;
    }


    public function remove($id)
    {
        unset($_SESSION['CART']['PRODUCTS'][$id]);
    }

    public function getAll()
    {
        // unset($_SESSION['CART']['PRODUCTS']);
        return $_SESSION['CART']['PRODUCTS'];
    }
}
