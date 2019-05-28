<?php

namespace App\Http\Controllers;

use App\Entities\Endpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function createUpdate(Request $request)
    {
        $this->validateInput($request);

        $endpoint = Endpoint::where([
            'url' => $request->get('url'),
            'status' => (int) $request->get('status'),
            'method' => $request->get('method'),
        ])->first();

        if (! $endpoint) {
            $endpoint = new Endpoint();
        }

        $endpoint->url = $request->get('url');
        $endpoint->accessibility = $request->get('accessibility');
        $endpoint->status = $request->get('status');
        $endpoint->method = $request->get('method');
        $endpoint->name = $request->get('name');
        $endpoint->success = $request->get('success');
        $endpoint->response = json_encode($request->get('response'));

        $endpoint->save();

        return response()->json(['success' => true]);
    }

    public function index(Request $request)
    {
        return response()->json(Endpoint::all());
    }

    public function show(Request $request, $id)
    {
        return response()->json(Endpoint::find($id));
    }

    public function search(Request $request)
    {

    }

    public function customRoute(Request $request)
    {
        dd($request->path());
    }

    public function validateInput(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'url' => 'required',
            'status' => 'required',
            'method' => 'required',
            'success' => 'required',
            'response' => 'required',
        ])->validate();
    }

}
