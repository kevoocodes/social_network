<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function showProfilePage() {
        $userid = Auth::id();
        $posts = Posts::where('user_id', $userid)->get();
        return  view('profile', ['posts'=> $posts]);
     }

     public function showUpdateProfilePage() {
        return  view('update_profile');
     }

     public function updateProfile(Request $request) {

        //get the current user 
        $userid = Auth::id();
        $user = User::findOrFail($userid);


        //validate data submited by the user
        $user = Auth::user();
       $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phonenumber' => [
                'required',
                'regex:/^[0-9]{10}$/'
            ],
        ]);

        //if fails redirect back with errors
        if($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }



        //fill user model
        $user->fill([
            'fullname' => $request->fullname,
            'phonenumber' => $request->phonenumber,
        ]);

        $user->save();

        return redirect()
        ->back()
        ->with('success', 'Your profile has been updated.');



     }

    public function showUserProfile($id) {
        $usersProfile = User::find($id);
        $posts = Posts::where('user_id', $usersProfile->id)->get();
    
        // Fetch comments for each post
        $comments = [];
        foreach ($posts as $post) {
            $comments[$post->id] = $post->comments;
        }
    
        return view('user_profile', [
            'usersProfile' => $usersProfile,
            'posts' => $posts,
            'comments' => $comments
        ]);
    }
    
}
