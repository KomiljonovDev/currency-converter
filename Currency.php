<?php
class Currency{
    const CURRENCY_API_URL = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
    public array $currencies = [];
    public function __construct(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::CURRENCY_API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $this->currencies = json_decode($output);
    }
    public function getCurrencies(): array {
        $separated_data = [];
        $currencies_info = $this->currencies;
        foreach($currencies_info as $currency){
            $separated_data[$currency->Ccy] = $currency->Rate;
        }
        return $separated_data;
    }
    public function exchange (string $from,string $to, int $amount) {
        if ($from == $to){
            return "Ikki valyuta har xil bo'lishi kerak";
        }
        if ($from == 'UZS'){
            return $amount / (int)$this->getCurrencies()[$to];
        }elseif ($to == 'UZS'){
            return $amount * (int)$this->getCurrencies()[$from];
        }
        return "Ikkisidan biri o'zbek sumi bo'lishi shart";
    }
}





