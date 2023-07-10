<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnswerMail;

class MessageController extends Controller
{

    public function index($id){
        $this->data['message']=Message::find($id);
        return view('pages.admins.answerMessage',['data'=>$this->data]);
    }
    public function sendMessage(Request $request){
        $name = $request->name;
        $email = $request->email;
        $subject=$request->subject;
        $message = $request->message;

        try {
            $newMessage = Message::create([
                'name'=>$name,
                'email'=>$email,
                'subject'=>$subject,
                'text'=>$message,
                'is_answered'=>0
            ]);
            $newMessage -> save();
            return Response::json(array('status'=>201,'message'=>'Dobar insert!'));
        }catch (QueryException $e){
            \DB::rollback();
            return Response::json(array('status'=>409,'message'=>$e->getMessage()));
        }
    }

    public function sendAnswer(Request $request){
        try {
            $id=$request->messageId;
            $id=substr($id,12);
            $name=$request->name;
            $nameSend=substr($name,6);
            $email=$request->email;
            $email=substr($email,7);
            $text=$request->text;
            $message=$request->message;

            Mail::to($email)->send(new AnswerMail($nameSend,$text,$message)); //Mailovi se salju na mailtrap
            \DB::table('messages')
                ->where('messages.message_id','=',$id)
                ->update([
                    'is_answered'=>1
                ]);

            return true;
        }catch(\Exception $e){
            return false;
        }

    }
}
