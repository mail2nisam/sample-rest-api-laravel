<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = 'Cat '.$this->faker->bothify('???-#?##');
        return [
            'name'=>$name,
            'slug'=> Str::slug($name)
        ];
    }

    public function setRelation()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Category::inRandomOrder()->take(1)->first()->id,
            ];
        });        
    }
}
