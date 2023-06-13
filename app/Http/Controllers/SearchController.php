<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Professionals;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search()
    {
        $keyword = request()->input('keyword');
        $posts = Posts::where('content', 'like', '%' . $keyword . '%')->get();
        $professionals = Professionals::where('name', 'like', '%' . $keyword . '%')->get();
        $users = User::where('fullname', 'like', '%' . $keyword . '%')->orWhere('username', 'like', '%' . $keyword . '%')->get();
        return view('search_results', compact('users', 'posts', 'professionals'));
    }
}
