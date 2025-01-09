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
