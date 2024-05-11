<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    private $payment_code = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $total_amount = $this->faker->randomElement([100000, 200000, 250000, 400000, 120000]);
        // paided amount = any random number between 0 and total amount, but can be divided by 1000
        $paided_amount = $total_amount - rand(0, ($total_amount % 1000)) * 1000;
        $payment_code = $this->payment_code++;

        return [
            'order_id' => $this->faker->numberBetween(1, 6),
            'payment_code' => mt_rand(1, 100000),
            'total_amount' => $total_amount,
            'paided_amount' => $paided_amount,
            'payment_method' => $this->faker->sentence(mt_rand(1, 4)),
            'status' => mt_rand(1, 3),
        ];
    }

    public function payment_code_generator()
    {
        $this->payment_code += 1;
        return $this->payment_code;
    }
}
