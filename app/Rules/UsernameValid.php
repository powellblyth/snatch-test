<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UsernameValid implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        ;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (false === stripos($value, 'cat')
            && false === stripos($value, 'dog')
            && false === stripos($value, 'horse'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your username contains invalid characters';
    }
}
