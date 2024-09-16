<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignupRequest;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }

    private function convertUsernameToName($username)
    {
        $name = str_replace(['_', '.'], ' ', $username);

        $name = ucwords($name);

        return $name;

    }

    public function store(StoreSignupRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $validated['name'] = $this->convertUsernameToName($validated['username']);
            // $validated['name'] = $validated['username'];
            $validated['avatar'] = '/avatars/avatar-default.jpg';
            $validated['connect'] = 10;
            $validated['password'] = Hash::make($validated['password']);

            $user = User::create($validated);

            $user->assignRole($validated['role']);

            $wallet = new Wallet([
                'balance' => 0,
            ]);

            $user->wallet()->save($wallet);

            DB::commit();

            return redirect()->route('auth.signin')
                ->with('registrationSuccessfull', 'Account registration successful, please log in!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('auth.signup')
                ->with('registrationFailed', 'Registration failed. Please try again!');
        }
    }
}
