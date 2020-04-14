<?php

namespace App\Http\Controllers\Api;

use App\Helpers\API\BreweriesApiClient;
use App\Http\Controllers\Controller;
use App\Http\Resources\BreweriesCollection;
use App\Models\Brewery;
use Illuminate\Http\Request;

class BreweriesController extends Controller
{

    /**
     * @var BreweriesApiClient
     */
    private $apiClient;

    public function __construct(BreweriesApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->apiClient->sendRequest('GET', 'breweries');
        $data = Brewery::hydrate($data['body']);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Brewery $brewery
     * @return Brewery
     */
    public function show(Brewery $brewery)
    {
        return $brewery;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
