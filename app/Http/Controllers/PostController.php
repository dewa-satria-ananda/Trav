<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\LikePost;
use App\PostComment;
use Symfony\Component\VarDumper\Cloner\Data;
use App\User;

class PostController extends Controller
{
    public function storePost(Request $request)
    {
        $request->validate([
            'post_title' => 'required|min:5|max:25',
            'post_image' => 'required',
            'post_description' => 'required|max:100',
        ]);

        if ($request->hasFile('post_image')) {
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $post_image = auth()->user()->userId . '_' . time() . '.' . $extension;
            $path = $request->file('post_image')->storeAs('public/postImage', $post_image);
        } else {
            $post_image = 'noimage.jpg';
        }

        $data = [
            'userId' => auth()->user()->userId,
            'title' => $request->post_title,
            'image' =>  $post_image,
            'description' => $request->post_description,

        ];

        Post::create($data);

        return redirect()->back();
    }

    public function detailPost($id)
    {
        $data['Post'] = Post::find($id);
        $data['PostComment'] = PostComment::where('postId', $id)->get();
        $data['id'] = $id;
        $data_user['User'] = User::all();
        return view('page.post-detail', $data, $data_user);
    }

    public function storePostComment(Request $request, $id)
    {
        $request->validate([
            'post_comment' => 'required|min:5|max:25'
        ]);

        $data = [
            'userId' => auth()->user()->userId,
            'postId' => $id,
            'text'  => $request->post_comment,
        ];
        $post= Post::find($id);
        $post->comment_count++;
        $post->save();

        PostComment::create($data);
        return redirect()->back();
    }

    public function likePost($id)
    {
        $data = LikePost::where('postId', $id)->where('userId', auth()->user()->userId)->get();

        if (count($data) > 0) {
            $post = Post::find($id);
            $post->like--;

            $post->save();
            LikePost::where('postId', $id)->where('userId', auth()->user()->userId)->delete();
            return back();
        } else {

            $post = Post::find($id);
            $post->like++;

            $post->save();
            $data = [
                'userId' => auth()->user()->userId,
                'postId' => $id,
            ];

            LikePost::create($data);
            return back();
        }
    }
}
