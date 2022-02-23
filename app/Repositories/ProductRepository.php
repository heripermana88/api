<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductInterface;
use App\Traits\ResponseAPI;
use App\Models\Product;
use DB;

class ProductRepository implements ProductInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function createProduct(ProductRequest $request)
    {
        try {
            echo json_encode($request);die();
            $products = Product::save();
            return $this->success("All Products", $products);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    public function getAllProducts()
    {
        try {
            $products = Product::all();
            return $this->success("All Products", $products);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    public function getAllDeletedProducts()
    {
        try {
            $products = Product::onlyTrashed()
            ->get();
            return $this->success("All Deleted Products", $products);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getProductById($id)
    {
        try {
            $product = Product::find($id);
            
            // Check the product
            if(!$product) return $this->error("No product with ID $id", 404);

            return $this->success("Product Detail", $product);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestProduct(ProductRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If product exists when we find it
            // Then update the product
            // Else create the new one.
            $product = $id ? Product::find($id) : new Product;

            // Check the product 
            if($id && !$product) return $this->error("No product with ID $id", 404);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->sku = $request->sku;
            $product->primaryImage = $request->primaryImage;
            $product->stock = $request->stock;
            $product->price = $request->price;
            $product->save();

            DB::commit();
            return $this->success(
                $id ? "Product updated"
                    : "Product created",
                $product, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteProduct($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);

            // Check the product
            if(!$product) return $this->error("No product with ID $id", 404);

            // Delete the product
            $product->delete();
            
            DB::commit();
            return $this->success("Product deleted", $product);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}