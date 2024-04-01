<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use Illuminate\Http\Request;

class DepartmenController extends Controller
{
    public function indexDepartmen()
    {
        $departmen = Departmen::all();

        return response()->json($departmen);
    }

    public function createDepartment(Request $request)
    {
        $request->validate([
            "nama_departmen" => "required",
        ]);

        $departmen = new Departmen([
            "nama_departmen" => $request->nama_departmen,
        ]);

        $departmen->save();

        if ($departmen) {
            return response()->json(['message' => 'Berhasil Menambahkan Data Departmen', 'data' => $departmen], 201);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data Departmen'], 500);
        }
    }

    public function updateDepartmen(Request $request, $id)
    {
        $request->validate([
            "nama_departmen" => 'required',
        ]);

        $departmen = Departmen::findOrFail($id);

        $departmen->nama_departmen = $request->nama_departmen;

        $departmen->save();

        if ($departmen) {
            return response()->json(['message' => 'Berhasil Memperbarui Data Departmen', 'data' => $departmen], 200);
        } else {
            return response()->json(['message' => 'Gagal Memperbarui Data Departmen'], 500);
        }
    }

    public function deleteDepartmen($id)
    {
        $departmen = Departmen::findOrFail($id);

        $departmen->delete();

        return response()->json(['message' => 'Berhasil Menghapus Data Departmen'], 200);
    }

    public function countDepartmen()
    {
        $count = Departmen::count();

        return response()->json($count);
    }
}
