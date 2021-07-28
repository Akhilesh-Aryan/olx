<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {    $category = Category::count() >= 7 ? Category::inRandomOrder()->first()->id: Category::factory();
        return [
            'pro_title'=> $this->faker->name(),
            'price'=>$this->faker->randomFloat(2, 0, 10000),
            'seller_name'=>$this->faker->name(),
            'seller_contact'=>$this->faker->numerify('###-###-####'),
            'image' =>$this->faker->image('public/images',640,480, null, false),
            'description'=>$this->faker->paragraph,
            'category_id' => $category,
            'address'=>$this->faker->address,
            'city'=>$this->faker->city
        ];
    }
}
