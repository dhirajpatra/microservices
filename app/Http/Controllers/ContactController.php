<?php
/**
 * Created by PhpStorm.
 * User: tanushreepatra
 * Date: 25/8/17
 * Time: 8:16 AM
 */

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bschmitt\Amqp\Facades\Amqp as Amqp;
//use PhpAmqpLib\Connection\AMQPConnection as Connection;
//use PhpAmqpLib\Message\AMQPMessage as Message;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * show the contact us form
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contact.index', ['sent' => null]);
    }

    /**
     * send and push the message to amqp rabbitmq
     */
    public function store()
    {

        try {
            $data = json_encode($_POST); //print_r($data);

            Amqp::publish('contacts', $data , ['queue' => 'email_queue']);

            return view('contact.index', ['sent' => 'Your message was sent!']);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * send the mail
     */
    public function send()
    {
        try { 

            echo ' * Waiting for messages.', "<br>";

            //Amqp::consume('email-queue', $callback);
            Amqp::consume('email_queue', function ($message, $resolver) {

                echo "<br> * Message received", "<br>";
                $data = json_decode($message->body, true);

                $body = $data['message'];

                Mail::send('contact.welcome', array('body'=> $body), function($message) use ($data)
                {
                    $from = $data['name'];
                    $email = $data['email'];
                    $subject = $data['subject'];

                    $message->from( $email, $from );

                    $message->to('dhiraj.patra@gmail.com', 'Dhiraj')->subject( $subject );
                });

                Mail::raw($body, function($message) use ($data)
                { 
                    $from = $data['name'];
                    $email = $data['email'];
                    $subject = $data['subject'];

                    $message->from( $email, $from );

                    $message->to('dhiraj.patra@gmail.com', 'Dhiraj')->subject( $subject );
                });


                var_dump($data);

                echo " * Message was sent", "<br>";

                $resolver->acknowledge($message);

                $resolver->stopWhenProcessed();

            }, ['no_ack' => false]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}