<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\interviewMailController;
use Illuminate\Support\Facades\Mail;
use Session;
use Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class interviewerEmail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sendtest(Request $request)
    {

        // input fields
        $emailToName = $request->input('emailtoName');
        $emailToEmail = $request->input('emailtoEmail');

        $emailFrom = $request->input('emailfrom');
        $emailFromName = $request->input('emailfromname');
         // input fields

        
        // $data = array(
        //     'name'=>"PEMS 22"
        // );
   
        // Mail::send('vendor/mail/interviewerEmailTemplate', $data, function($message) 
        // use ($emailToEmail, $emailFromName,$emailToName) {
        //    $message->to($emailToEmail, $emailToName)->subject
        //       ('Test Mail Sending');
        //    $message->from('notifications@neodev.space','PEMS');
        // });

        $iterviewerTestMail = new \stdClass();
        // $iterviewerTestMail->name = 'PEMS 22';
 
        Mail::to($emailToEmail)->send(new interviewMailController($iterviewerTestMail));

      
        session::flash('emailseccess', 'Test email sent successfully to '.$emailToEmail);
        return redirect::back();

    }


    public function index2()
    {
      
        $mail = new PHPMailer; // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "tls"; // or ssl
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // most likely something different for you. This is the mailtrap.io port i use for testing. 
            $mail->Username = "daratest746@gmail.com";
            $mail->Password = "admin746#";
            $mail->setFrom("dilawar@blackcapit.com", "Firstname Lastname");
            $mail->Subject = "Test";
            $mail->MsgHTML("This is a test");
            $mail->addAddress("dilawar@blackcapit.com", "Recipient Name");
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
        die('success');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
