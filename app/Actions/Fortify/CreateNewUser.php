<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' =>['string','nullable', 'max:255'],
            'country_id' =>['required','integer','exists:countries,id'],
            'language_id' =>['required','integer','exists:languages,id'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' =>$input['last_name'],
            'country_id' =>$input['country_id'],
            'language_id' =>$input['language_id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
