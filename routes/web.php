<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('example/{name}', 'ExampleController@github');

$app->get('contact', [
    'as' => 'contact',
    'uses' => 'ContactController@create'
]);

$app->post('contact', [
    'as' => 'contact_store',
    'uses' => 'ContactController@store'
]);

$app->get('contact/send', [
    'as' => 'contact_send',
    'uses' => 'ContactController@send'
]);

//Amqp::publish('routing-key', 'message');

//Amqp::publish('routing-key', 'this is a test message' , ['queue' => 'test-queue']);

//Amqp::publish('routing-key', 'message' , ['exchange' => 'amq.direct']);


/*Amqp::consume('test-queue', function ($message, $resolver) {

    var_dump($message->body);

    $resolver->acknowledge($message);

    $resolver->stopWhenProcessed();

});*/


/*Amqp::consume('queue-name', function ($message, $resolver) {

    var_dump($message->body);

    $resolver->acknowledge($message);

});*/

/*Amqp::consume('queue-name', function ($message, $resolver) {

    var_dump($message->body);

    $resolver->acknowledge($message);

}, [
    'timeout' => 2,
    'vhost'   => 'vhost3'
]);*/
