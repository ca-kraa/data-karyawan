<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function indexKaryawan()
    {
        $karyawan = Karyawan::all();

        return response()->json($karyawan);
    }

    public function indexKaryawan2()
    {
        $karyawan = Karyawan::all();

        return view('karyawan', compact('karyawan'));
    }

    public function createKaryawan(Request $request)
    {
        $request->validate([
            "id_jabatan" => 'required',
            "id_departmen" => 'required',
            "nama_lengkap" => 'required',
            "alamat" => 'required',
            "tanggal_lahir" => 'required|date',
            "nomor_handphone" => 'required|numeric',
            "email" => 'required',
            "dokumen" => 'required|file',
        ]);

        $karyawan = new Karyawan([
            "id_jabatan" => $request->id_jabatan,
            "id_departmen" => $request->id_departmen,
            "nama_lengkap" => $request->nama_lengkap,
            "alamat" => $request->alamat,
            "tanggal_lahir" => $request->tanggal_lahir,
            "nomor_handphone" => $request->nomor_handphone,
            "email" => $request->email,
        ]);

        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('dokumen', 'public');
            $karyawan->dokumen = $dokumenPath;
        }

        $karyawan->save();

        if ($karyawan) {
            return response()->json(['message' => 'Berhasil Menambahkan Data Karyawan', 'data' => $karyawan], 201);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data Karyawan'], 500);
        }
    }

    public function updateKaryawan(Request $request, $id)
    {
        $request->validate([
            "id_jabatan" => 'nullable',
            "id_departmen" => 'nullable',
            "nama_lengkap" => 'nullable',
            "alamat" => 'nullable',
            "tanggal_lahir" => 'nullable|date',
            "nomor_handphone" => 'nullable|numeric',
            "email" => 'nullable',
            "dokumen" => 'nullable',
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->id_jabatan = $request->id_jabatan;
        $karyawan->id_departmen = $request->id_departmen;
        $karyawan->nama_lengkap = $request->nama_lengkap;
        $karyawan->alamat = $request->alamat;
        $karyawan->tanggal_lahir = $request->tanggal_lahir;
        $karyawan->nomor_handphone = $request->nomor_handphone;
        $karyawan->email = $request->email;


        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('dokumen', 'public');
            $karyawan->dokumen = $dokumenPath;
        }

        dd($karyawan);

        $karyawan->save();

        if ($karyawan) {
            return response()->json(['message' => 'Berhasil Memperbarui Data Karyawan', 'data' => $karyawan], 200);
        } else {
            return response()->json(['message' => 'Gagal Memperbarui Data Karyawan'], 500);
        }
    }

    public function detailKaryawan($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan not found'], 404);
        }

        return response()->json(['message' => 'Success', 'data' => $karyawan], 200);
    }


    public function deleteKaryawan($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        if ($karyawan->dokumen && Storage::disk('public')->exists($karyawan->dokumen)) {
            Storage::disk('public')->delete($karyawan->dokumen);
        }

        $karyawan->delete();

        return response()->json(['message' => 'Berhasil Menghapus Data Karyawan'], 200);
    }

    public function countKaryawan()
    {
        $count = Karyawan::count();

        return response()->json($count);
    }
}
