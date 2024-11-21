<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;
class Currency{
    const CURRENCY_API_URL = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
    public $client;
    public array $currencies = [];
    public function __construct(){
        $this->client = new Client([
            'base_uri' => self::CURRENCY_API_URL,
            'timeout'  => 2.0,
        ]);

        $request = $this->client->request('GET');

        $this->currencies = json_decode($request->getBody()->getContents());
    }
    public function getCurrencies(): array {
        $separated_data = [];
        $currencies_info = $this->currencies;
        foreach($currencies_info as $currency){
            $separated_data[$currency->Ccy] = $currency->Rate;
        }
        return $separated_data;
    }
    public function exchange (string $from,string $to, int $amount): float|int|string {
        if ($from == $to){
            return "Ikki valyuta har xil bo'lishi kerak emas";
        }
        if ($from == 'UZS'){
            return $amount / (int)$this->getCurrencies()[$to];
        }elseif ($to == 'UZS'){
            return $amount * (int)$this->getCurrencies()[$from];
        }
        return "Ikkisidan biri o'zbek sumi bo'lishi shart";
    }
}





