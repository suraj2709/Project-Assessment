<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        // $authUser = $accountService->findOrCreate(
        //     $user,
        //     $provider
        // );

        $exist_user = User::where('email', $user->email)->first();

        if (is_null($exist_user)) {
            $exist_user = new User();
            $exist_user->name = $user->name;
            $exist_user->email = $user->email;
            $exist_user->save();
        }

        Auth::login($exist_user, true);
        return redirect()->route('products.index');
    }

    public function logout() {
        Auth::logout(); // logout user
        return redirect()->route('login');
    }
}
