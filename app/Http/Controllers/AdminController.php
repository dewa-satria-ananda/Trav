<?php

namespace App\Http\Controllers;

use App\User;
use App\Discussion;
use App\Post;
use App\TravTogether;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin_page.home');
    }

    public function manageUser()
    {
        $data['listUser'] = User::orderBy('userId','ASC')->paginate(5);
        return view('admin_page.manage-user',$data);
    }

    public function managePost()
    {
        $data['listPost'] = Post::orderBy('postId','ASC')->paginate(5);
        return view('admin_page.manage-post', $data);
    }

    public function manageTravtogether()
    {
        $data['listRoom'] = TravTogether::orderBy('TravTogetherId','ASC')->paginate(5);
        return view('admin_page.manage-travtogether', $data);
    }

    public function manageDiscussion()
    {
        $data['listDiscussion'] = Discussion::orderBy('discussionId','ASC')->paginate(5);
        return view('admin_page.manage-discussion', $data);
    }

    public function destroyUser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('manage-user')->with('msg','User deleted succesfully');
    }

    public function destroyPost($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->route('manage-post')->with('msg','Post deleted succesfully');
    }

    public function destroyRoom($id)
    {
        $data = TravTogether::find($id);
        $data->delete();
        return redirect()->route('manage-travtogether')->with('msg','Room deleted succesfully');
    }

    public function destroyDiscussion($id)
    {
        $data = Discussion::find($id);
        $data->delete();
        return redirect()->route('manage-discussion')->with('msg','Discussion deleted succesfully');
    }
}
