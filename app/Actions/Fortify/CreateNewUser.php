<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Spatie\Permission\Models\Role;

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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required',],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        // query ke table role 
        $role = Role::where('name', 'PELAMAR')->first();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'no_ktp' => $input['no_ktp'],
            'password' => Hash::make($input['password']),
        ]);
        
        $user->assignRole($role);
        return $user;

    }
}