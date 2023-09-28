<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Service\EthereumService;
use Illuminate\View\View;
use stdClass;
use DateTime;

class AddressController extends Controller
{
    public function __construct(private readonly EthereumService $service) {}

    public function home()
    {
        return view('searchAddress', [
            'data' => 'test'
        ]);
    }

    public function getAddressData(Request $request): RedirectResponse|View
    {
        $formFields = $request->validate([
            'searchAddress' => 'required',
            'fromBlock' => 'required',
            'currentBlock' => 'required',
            'date' => ''
        ]);

        $data = $this->service->getEthData($formFields);

        if (isset($formFields['date'])) {
            return $this->getBlock($formFields);
        }

        if (!$formFields) {
            return back()->withErrors(["Error" => "Form error"]);
        }

        $array = [];
        foreach ($data->result as $item) {
            $object = new stdClass();
            $object->from = $item->from;
            $object->to = $item->to;
            $object->ethValue = $this->wei2eth($item->gasPrice);

            $array[] = $object;
        }

        return view('result', [
            'apiData' => $array,
        ]);
    }

    public function getBlock($formFields)
    {
        $date = new DateTime($formFields['date']);
        $blockId = $this->service->getBlockByTimestamp($date->getTimestamp());
        $result = $this->service->getTransactionsByTimestamp($formFields['searchAddress'], $blockId->result);

        return view('result', [
            'apiData' => $result->result,
        ]);
    }

    function wei2eth($wei): ?string
    {
        return bcdiv($wei,'1000000000000000000',18);
    }
}
