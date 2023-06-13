<?php

namespace App\Http\Controllers;

use App\Models\Professionals;
use App\Models\UserProfessional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessionalController extends Controller
{
    

    public function viewProfessionalPosts($id)
    {
        $professional = Professionals::find($id);
        $posts = $professional->posts; // Assuming there is a relationship between Professional and Post models

        return view('professional_posts', compact('professional', 'posts'));
    }

    public function viewProfesionalPage() {
        $professionals = Professionals::all();
        return view('choose_professional',compact('professionals'));
    }

    public function storeProfessionals(Request $request)
    {
        $selectedProfessionals = $request->input('professional');

        // Retrieve the authenticated user
        $user = Auth::user();

        // Store the selected professionals in the database
        foreach ($selectedProfessionals as $professionalId) {
            UserProfessional::create([
                'user_id' => $user->id,
                'professional_id' => $professionalId,
            ]);
        }

        return redirect('/dashboard')->with('success', 'Professionals successfully added.');
    }

    


    
}
