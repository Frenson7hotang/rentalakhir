<?php

namespace App\Http\Controllers;

Use DB;
Use Alert;

use App\Models\Type;
use App\Models\Mobil;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function type_mobil()
    {
        $type = Type::all();

        return view('type_mobil', ['type' => $type]);
    }
    public function tambah_type()
    {
        return view('tambah_type');
    }
    public function tambah(Request $request){
        $this->validate($request, [
            'nama_type' => 'required',
            'kode_type' => 'required',
        ]);

        Type::create([
            'nama_type' => $request->nama_type,
            'kode_type' => $request->kode_type
        ]);
        Alert::info('Selamat', 'Kamu Berhasil Menambakhan Tipe Mobil');
        return redirect('/type_mobil');
    }
    public function edit_type($id)
    {
        $type = Type::find($id);

        return view('edit_type', ['type' => $type]);
    }
    public function update_type($id, Request $request)
    {
    $this->validate($request,[
	   'nama_type' => 'required',
	   'kode_type' => 'required'
    ]);
 
    $type = Type::find($id);
    $type->nama_type = $request->nama_type;
    $type->kode_type = $request->kode_type;
    $type->save();
    Alert::success('Selamat', 'Data Kamu Berhasil Di Edit!!');
    return redirect('/type_mobil');
    }
    public function delete_type($id)
    {
        $type = Type::find($id);
        $type->delete();
        Alert::warning('Berhasil!!', 'Data Kamu Berhasil Di Hapus!!');
        return redirect('type_mobil');
    }
}
