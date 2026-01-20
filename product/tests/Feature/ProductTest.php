<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        $category = Category::create(['name' => 'Electronics']);

        $response = $this->postJson('/api/products', [
            'name' => 'Laptop',
            'category_id' => $category->id,
            'description' => 'Gaming laptop',
            'price' => 2000,
            'stock' => 10,
            'enabled' => true
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Laptop']);
    }
}
