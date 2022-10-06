<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\DiscussionComment;
use App\LikeDiscussion;
use App\User;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function storeDiscussion(Request $request)
    {
        $request->validate([
            'discussion_title' => 'required|min:5|max:200',
     
        ]);

        $data = [
            'userId' => auth()->user()->userId,
            'title' => $request->discussion_title,
        ];

        Discussion::create($data);
        return redirect()->back();
    }

    public function detailDiscussion($id)
    {
        $data['Discussion'] = Discussion::find($id);
        $data['DiscussionComments'] = DiscussionComment::where('discussionId',$id)->get();
        $data['id'] = $id;
        return view('page.discussion-detail', $data);
    }

    public function storeDiscussionComment(Request $request, $id)
    {
        $request->validate([
            'discussion_comment' => 'required|max:25',
        ]);

        $data = [
            'userId' => auth()->user()->userId,
            'discussionId' => $id,
            'text' => $request->discussion_comment,
        ];

        $discussion= Discussion::find($id);
        $discussion->comment_count++;
        $discussion->save();

        DiscussionComment::create($data);
        return redirect()->back();
    }

    public function likeDiscussion($id)
    {
        $data = LikeDiscussion::where('discussionId', $id)->where('userId', auth()->user()->userId)->get();

        if (count($data) > 0) {
            $discussion = Discussion::find($id);
            $discussion->like--;

            $discussion->save();
            LikeDiscussion::where('discussionId', $id)->where('userId', auth()->user()->userId)->delete();
            return back();
        } else {

            $discussion = Discussion::find($id);
            $discussion->like++;

            $discussion->save();
            $data = [
                'userId' => auth()->user()->userId,
                'discussionId' => $id,
            ];

            LikeDiscussion::create($data);
            return back();
        }
    }
}
