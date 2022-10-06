<?php

namespace App\Http\Controllers;

use App\Chat;
use App\ChatText;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function StartChat($id)
    {
        $data['Id'] = $id;
        $data_chat = Chat::where('user_to', $id)->where('user_from', auth()->user()->userId)->first();
        if ($data_chat) {
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
        } else {
            $data = [
                'user_from' => auth()->user()->userId,
                'user_to' => $id,
            ];

            Chat::create($data);
            $data = [
                'user_from' => $id,
                'user_to' => auth()->user()->userId,
            ];
            Chat::create($data);

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

    public function listChat($id)
    {
        $data['User'] = User::find($id);
        $data['Id'] = $id;
        $data['Chat'] = Chat::where('user_to', $id)->where('user_from', auth()->user()->userId)->first();
        if ($data['Chat']->chatId % '2' == '0') {
            $temp = $data['Chat']->chatId;
        } else {
            $temp = $data['Chat']->chatId + '1';
        }

        $data['Text'] = ChatText::where('chatId', $temp)->get();
        return view('page.chat-detail', $data);
    }

    public function SendChat(Request $request, $id)
    {
        $data_chat = Chat::where('user_to', $id)->where('user_from', auth()->user()->userId)->first();
        $request->validate([
            'text' => 'required|min:1|max:200',
        ]);

        if ($data_chat->chatId % '2' == '0') {
            $temp = $data_chat->chatId;
        } else {
            $temp = $data_chat->chatId + '1';
        }

        $data = [
            'text' => $request->text,
            'user_from' => auth()->user()->userId,
            'user_to' => $id,
            'chatId' => $temp,
        ];

        ChatText::create($data);
        return redirect()->back();
    }
}
