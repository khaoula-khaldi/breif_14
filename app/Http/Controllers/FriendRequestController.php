<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;


class FriendRequestController extends Controller
{
    public function send($receiver_id){
        $sender_id=auth()->id();
        if($sender_id == $receiver_id){
            return back()->with('error','Impossible');
        }
        $exists=FriendRequest::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->first();

        if($exists){
            return back()->with('error','Invitation déja envoyée');
        }else{
            FriendRequest::create(['sender_id'=>$sender_id,
                                    'receiver_id'=>$receiver_id,
                                    'status'=>'pending']);
            return back()->with('success','Invitation envoyée');
        }
    }

    public function recevoir(){
        $requests= FriendRequest::where('receiver_id',auth()->id())->where('status','pending')->get();
        return view('afficheRequests',compact('requests'));
        
    }

    //accepte invitation
    public function accept($id){
        $request = FriendRequest::find($id);

        if ($request && $request->receiver_id == auth()->id()) {
            $request->status = 'accepted';
            $request->save();
        }

        return back();
    }

    // Refuser invitation
    public function refuse($id){
        $request = FriendRequest::find($id);

        if ($request && $request->receiver_id == auth()->id()) {
            $request->status = 'refused';
            $request->save();
        }

        return back();
    }

    //all friends
    public function friends(){

        $friends = FriendRequest::where('status','accepted')
            ->where(function($q){
                $user_id= auth()->id();
                $q->where('receiver_id',$user_id)
                ->orWhere('sender_id',$user_id);
            })
            ->get();

        $friend_ids = $friends->pluck('sender_id')
            ->merge($friends->pluck('receiver_id'))
            ->unique()
            ->filter(fn($id) => $id != $user_id);

        $users = \App\Models\User::whereIn('id',$friend_ids)->get();
      
        return view('friends', compact('users'));
    }




    
    
}