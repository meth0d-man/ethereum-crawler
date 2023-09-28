<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Service\EthereumService;

class EthereumApiController extends Controller
{
    public function __construct(private readonly EthereumService $service) {}

    public function getAddressData()
    {
        return view('result', [
            'data' => $this->service->getEthData()
        ]);
    }

    public function test()
    {
        return $this->service->getEthData();
    }
}
