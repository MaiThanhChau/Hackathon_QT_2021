<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Chats;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){ 
        $items = Chats::where('user_id','=',1)->orwhere('to_user_id','=',1)->get();
        $current_user_id = Auth::id();

        $last_id = session('last_id',0);
        
        
        return view('website.index', compact('items','current_user_id','last_id'));
    }
    public function input(Request $request){       
        $input = $request->input;


        //phân tích từ khóa và tìm kiếm
        $question = Question::where('question', 'like', "%$input%")->first();
        
        
        $current_user_id = Auth::id();
        

        //lưu tin nhắn của người dùng
        $chat = new Chats();
        $chat->user_id = $current_user_id;
        $chat->to_user_id = 0;
        $chat->content = $input;
        $chat->save();


        //bot trả lời
        $chat = new Chats();
        $chat->user_id = 0;
        $chat->to_user_id = $current_user_id;

        if( $question ){
            $total_answers = $question->answer->count();

            //trả về kết quả ngẫu nhiên
            $index = rand(0,$total_answers - 1);
			
			if( $question->answer && isset( $question->answer[$index] ) ){
				$answer = $question->answer[$index];

				$chat->content = $answer->answer;
				if( $answer->file ){
					$chat->file = $answer->file;
				}
			}else{
				$chat->content = 'Bạn có thể đặt câu hỏi khác được không';
				$chat->file = 'source/notfound.mp3';
			}
            
        }else{
            $chat->content = 'Bạn có thể đặt câu hỏi khác được không';
            $chat->file = 'source/notfound.mp3';
        }

        $chat->save();

        

        session(['last_id' => $chat->id]);

        return redirect()->route('Home');
    }

    private function _get_random(){

    }
  
}
