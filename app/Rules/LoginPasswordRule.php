<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;

class LoginPasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $password = "";
    public function __construct($password)
    {
        $this->password = $password;
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
        if (!Hash::check($value, $this->password)) 
        {
            return false;  
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Enter correct password';
    }
}
