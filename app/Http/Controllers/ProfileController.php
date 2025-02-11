<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')
        ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function enter_profile($profile = null)
    {

        if ($profile == null) {
            return redirect('/')->with('msg-warning', 'Perfil não especificado!');
        } else {

            /**
             * Aqui vai ter uma validação do tipo:
             * 
             * se o usuario que estiver logado, procurar a conta que seje sua mesmo,
             * opções especificas irao aparecer para esse usuario, caso contrario,
             * procurará no banco de dados pelo nickname, informações daquele perfil.
             */

            //validação no banco de dados


            return view('profile.user-profile', [
                'profile' => $profile
            ]);
        }
    }
}
