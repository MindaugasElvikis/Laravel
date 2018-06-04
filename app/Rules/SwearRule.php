<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SwearRule implements Rule
{
    const SWEARS = [
        'Sudas',
        'Rupuze',
        'Rupus miltai'
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !in_array(
            strtolower($value),
            array_map('strtolower', self::SWEARS),
            true
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
