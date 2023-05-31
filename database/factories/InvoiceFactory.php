<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id_transaction' => $this->faker->numerify(),
            'inv_business_name' => $this->faker->name(),
            'inv_business_address' => $this->faker->address(),
            'inv_ruc' => $this->faker->numerify(),
            'inv_issue_date' => $this->faker->date(),
            'inv_accounting_required' => 'SI',

            'inv_number_document' => $this->faker->numerify(),
            'inv_establishment' => $this->faker->numerify(),
            'inv_emission_point' => $this->faker->numerify(),
            'inv_sequential' => $this->faker->numerify(),

            'inv_buyer_number_identification' => $this->faker->numerify(),
            'inv_buyer_address' => $this->faker->address(),
            'inv_buyer_phone' => $this->faker->phoneNumber(),
            'inv_buyer_email' => $this->faker->unique()->safeEmail(),

            'inv_total_without_tax' => 0,
            'inv_total_discount' =>0,
            'inv_total_tax_iva' => 0,
            'inv_total_amount' => $this->faker->unique()->randomNumber(3),
            'inv_currency' => $this->faker->unique()->currencyCode(),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'created_at' => null,
            ];
        });
    }
}
