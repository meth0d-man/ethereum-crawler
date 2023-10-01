<?php

namespace App\Service;

use GuzzleHttp\Client;
class EthereumService
{
    public function getEthData(?array $data): mixed
    {
        $client = new Client();
        $apiResponse = $client->get('https://api.etherscan.io/api?module=account&action=txlist&address=' . $data['searchAddress'] . '&startblock=' . $data['fromBlock'] . '&endblock=' . $data['currentBlock'] . '&page=1&offset=10&sort=asc&apikey=XW4EUN6EKNNPHPYAMAXQRKAIHMA2JT83VN');

        return json_decode($apiResponse->getBody()->getContents());
    }

    public function getBlockByTimestamp(int $timestamp)
    {
        $client = new Client();
//        $apiResponse = $client->get('https://api.etherscan.io/api?module=block&action=getblocknobytime&timestamp=' . $timestamp . '&closest=before&apikey=XW4EUN6EKNNPHPYAMAXQRKAIHMA2JT83VN');
        $apiResponse = $client->get('https://api.etherscan.io/api?module=block&action=getblocknobytime&timestamp=1574709588&closest=before&apikey=XW4EUN6EKNNPHPYAMAXQRKAIHMA2JT83VN'); // HC TIMESTAMP TO SEE TRANSACTION DATA

        return json_decode($apiResponse->getBody()->getContents());
    }

    public function getTransactionsByTimestamp(string $address, string $blockId)
    {
        $client = new Client();
        $apiResponse = $client->get('https://api.etherscan.io/api?module=account&action=txlist&address=' . $address . '&startblock=' . $blockId . '&endblock=' . $blockId . '&page=1&offset=10&sort=asc&apikey=XW4EUN6EKNNPHPYAMAXQRKAIHMA2JT83VN');
//        $apiResponse = $client->get('https://api.etherscan.io/api?module=account&action=txlist&address=0xaa7a9ca87d3694b5755f213b5d04094b8d0f0a6f&startblock=9000165&endblock=9000165&page=1&offset=10&sort=asc&apikey=XW4EUN6EKNNPHPYAMAXQRKAIHMA2JT83VN'); // HC BLOCK TO SEE TRANSACTION ON DATE

        return json_decode($apiResponse->getBody()->getContents());
    }

}
