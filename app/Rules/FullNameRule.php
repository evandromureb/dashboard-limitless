<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullNameRule implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $data = explode(' ', $value);
        if (count($data) > 1) {
			if ($data[1] != '') {
				return true;
			}
        } else {
            return false;
        }
    }

    public function message()
    {
        return 'o campo nome deve conter nome e sobrenome';
    }
}
