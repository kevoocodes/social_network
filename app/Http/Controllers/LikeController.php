<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function toggleLike(Request $request, Posts $post)
    {
        $user = $request->user(); // Assuming you have user authentication
        $liked = $post->likes()->where('user_id', $user->id)->exists();
        
        if ($liked) {
            $post->likes()->where('user_id', $user->id)->delete();
        } else {
            $post->likes()->create(['user_id' => $user->id]);
        }
        
        $likeCount = $post->likes()->count();
        
        return response()->json([
            'liked' => !$liked,
            'likeCount' => $likeCount,
        ]);
    }
}
