<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Professionals;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function showCreatepostPage() {
        $professionals = Professionals::all();
        return view('create_post',compact('professionals'));
    }



    public function addPost(Request  $request) {
        $formfields = $request->validate([
                'content' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'professional_id' => 'required|exists:App\Models\Professionals,id'
        ]);

        $post  = new Posts();
        $post->user_id = auth()->user()->id;
        $post->content = $request->input('content');
        $post->professional_id = $request->input('professional_id');
        // $post->image = $request->input('image');

        $post->save();
        return redirect('create_post')->with('success', 'Your have been adding post.');

    }

    public function ShowAllPosts() {
        

            $posts = Posts::withCount('comment')->latest()->get();
            $allPosts = $posts->sortByDesc('created_at');
            $trendingPosts = $posts->sortByDesc('comment_count');
            $professionals = Professionals::all();


            $userId = auth()->user()->id; // Get the ID of the authenticated user
        
            $post = Posts::join('userprofessional', 'posts.professional_id', '=', 'userprofessional.professional_id')
                ->where('userprofessional.user_id', $userId)
                ->get();
        

            return view('dashboard', compact('allPosts', 'trendingPosts', 'professionals', 'post'));
     }

    public function showPostPage($id) {
        
        $post = Posts::find($id);
        $comments = $post->comment;
        return view('post', ['post' => $post,'comments'=> $comments]); 
    }


    public function deletePost($id)
    {
        $post = Posts::findOrFail($id);

        if ($post && $post->user_id == auth()->user()->id) {
            // Delete associated comments
            $post->comment()->delete();
            
            // Delete the post
            $post->delete();

            return redirect('profile')->with('success', 'Post has been deleted');
        } else {
            return redirect('profile')->with('success', 'You do not have permission to delete this post');
        }
    }

    public function ShowPostsProfessional()
    {
        $userId = auth()->user()->id; // Get the ID of the authenticated user
        $professionals = Professionals::all();

        $post = Posts::join('userprofessional', 'posts.professional_id', '=', 'userprofessional.professional_id')
            ->where('userprofessional.user_id', $userId)
            ->get();

        return view('dashboard', compact('post', 'professionals'));
    }

}
