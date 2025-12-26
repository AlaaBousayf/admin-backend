<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Smartphones',
            'Laptops',
            'Fragrances',
            'Skincare',
            'Groceries',
            'Home Decoration'
        ];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);
        }

        $products = [
            // Smartphones
            [
                'title' => 'iPhone 15 Pro Max',
                'description' => 'The iPhone 15 Pro Max features a titanium design, A17 Pro chip, and the most powerful iPhone camera system ever.',
                'price' => 1199.00,
                'discount_percentage' => 5.00,
                'rating' => 4.90,
                'stock' => 50,
                'brand' => 'Apple',
                'category' => 'Smartphones',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/smartphones/iPhone%2013%20Pro/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/smartphones/iPhone%2013%20Pro/1.png',
                    'https://cdn.dummyjson.com/products/images/smartphones/iPhone%2013%20Pro/2.png'
                ]
            ],
            [
                'title' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Galaxy S24 Ultra with Galaxy AI. Unleash new levels of creativity, productivity and possibility.',
                'price' => 1299.00,
                'discount_percentage' => 0.00,
                'rating' => 4.80,
                'stock' => 45,
                'brand' => 'Samsung',
                'category' => 'Smartphones',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/smartphones/Samsung%20Galaxy%20S21/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/smartphones/Samsung%20Galaxy%20S21/1.png',
                    'https://cdn.dummyjson.com/products/images/smartphones/Samsung%20Galaxy%20S21/2.png'
                ]
            ],
            [
                'title' => 'Realme C35',
                'description' => 'Realme C35 mobile phone with 6.6 inch display and 50MP triple camera.',
                'price' => 149.00,
                'discount_percentage' => 10.00,
                'rating' => 4.50,
                'stock' => 30,
                'brand' => 'Realme',
                'category' => 'Smartphones',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/smartphones/Realme%20C35/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/smartphones/Realme%20C35/1.png',
                    'https://cdn.dummyjson.com/products/images/smartphones/Realme%20C35/2.png'
                ]
            ],

            // Laptops
            [
                'title' => 'MacBook Pro 14"',
                'description' => 'M3 Pro chip. The most advanced chips ever built for a personal computer.',
                'price' => 1999.00,
                'discount_percentage' => 8.00,
                'rating' => 4.95,
                'stock' => 25,
                'brand' => 'Apple',
                'category' => 'Laptops',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/laptops/Apple%20MacBook%20Pro%2014%20Inch%20Space%20Grey/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/laptops/Apple%20MacBook%20Pro%2014%20Inch%20Space%20Grey/1.png',
                    'https://cdn.dummyjson.com/products/images/laptops/Apple%20MacBook%20Pro%2014%20Inch%20Space%20Grey/2.png'
                ]
            ],
            [
                'title' => 'Dell XPS 13',
                'description' => 'Crafted with machined aluminum and carbon fiber. InfinityEdge display.',
                'price' => 1249.00,
                'discount_percentage' => 12.00,
                'rating' => 4.60,
                'stock' => 40,
                'brand' => 'Dell',
                'category' => 'Laptops',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/laptops/Dell%20XPS%2013%209310/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/laptops/Dell%20XPS%2013%209310/1.png',
                    'https://cdn.dummyjson.com/products/images/laptops/Dell%20XPS%2013%209310/2.png'
                ]
            ],
            [
                'title' => 'Huawei MateBook X Pro',
                'description' => 'Sleek and super-light weight with exceptional typing comfort.',
                'price' => 1399.99,
                'discount_percentage' => 5.00,
                'rating' => 4.50,
                'stock' => 20,
                'brand' => 'Huawei',
                'category' => 'Laptops',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/laptops/Huawei%20Matebook%20X%20Pro/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/laptops/Huawei%20Matebook%20X%20Pro/1.png',
                    'https://cdn.dummyjson.com/products/images/laptops/Huawei%20Matebook%20X%20Pro/2.png'
                ]
            ],

            // Fragrances
            [
                'title' => 'Chanel Coco Mademoiselle',
                'description' => 'A surprisingly fresh, feminine amber fragrance with a distinct character.',
                'price' => 135.00,
                'discount_percentage' => 0.00,
                'rating' => 4.85,
                'stock' => 60,
                'brand' => 'Chanel',
                'category' => 'Fragrances',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/fragrances/Chanel%20Coco%20Noir%20Eau%20De/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/fragrances/Chanel%20Coco%20Noir%20Eau%20De/1.png',
                    'https://cdn.dummyjson.com/products/images/fragrances/Chanel%20Coco%20Noir%20Eau%20De/2.png'
                ]
            ],
            [
                'title' => 'Dior J\'adore',
                'description' => 'A radically fresh composition, dictated by a name that has the ring of a manifesto.',
                'price' => 120.00,
                'discount_percentage' => 5.00,
                'rating' => 4.80,
                'stock' => 75,
                'brand' => 'Dior',
                'category' => 'Fragrances',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/fragrances/Dior%20J\'adore/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/fragrances/Dior%20J\'adore/1.png',
                    'https://cdn.dummyjson.com/products/images/fragrances/Dior%20J\'adore/2.png'
                ]
            ],
            [
                'title' => 'Gucci Bloom',
                'description' => 'A sophisticated perfume capturing the spirit of the contemporary, diverse and authentic women of Gucci.',
                'price' => 110.00,
                'discount_percentage' => 8.00,
                'rating' => 4.70,
                'stock' => 50,
                'brand' => 'Gucci',
                'category' => 'Fragrances',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/fragrances/Gucci%20Bloom%20Eau%20de/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/fragrances/Gucci%20Bloom%20Eau%20de/1.png',
                    'https://cdn.dummyjson.com/products/images/fragrances/Gucci%20Bloom%20Eau%20de/2.png'
                ]
            ],

            // Skincare
            [
                'title' => 'Hyaluronic Acid Serum',
                'description' => 'Hydrating serum for all skin types. Plumps and moisturizes.',
                'price' => 25.00,
                'discount_percentage' => 15.00,
                'rating' => 4.60,
                'stock' => 100,
                'brand' => 'L\'Oreal',
                'category' => 'Skincare',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/skin-care/Skin%20Beauty%20Serum./thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/skin-care/Skin%20Beauty%20Serum./1.png'
                ]
            ],
            [
                'title' => 'Vitamin C Moisturizer',
                'description' => 'Brightening moisturizer with Vitamin C and E.',
                'price' => 45.00,
                'discount_percentage' => 10.00,
                'rating' => 4.75,
                'stock' => 80,
                'brand' => 'Olay',
                'category' => 'Skincare',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/skin-care/Oil%20Free%20Moisturizer%20100ml/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/skin-care/Oil%20Free%20Moisturizer%20100ml/1.png'
                ]
            ],

            // Groceries
            [
                'title' => 'Apple',
                'description' => 'Fresh, crisp apples. Perfect for snacking.',
                'price' => 1.99,
                'discount_percentage' => 0.00,
                'rating' => 4.50,
                'stock' => 200,
                'brand' => 'Fresh Produce',
                'category' => 'Groceries',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/groceries/Apple/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/groceries/Apple/1.png'
                ]
            ],
            [
                'title' => 'Beef Steak',
                'description' => 'High quality beef steak, great for grilling.',
                'price' => 15.99,
                'discount_percentage' => 5.00,
                'rating' => 4.80,
                'stock' => 50,
                'brand' => 'Butcher\'s Choice',
                'category' => 'Groceries',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/groceries/Beef%20Steak/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/groceries/Beef%20Steak/1.png'
                ]
            ],
            [
                'title' => 'Cat Food',
                'description' => 'Nutritious cat food for your feline friends.',
                'price' => 8.99,
                'discount_percentage' => 0.00,
                'rating' => 4.40,
                'stock' => 100,
                'brand' => 'Whiskas',
                'category' => 'Groceries',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/groceries/Cat%20Food/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/groceries/Cat%20Food/1.png'
                ]
            ],

            // Home Decoration
            [
                'title' => 'Plant Hanger',
                'description' => 'Boho chic plant hanger for indoor plants.',
                'price' => 15.99,
                'discount_percentage' => 0.00,
                'rating' => 4.70,
                'stock' => 60,
                'brand' => 'Handmade',
                'category' => 'Home Decoration',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/home-decoration/Plant%20Hanger%20For%20Home/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/home-decoration/Plant%20Hanger%20For%20Home/1.png'
                ]
            ],
            [
                'title' => 'Decoration Mutli Purpose',
                'description' => 'Versatile decoration piece for any room.',
                'price' => 25.00,
                'discount_percentage' => 10.00,
                'rating' => 4.20,
                'stock' => 40,
                'brand' => 'Decor+',
                'category' => 'Home Decoration',
                'thumbnail' => 'https://cdn.dummyjson.com/products/images/home-decoration/Decoration%20Mutli%20Purpose/thumbnail.png',
                'images' => [
                    'https://cdn.dummyjson.com/products/images/home-decoration/Decoration%20Mutli%20Purpose/1.png'
                ]
            ],
        ];

        foreach ($products as $productData) {
            $categoryName = $productData['category'];
            unset($productData['category']);

            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                $productData['category_id'] = $category->id;
                Product::create($productData);
            }
        }
    }
}
