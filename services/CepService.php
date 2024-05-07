<?php

Class CepService
{
  public static function consultaCep($cep)
  {
      $url = "https://viacep.com.br/ws/{$cep}/json/";

      $curl = curl_init();
      curl_setopt_array($curl, [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
              "accept: application/json",
              "content-type: application/json"
          ],
      ]);

      $response = curl_exec($curl);

      if ($response === false) {
          throw new \Exception('Curl error: ' . curl_error($curl));
      }

      curl_close($curl);

      $response_json = json_decode($response);

      return $response_json;

  }
}