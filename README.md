# microservices
### Laravel - Lumen based RabbitMq AMQP microservices platform for any small application. Lumen [a micro framework based on Laravel for microservices application].

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
sudo service rabbitmq-server restart```

```composer update``` 


