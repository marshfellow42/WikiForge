<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Matriphe\Larinfo\LarinfoFacade;

class WikiController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Check if the user is authenticated and has 'admin' role
            if (Auth::check() && Auth::user()->role == 'admin') {
                return $next($request);
            } else {
                // If the user is not an admin, redirect with an error
                return redirect('/')->with('error', 'Você não tem autorização para essa página');
            }
        });
    }
    */

    public function create()
    {
        $pages = Page::all();
        return view('wiki.creator', compact('pages'));
    }

    public function show()
    {
        $user = Auth::user(); // Get the authenticated user
        $users = User::all();
        $pages = Page::all();

        $larinfo = LarinfoFacade::getInfo();

        if ($user && $user->role == "admin") {
            return view('wiki.info', compact('users', 'pages', 'larinfo'));
        } else {
            return redirect('/')->with('error', 'Access denied.');
        }
    }

    public function observe()
    {
        $users = User::all();
        return view('wiki.users', compact('users'));
    }

    public function create_new_page()
    {
        $pages = Page::all();
        return view('wiki.creator.create_page', compact('pages'));
    }

    public function edit_page($id)
    {
        $page = Page::findOrFail($id);
        return view('wiki.creator.edit_page', compact('page'));
    }

    public function destroy_user($id)
    {
        $user = User::findOrFail($id);

        // Verifica se o usuário não está tentando se excluir ou excluir um admin principal (opcional)
        if (Auth::user()->id == $user->id) {
            return redirect()->back()->with('error', 'Você não pode excluir a si mesmo.');
        }

        $user->delete();

        return redirect()->route('wiki.users')->with('success', 'Usuário excluído com sucesso!');
    }

    public function destroy_page($id)
    {
        $page = Page::findOrFail($id);

        $page->delete();

        return redirect()->route('wiki.creator')->with('success', 'Página excluída com sucesso!');
    }
}
