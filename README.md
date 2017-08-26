# microservices
### Laravel - Lumen based RabbitMq AMQP microservices platform for any small application. 
#### Lumen [a micro framework based on Laravel for microservices application].
This can be used practcally in differnt servers. Say the scenario when you need to send millions of sms or need to process millions of mail from contact us. Then we should not make our main server busy for this long process job. Better to distribute these process in other server(s). Where our AMQP [RabbitMq] will help to create channel and pushed all work to an queue. And other process which need to send sms or mail will process one by another from amqp messages queue.

## How to install
### Installing 

#### RabbitMQ Server
```echo "deb http://www.rabbitmq.com/debian/ testing main"  | sudo tee  /etc/apt/sources.list.d/rabbitmq.list > /dev/null
sudo wget http://www.rabbitmq.com/rabbitmq-signing-key-public.asc
sudo apt-key add rabbitmq-signing-key-public.asc
sudo apt-get update
sudo apt-get install rabbitmq-server -y
sudo service rabbitmq-server start
sudo rabbitmq-plugins enable rabbitmq_management
sudo service rabbitmq-server restart
```
#### Install Application
```
From root of your application:

composer update

chmod -R 775 *
``` 
#### How to run

1. Open a browser and run your application virtual host eg. http://blog.dev/contact [mine in localhost]

2. Open another tab in browser or other browser and open /send eg. http://blog.dev/contact/send [mine in localhost]

3. Come back to contact form page and enter details and submit. It will show that message sent. But actually it pushed the job to RabbitMq channel queue to serve. 

4. Go to send tab and resend the browser. Now it will consume the message from channel and send mails and show you the success message also stop the channel after sending ackwl to rabbitmq channel. So that even server crash it will send ackw after receive the message.

#### References 
https://www.rabbitmq.com/
https://www.binpress.com/tutorial/getting-started-with-rabbitmq-in-php/164
https://lumen.laravel.com/

If you have any question or suggestion kindly contact me to : dhiraj dot patra @ gmail dot com

~enjoy :)




