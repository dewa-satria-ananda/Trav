<?php

namespace App\Http\Controllers;

use App\Follow;
use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function storeFollow($id){
        $data = Follow::where('userId', auth()->user()->userId)->where('followingUserId', $id)->get();
        if(count($data) > 0){
            $follow = User::find($id);
            $follow->followers--;
            $follow->save();
            
            $following = User::find(auth()->user()->userId);
            $following->following--;
            $following->save();


            Follow::where('userId', auth()->user()->userId)->where('followingUserId', $id)->delete();
            return redirect()->back()->with('msg', 'Anda sudah unfollow');
        }else{
            $follow = User::find($id);
            $data = [
                'userId' => auth()->user()->userId,
                'followingUserId' => $follow->userId,
            ];

            $follow->followers++;
            $follow->save();

            $following = User::find(auth()->user()->userId);
            $following->following++;
            $following->save();



            Follow::create($data);
            return redirect()->back()->with('msg', 'Anda sudah follow');
        }
    }
}
