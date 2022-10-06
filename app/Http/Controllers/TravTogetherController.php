<?php

namespace App\Http\Controllers;

use App\JoinRoom;
use App\RoomCount;
use Illuminate\Http\Request;
use App\TravTogether;
use Symfony\Component\VarDumper\Cloner\Data;

class TravTogetherController extends Controller
{
    public function storeTravTogether(Request $request)
    {
        $request->validate([
            'TravTogether_title' => 'required|min:5|max:25',
            'TravTogether_destination' => 'required',
            'TravTogether_budget' => 'required|integer|digits_between:1,15',
            'TravTogether_phone' => 'required|numeric|digits_between:1,15',
            'TravTogether_description' => 'required',
            'TravTogether_people' => 'required|integer|digits_between:1,2'

        ]);

        $data = [
            'userId' => auth()->user()->userId,
            'title' => $request->TravTogether_title,
            'destination' => $request->TravTogether_destination,
            'budget' => $request->TravTogether_budget,
            'phone' => $request->TravTogether_phone,
            'description' => $request->TravTogether_description,
            'people' => $request->TravTogether_people,
        ];

        TravTogether::create($data);

        return redirect()->back();
    }

    public function countTravtogether($id)
    {
        $data = RoomCount::where('travTogetherId', $id)->where('userId', auth()->user()->userId)->get();

        if (count($data) > 0) {
            $post = TravTogether::find($id);
            $post->people--;

            $post->save();
            RoomCount::where('travTogetherId', $id)->where('userId', auth()->user()->userId)->delete();
            return back();
        } else {

            $post = TravTogether::find($id);
            $post->like++;

            $post->save();
            $data = [
                'userId' => auth()->user()->userId,
                'travTogetherId' => $id,
            ];

            RoomCount::create($data);
            return back();
        }
    }

    public function detailTravTogether($id)
    {
        $data['RoomCount'] = RoomCount::where('travTogetherId', $id)->where('userId', auth()->user()->userId)->get();
        $data['count'] = '0';
        if (count($data['RoomCount']) > 0) {
            $data['temp'] = '1';
        } else {
            $data['temp'] = '0';
        }
        $data['TravTogether'] = TravTogether::find($id);
        if($data['TravTogether']->people==$data['TravTogether']->joinedPeople)
        {
            $data['count'] = '1';
        }
        $data['id'] = $id;
        return view('page.room-detail', $data);
    }

    public function joinRoom($id)
    {
        $data = RoomCount::where('travTogetherId', $id)->where('userId', auth()->user()->userId)->get();

        if (count($data) > 0) {
            return back()->with('msg', 'Anda sudah join room ini, tolong kontak nomor yang tertera');
        } else {
            $room = TravTogether::find($id);
            $room->joinedPeople++;

            $room->save();
            $data = [
                'userId' => auth()->user()->userId,
                'travTogetherId' => $id,
            ];
            RoomCount::create($data);
            return redirect()->back()->with('msg', 'Anda berhasil join room ini, tolong kontak nomor yang tertera');
        }
    }

    public function leaveRoom($id)
    {
        $data = RoomCount::where('travTogetherId', $id)->where('userId', auth()->user()->userId);
        $data->delete();

        $room = TravTogether::find($id);
        $room->joinedPeople--;
        $room->save();
        return redirect()->back()->with('msg', 'You have leave the room');
    }

    public function destroyRoom($id)
    {
        $data = TravTogether::find($id);
        $data->delete();
        return redirect()->back()->with('msg', 'room deleted succesfully');
    }

    
}
