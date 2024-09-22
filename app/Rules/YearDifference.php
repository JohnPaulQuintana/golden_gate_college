<?php

// app/Rules/YearDifference.php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class YearDifference implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  Closure  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get the starting year from the request
        $startingYear = request()->input('starting_year');

        // Check if starting year is provided
        if (is_null($startingYear)) {
            $fail('The starting year must be provided.');
            return;
        }

        // Ensure both values are integers
        if (!is_numeric($startingYear) || !is_numeric($value)) {
            $fail('The years must be valid numbers.');
            return;
        }

        // Check if the end year is one year ahead of the starting year
        if ($value != $startingYear + 1) {
            $fail('The end year must be one year ahead of the starting year.');
        }
    }
}

