<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Service\EthereumService;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use stdClass;

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
            'currentBlock' => 'required'
        ]);

        $data = $this->service->getEthData($formFields);

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

    function wei2eth($wei): ?string
    {
        return bcdiv($wei,'1000000000000000000',18);
    }
}
