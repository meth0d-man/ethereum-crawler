<?php

namespace App\Service;

use GuzzleHttp\Client;
class EthereumService
{
    public function getEthData(array $data)
    {
        $client = new Client();
        $apiResponse = $client->get('https://api.etherscan.io/api?module=account&action=txlist&address=' . $data['searchAddress'] . '&startblock=' . $data['fromBlock'] . '&endblock=' . $data['currentBlock'] . '&page=1&offset=10&sort=asc&apikey=XW4EUN6EKNNPHPYAMAXQRKAIHMA2JT83VN');

        return json_decode($apiResponse->getBody()->getContents());
    }

}
