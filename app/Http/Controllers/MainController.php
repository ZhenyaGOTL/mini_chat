<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\Message;
class MainController extends Controller
{
    public function reg(Request $request){
      $cookie=cookie('name', $request->input('name'), 100, '/');
      return redirect('/chat')->cookie($cookie);
    }
    public function home(Request $request){
        if ($request->cookie('name')){
          return redirect('/chat');
        }else{
        return view('home');
        }
    }
    public function chat(Request $request){
            if ($request->cookie('name')){
               return view('chat');
            }else{
                return redirect('/');
            }
    }
    public function app_message(Request $request){
      $message=new Message();
      $message->name=$request->cookie('name');
      $message->message=$request->input('message');
      $message->save();
    }
    public function load_message(){
      $message=new Message();
      return response()->json($message->all());
    }
}
