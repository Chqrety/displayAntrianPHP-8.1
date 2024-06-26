<?php

namespace App\Http\Controllers;

use App\Events\AntrianDataUpdate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        // URL API
        $baseUrl = URL::to('/');
        $messages = [
            'Welcome to our website!',
            'Latest news: Laravel 11 is released!',
            'Check out our new features!'
        ];

        return view('pages.display.index', compact('messages', 'baseUrl'));
    }

    public function data(Request $request)
    {
        // Mendapatkan data yang diterima dari permintaan
        $receivedData = $request->all();

        // Dekode data jika data dalam format JSON
        if (is_string($receivedData)) {
            $decodedData = json_decode($receivedData, true);
        } else {
            $decodedData = $receivedData;
        }

        // Ambil data dari cache
        $cachedData = Cache::get('antrian_data', []);

        // Periksa apakah data cache sudah mencapai lima
        if (count($cachedData) >= 10) {
            // Jika sudah sepuluh, hapus data terakhir
            array_pop($cachedData);
        }

        // Tambahkan timestamp ke data yang diterima
        $decodedData['timestamp'] = now()->timestamp;

        // Tambahkan data baru ke awal array
        array_unshift($cachedData, $decodedData);

        // Simpan data yang telah diperbarui ke dalam cache
        Cache::put('antrian_data', $cachedData);

        // Simpan timestamp terbaru untuk deteksi perubahan
        Cache::put('latest_data_timestamp', $decodedData['timestamp']);

        return response()->json(['message' => 'Data received and cached.']);
    }
    public function getData()
    {
        // Ambil data dari cache
        $cachedData = Cache::get('antrian_data', []);

        // Dekode data jika data dalam format JSON
        if (is_string($cachedData)) {
            $decodedData = json_decode($cachedData, true);
            return response()->json($decodedData);
        }

        return response()->json($cachedData);
    }

    public function deleteData()
    {
        // Lakukan logika untuk menghapus data
        Cache::forget('antrian_data');

        // Berikan respons sesuai kebutuhan, misalnya:
        return response()->json(['message' => 'Data deleted successfully']);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
