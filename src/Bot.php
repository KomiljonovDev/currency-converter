<?php
require "vendor/autoload.php";
require "src/DB.php";
use GuzzleHttp\Client;

class Bot {
    const API_URL = 'https://api.telegram.org/bot';
    private $token = '7500571910:AAHkgCg7PsTlH91ltgQlaDzBWT6-tljwtmY';
    public $client;
    public function makeRequest($method, $data = []) {
        $this->client = new Client([
            'base_uri' => self::API_URL . $this->token . '/',
            'timeout'  => 2.0,
        ]);

        $request = $this->client->request('POST', $method, ['json' => $data]);

        return json_decode($request->getBody()->getContents());
    }
    public function saveUser($user_id, $username): bool {
        $query = "INSERT INTO tg_users (user_id, username) VALUES (:user_id, :username)";
        $db = new DB();
        return $db->conn->prepare($query)->execute([
            ':user_id' => $user_id,
            ':username' => $username
        ]);
    }
}
