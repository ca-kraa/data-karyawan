<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function dataJabatan()
    {
        $jabatan = Jabatan::all();

        return response()->json($jabatan);
    }

    public function indexJabatan()
    {
        $jabatan = Jabatan::all();
        return view('jabatan', compact('jabatan'));
    }

    public function detailJabatan($id)
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return response()->json(['message' => 'Jabatan not found'], 404);
        }

        return response()->json(['message' => 'Success', 'data' => $jabatan], 200);
    }


    public function createJabatan(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required',
        ]);

        $jabatan = new Jabatan([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        $jabatan->save();

        if ($jabatan) {
            return response()->json(['message' => 'Berhasil Menambahkan Data Jabatan', 'data' => $jabatan], 201);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data Jabatan'], 500);
        }
    }

    public function updateJabatan(Request $request, $id)
    {
        $request->validate([
            "nama_jabatan" => 'required',
        ]);

        $jabatan = Jabatan::findOrFail($id);

        $jabatan->nama_jabatan = $request->nama_jabatan;

        $jabatan->save();

        if ($jabatan) {
            return response()->json(['message' => 'Berhasil Memperbarui Data Jabatan', 'data' => $jabatan], 200);
        } else {
            return response()->json(['message' => 'Gagal Memperbarui Data Jabatan'], 500);
        }
    }

    public function deleteJabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $jabatan->delete();

        return response()->json(['message' => 'Berhasil Menghapus Data Jabatan'], 200);
    }

    public function countJabatan()
    {
        $count = Jabatan::count();

        return response()->json($count);
    }
}
