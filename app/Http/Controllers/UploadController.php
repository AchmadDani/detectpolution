<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{

public function upload(Request $request)
{
    try {
        // Periksa apakah pengguna sudah melakukan upload sebelumnya
        $existingUpload = Upload::where('user_id', auth()->id())->first();

        // Jika pengguna sudah melakukan upload, kembalikan response dengan pesan kesalahan
        if ($existingUpload) {
            throw new \Exception('Anda sudah melakukan upload sebelumnya. Silahkan menunggu verifikasi dari admin');
        }

         // Jika gambar tidak diunggah
         if (!$request->hasFile('image')) {
            throw new \Exception('Pilih gambar terlebih dahulu');
        }

        // Jika pengguna belum melakukan upload, lakukan proses upload
        $upload = new Upload();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $upload->image = 'images/' . $filename;
            $upload->user_id = auth()->id();
        }
        $upload->save();

        // Tambahkan pesan keberhasilan ke dalam session
    Session::flash('success', 'Pembayaran berhasil silahkan menunggu dan cek secara berkala');

        // Redirect back to the previous page
        return redirect()->back();
    } catch (\Exception $e) {
        // Tambahkan pesan kesalahan ke dalam session
        Session::flash('error', $e->getMessage());

        // Redirect back to the previous page with error message
        return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }
}



}