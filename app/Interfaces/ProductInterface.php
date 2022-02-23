<?php

namespace App\Interfaces;

use App\Http\Requests\ProductRequest;

interface ProductInterface
{
    /**
     * Search all products
     * 
     * @method  GET api/products?search=XXXXXXXXX
     * @access  public
     */
    public function searchAllProducts($query);

    /**
     * Get all products
     * 
     * @method  GET api/products
     * @access  public
     */
    public function getAllProducts();

    /**
     * Get all products
     * 
     * @method  GET api/products
     * @access  public
     */
    public function getAllDeletedProducts();

    /**
     * Get Product By ID
     * 
     * @param   integer     $id
     * 
     * @method  GET api/products/{id}
     * @access  public
     */
    public function getProductById($id);

    /**
     * Create | Update product
     * 
     * @param   \App\Http\Requests\ProductRequest    $request
     * @param   integer                           $id
     * 
     * @method  POST    api/products       For Create
     * @method  PUT     api/products/{id}  For Update     
     * @access  public
     */
    public function requestProduct(ProductRequest $request, $id = null);

    /**
     * Delete product
     * 
     * @param   integer     $id
     * 
     * @method  DELETE  api/products/{id}
     * @access  public
     */
    public function deleteProduct($id);
}