<?php
namespace Controllers;
require_once '../app/core/View.php';
require_once '../app/models/Product.php';
use Product;
use View;

class ProductsController
{
    public function actionIndex (){
        $product = new Product();
        return View::render('products/index', $product->getList());
    }
}
