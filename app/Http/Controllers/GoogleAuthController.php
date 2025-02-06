<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try{
            $google_user = Socialite::driver('google')->stateless()->user();

            $users = User::where('email', $google_user->getEmail())->first();

            if($users){
                Auth::login($users);

                return redirect('/');
            }

            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user){
                $new_user = new User();

                $new_user->name = $google_user->getName();
                $new_user->email = $google_user->getEmail();
                $new_user->google_id = $google_user->getId();
                $new_user->save();

                Auth::login($new_user);

                return redirect('/');
            }
            else{
                Auth::login($user);

                return redirect('/');
            }
        }
        catch(\Throwable $th){
            // dd($th->getMessage());
        }
    }
}
