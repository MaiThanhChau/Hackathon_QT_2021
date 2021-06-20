<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Chats;
class HomeController extends Controller
{
    public function index(){ 
        $items = Chats::where('user_id','=',1)->orwhere('to_user_id','=',1)->get();
        $current_user_id = 1;
        
        return view('website.index', compact('items','current_user_id'));
    }
    public function input(Request $request){       
        $input = $request->input;

        //lưu tin nhắn của người dùng
        $chat = new Chats();
        $chat->user_id = 1;
        $chat->to_user_id = 0;
        $chat->content = $input;
        $chat->save();

        
        $answer = 'xin chào';
        //bot trả lời
        $chat = new Chats();
        $chat->user_id = 0;
        $chat->to_user_id = 1;
        $chat->content = $answer;
        $chat->save();
        return redirect()->route('Home');
    }
    public function login(){ 
        return view('website.login');
    }
}
