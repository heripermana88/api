<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ProductTest extends TestCase
{
    /**
     * Authenticate user.
     *
     * @return void
     */
    protected function authenticate()
    {
        $user = User::create([
            'name' => 'prospark_test',
            'email' => rand(12345,678910).'test@gmail.com',
            'password' => \Hash::make('prospark'),
        ]);

        if (!auth()->attempt(['email'=>$user->email, 'password'=>'secret1234'])) {
            return response(['message' => 'Login credentials are invaild']);
        }

        return $accessToken = auth()->user()->createToken('authToken')->accessToken;
    }

    /**
     * test create product.
     *
     * @return void
     */
    public function test_create_product()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST','api/products',[
            'name' => 'Bajigur',
            'description' => 'ini Bajigur',
            'sku' => 'BJG30267',
            'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
            'stock' => 50,
            'price' => 15.5,
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(201);
    }

    /**
     * test update product.
     *
     * @return void
     */
    public function test_update_product()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('PUT','api/products/1',[
            'name' => 'Bajigur edit',
            'description' => 'ini Bajigur',
            'sku' => 'BJG30267',
            'primaryImage' => "https://i.picsum.photos/id/161/800/600.jpg?hmac=aeLn8nHk_nKBC3FFiZzmwF8WwYvc8Idd8JMt7HteW50",
            'stock' => 50,
            'price' => 15.5,
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find product.
     *
     * @return void
     */
    public function test_find_product()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/products/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all products.
     *
     * @return void
     */
    public function test_get_all_product()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/products');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete products.
     *
     * @return void
     */
    public function test_delete_product()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('DELETE','api/products/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
}