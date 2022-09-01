<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $isDigital = $this->faker->boolean();
        
        return [
            'name'=> 'Product '.$this->faker->bothify('???-#?##'),
            'price'=> $this->faker->numberBetween(10,199),
            'currency'=>'USD',
            'sku'=>'pr-'.$this->faker->randomNumber(),
            'category_id'=>$this->faker->numberBetween(1, 500),
            'is_digital'=>$isDigital,
            'download_url'=>($isDigital) ? $this->faker->url() : '',
            'weight'=>(!$isDigital) ? $this->faker->randomFloat(2,0.5,10) : 0
        ];
    }
}
