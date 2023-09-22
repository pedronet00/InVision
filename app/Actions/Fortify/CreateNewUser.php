<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Intervention\Image\Facades\Image;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validação dos dados de entrada
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'profile_photo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adiciona regras para a foto de perfil
        ])->validate();

        // Upload da foto de perfil e obtenção do caminho
        $profilePhotoPath = $this->storeProfilePhoto($input['profile_photo']);

        return DB::transaction(function () use ($input, $profilePhotoPath) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'profile_photo_path' => $profilePhotoPath, // Define o caminho da foto de perfil
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }


    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

    protected function storeProfilePhoto($photo)
    {
        $filename = time() . '.' . $photo->extension();
        $path = 'profiles/' . $filename;

        Image::make($photo)->fit(200, 200)->save(public_path($path));

        return $path;
    }
}
