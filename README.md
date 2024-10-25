### Test API

This is a simple API for testing purposes. It has a single endpoint that returns a JSON response with a message.

#### Installation

1. Clone the repository
2. Run `docker-compose up -d`
3. Run `docker exec -it php bash -c 'composer install'`
4. Open `http://localhost:8080` in your browser: You should see a JSON response with a message `{"status":"error"}`
5. Run `curl -H "Content-Type: application/json" -d '{"source": "source", "payload": {"email": "example@example.com"}}' http://localhost:8080` you should see a JSON response with a message `{"status":"success"}`
6. Run `docker exec -it php bash -c './vendor/bin/phpunit'` to run the tests
7. Run `docker-compose down` to stop the containers