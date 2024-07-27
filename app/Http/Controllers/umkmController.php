<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class umkmController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm?nama=$request->nama&jenis=$request->jenis");

        $data = json_decode($response1->getBody());

        // Convert API data to collection
        $collection = collect($data->data->resource);

        // Set the current page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Define how many items we want to be visible in each page
        $perPage = 5;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Create paginator
        $paginatedItems = new LengthAwarePaginator($currentPageItems, $collection->count(), $perPage);
        
            $paginatedItems->setPath($request->url());

        // Append request parameters to pagination links
        return view('umkm', [
            'data' => $data,
            'paginatedItems' => $paginatedItems,
        ]);
    }
}
