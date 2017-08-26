# microservices
### Laravel - Lumen based RabbitMq AMQP microservices platform for any small application. 
#### Lumen [a micro framework based on Laravel for microservices application].

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



