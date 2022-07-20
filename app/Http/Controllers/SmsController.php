<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

// use Config;

class SmsController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function showSendPage() {
        return view('send');
    }

    public function showLookupPage() {
        return view('lookup');
    }

    public function showStatusPage() {
        return view('status');
    }


    public function sendSMS(Request $request) {
        $this->validate($request, [
            'phone' => 'required',
            'sms' => 'required',
        ]);

        $data = [
            "user" => Config::get('sms.username'),
            "pass" => Config::get('sms.password'),
            "from" => Config::get('sms.from'),
            "to" => $request->phone,
            "msg" => $request->sms,
            // "callback_url" => "/api/v1/sms/dlr/holla_tags/94277953-3abb-4f5a-8fdd-68adb898f6cf.2349092951511",
            // "enable_msg_id" => "true"
        ];

        $url = 'https://sms.hollatags.com/api/send/'; //this is the url of the gateway's interface

        $ch = curl_init(); //initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //set the POST variables
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method

        try {
            $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
            curl_close($ch); //close the curl handle
        
            return redirect('send')->with(['message' => $response]);
        } catch (\Throwable $th) {
            return redirect('send')->with(['message' => 'Something went wrong. Error: "'. $response . '" occured!' ]);
        }

        // if ($response == 'sent') {
            // return redirect('send')->with(['message' => 'SMS sent Successfully']);
        // }
        // return redirect('send')->with(['message' => 'Something went wrong. Error: "'. $response . '" occured!' ]);
    }

    public function status(Request $request) {
        $this->validate($request, [
            'msgid' => 'required',
        ]);

        $data = [
            "user" => Config::get('sms.username'),
            "pass" => Config::get('sms.password'),
            "msgid" => $request->msgid,
        ];

        $url = 'https://sms.hollatags.com/api/report/'; //this is the url of the gateway's interface

        $ch = curl_init(); //initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //set the POST variables
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method


        $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
        curl_close($ch); //close the curl handle

        return redirect('status')->with(['message' => $response]);
    }

    public function lookup(Request $request) {
        // dd($request);
        
        $this->validate($request, [
            'msisdn' => 'required',
        ]);
        
        $data = [
            "user" => Config::get('sms.username'),
            "pass" => Config::get('sms.password'),
            "msisdn" => $request->msisdn,
        ];

        $url = 'https://sms.hollatags.com/api/lookup/'; //this is the url of the gateway's interface

        $ch = curl_init(); //initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //set the POST variables
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method


        $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
        curl_close($ch); //close the curl handle

        return redirect('lookup')->with(['message' => $response]);
    }

    public function checkCredit() {
        $data = [
            "user" => Config::get('sms.username'),
            "pass" => Config::get('sms.password'),
        ];

        $url = 'https://sms.hollatags.com/api/credit/'; //this is the url of the gateway's interface

        $ch = curl_init(); //initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //set the POST variables
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method


        $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
        curl_close($ch); //close the curl handle

        return view('welcome')->with(['message' => $response]);
    }

    public function otp() {
        $data = [
            "user" => Config::get('sms.username'),
            "pass" => Config::get('sms.password'),
        ];

        $url = 'https://sms.hollatags.com/api/otp/'; //this is the url of the gateway's interface

        $ch = curl_init(); //initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //set the POST variables
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method


        $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
        curl_close($ch); //close the curl handle

        return redirect('lookup')->with(['message' => $response]);
    }
}
