<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use URL;
use App\Click;
use App\BadDomain;
class ClickController extends Controller
{

    public function index(){
        return view('clicks',
            [
                'clicks' =>  Click::orderBy('created_at')->paginate(10),
            ]);
    }

    public function success($id){
        return view('success',
            [
                'click' => Click::where('uid', $id)->firstOrFail()
            ]);
    }

    public function error($id, Request $Request){
        return view('error',
            [
                'click' => Click::where('uid', $id)->firstOrFail(),
                'e_code' => $Request->get('e_code'),
            ]);
    }

    public function click(Request $request, Click $Click){
        $user_agent = $request->header('user-agent');
        $ip = $request->ip();
        $referer = URL::previous();
        $param1 = $request->get('param1');
        $param2 = $request->get('param2');
        $uid = rand();

        $data = [
            'user_agent' => $user_agent,
            'ip' => $ip,
            'referer' => $referer,
            'param1' => $param1,
            'param2' => $param2,
            'uid' => $uid,
        ];

        $current_click = Click::where('user_agent', $user_agent)
            ->where('ip', $ip)
            ->where('referer', $referer)
            ->where('param1', $param1)
            ->first();

        if(!isset($current_click->id)){
            //unique click
            $Click->create($data);
            return redirect()->route('success', ['id' => $uid]);
        }else{
            // NOT unique click
            Click::find($current_click->id)->increment('errors');
            $error_id = Click::find($current_click->id)->uid;

            $bad_domain = BadDomain::where('name', parse_url($referer)['host'])->first();
            if(isset($bad_domain)){
                Click::find($current_click->id)->increment('bad_domains');
                return redirect()->route('error', ['id' => $error_id, 'e_code' => '1']);
            }
            return redirect()->route('error', ['id' => $error_id]);
        }
    }
}
