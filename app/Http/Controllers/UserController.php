<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Upload;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    public function getUsers()
    {
        $users = User::select('id', 'name', 'email', 'role')->get();

        return response()->json($users);
    }


    public function index(Request $request)
    {
        $cityName = $request->input('cityName');
        $apiKey = 'fc23f5df-8b39-4d92-b5d2-161574b7244d';

        $response = Http::get('http://api.airvisual.com/v2/city', [
            'city' => $cityName,
            'state' => 'West Java',
            'country' => 'Indonesia',
            'key' => $apiKey,
        ]);

        $data = $response->json();

        // Cek apakah nama kota ditemukan dalam respons API
        if (!isset($data['data']['city'])) {
            throw new \Exception('Nama kota tidak ditemukan. Silahkan pilih kota lain.');
        }


        //cek user prem
        $user = Auth::user();
        $isPremium = $user && $user->role === 'premium';

        // Mendapatkan informasi AQI US dari respons API
    $aqius = $data['data']['current']['pollution']['aqius'] ?? null;

    $background = '';
    $bg = '';
    $text = '';
    $contentNotif = 'Tidak Ada Notifikasi';

    if ($aqius >= 0 && $aqius <= 50) {
        $background = '#A8E05F';
        $bg = '#87C13C';
        $text = 'Baik';
        $contentNotif = 'Lingkungan disekitar anda cukup baik!';
    } elseif ($aqius >= 51 && $aqius <= 100) {
        $background = '#FDD64B';
        $bg = '#EFBE1D';
        $text = 'Sedang';
        $contentNotif = 'Tempat di sekitar anda terlihat baik!';
    } elseif ($aqius >= 101 && $aqius <= 150) {
        $background = '#FF9B57';
        $bg = '#F27E2F';
        $text = 'Tidak sehat bagi kelompok sensitif';
        $contentNotif = 'Tetap waspada!';
    } elseif ($aqius >= 151 && $aqius <= 200) {
        $background = '#FE6A69';
        $bg = '#E84B50';
        $text = 'Tidak sehat';
        $contentNotif = 'Anda berada dalam kawasan wajib memakai masker!';
    }

    // Kirim data ke tampilan hasil pencarian
    return view('index', [
        'cityName' => $cityName,
        'aqius' => $aqius,
        'background' => $background,
        'background_color' => $bg,  // Ubah dari 'background-color' ke 'background_color'
        'text' => $text,
        'isPremium' => $isPremium,
        'contentNotif' => $contentNotif,
        // 'status' => $user->status,
    ]);
    }
}
    

