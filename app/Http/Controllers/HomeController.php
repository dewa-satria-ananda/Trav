<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Discussion;
use App\Post;
use App\Follow;
use App\TravTogether;
use App\RoomCount;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data_following = Follow::where('userId', auth()->user()->userId)->get();
        $data['Post'] = [];
        foreach ($data_following as $key => $data_follow) {
            $temps = Post::where('userId', $data_follow->followingUserId)->get();
            foreach ($temps as $temp) {
                array_push($data['Post'], $temp);
            }
        };
        $temps = Post::where('userId', auth()->user()->userId)->get();
        foreach ($temps as $temp) {
            array_push($data['Post'], $temp);
        }
        rsort($data['Post']);
        return view('page.home', $data);
    }

    public function listExplore()
    {
        $data['Post'] = Post::orderBy('postId', 'DESC')->get();
        $data_user['User'] = User::all();
        return view('page.explore', $data, $data_user);
    }

    public function listDiscussion()
    {
        $data['Discussion'] = Discussion::orderBy('discussionId', 'DESC')->get();
        return view('page.discussion', $data);
    }

    public function listTrav()
    {
        $data['TravTogether'] = TravTogether::orderBy('TravTogetherId', 'DESC')->get();

        return view('page.travTogether', $data);
    }

    public function profile()
    {
        $data['Post'] = Post::find(auth()->user()->userId);
        $data['Post'] = Post::where('userId', auth()->user()->userId)->get();
        return view('page.profile', $data);
    }

    public function editProfile()
    {
        return view('page.edit-profile');
    }

    public function storeProfile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->userId);

        $request->validate([
            'username' => 'min:5|max:25',
            'bio' => 'max:200',
        ]);

        if ($request->hasFile('profile_image')) {
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $profile_image = auth()->user()->userId . '_' . time() . '.' . $extension;
            $path = $request->file('profile_image')->storeAs('public/profileImage', $profile_image);
        } else {
            $profile_image = auth()->user()->image;
        }

        $data = [
            'name' => $request->username,
            'image' => $profile_image,
            'bio' => $request->bio,

        ];
        $user->update($data);
        return back();
    }

    public function visitProfile($id)
    {
        $data['User'] = User::find($id);
        $data['Post'] = Post::where('userId', $id)->get();
        $data['id'] = $id;
        $data['Follow'] = Follow::where('userId', auth()->user()->userId)->where('followingUserId', $id)->exists();

        return view('page.visit-profile', $data);
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $user = User::where('name', 'Like', '%' . $request->search . '%')->get();
        }

        if (count($user) > 0) {
            return redirect()->route('visit-profile', $user[0]->userId);
        } else {
            return back();
        }
    }

    public function chat()
    {
        $data_following = Chat::where('user_from', auth()->user()->userId)->get();
        $data['User'] = [];
        foreach ($data_following as $key => $data_follow) {
            $temps = User::where('userId', $data_follow->user_to)->get();
            foreach ($temps as $temp) {
                array_push($data['User'], $temp);
            }
        };
        rsort($data['User']);
        return view('page.chat', $data);
    }
}
