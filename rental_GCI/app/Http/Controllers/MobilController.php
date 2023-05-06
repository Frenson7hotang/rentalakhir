<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Type;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Mobil::where('merekmobil','LIKE','%'.$request->search.'%')->paginate(5);
            Session::put('halaman_url',request()->fullUrl());
        }else{
            $data = Mobil::paginate(5);
            Session::put('halaman_url',request()->fullUrl());
        }
            return view('mobil', compact('data'));
    }

    public function tambahmobil(){
        $type = Type::all();

        return view('tambah_mobil', ['type' => $type]);
    }

    public function tambahdata(Request $request){
        
    $this->validate($request, [
        'merekmobil' => 'required|min:5|max:30',
        'type_id' => 'required',
        'warna' => 'required|min:1|max:12',
        'harga' => 'required|min:6|max:12',
             ]);
        // dd($request->all());
        $data = Mobil::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('gambar/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('mobil')->with('success','Data Berhasil Ditambahkan!');
    }

    public function tampilkandata($id){
        $type = Type::all();
        $data = Mobil::find($id);
        return view('tampildata', ['type' => $type], compact('data'));
    }
    public function perbaharuidata(Request $request, $id){
        $data = Mobil::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success','Data Berhasil Diubah!');
        }
        return redirect()->route('mobil')->with('success','Data Berhasil Diubah!');
    }

    public function hapus($id){
        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect()->route('mobil')->with('success','Data Berhasil Dihapus!');
    }

    public function exportpdfmobil(){
        $data = Mobil::all();
        view()->share('data',$data);
        $pdf = PDF::loadview('datamobil-pdf');
        return $pdf->download('data.pdf');
    }
}
