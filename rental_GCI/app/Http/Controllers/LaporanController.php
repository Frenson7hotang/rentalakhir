<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Laporan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan()
    {
        $laporan = Laporan::all();

        return view('laporan', ['laporan' => $laporan]);
    }
    public function tambahlaporan()
    {
        return view('tambah_laporan');
    }
    public function tambahdatalaporan(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'tanggal_pinjam' => 'required',
            'merekmobil' => 'required'
        ]);

        Laporan::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'merekmobil' => $request->merekmobil

        ]);
        Alert::success('Success', 'Data Berhasil Ditambahkan');

        return redirect('laporan');
    }
    public function edit_laporan($id)
    {
        $laporan = Laporan::find($id);

        return view('edit_laporan', ['laporan' => $laporan]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'tanggal_pinjam' => 'required',
            'merekmobil' => 'required'
        ]);
        Alert::success('Success', 'Data Berhasil Diubah');
        $laporan = Laporan::find($id);
        $laporan->nama = $request->nama;
        $laporan->jenis_kelamin = $request->jenis_kelamin;
        $laporan->alamat = $request->alamat;
        $laporan->nohp = $request->nohp;
        $laporan->tanggal_pinjam = $request->tanggal_pinjam;
        $laporan->merekmobil = $request->merekmobil;
        $laporan->save();
        return redirect('laporan');
    }
    public function delete_laporan($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect('laporan');
    }

    public function exportpdf()
    {
        $data = Laporan::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datalaporan-pdf');
        return $pdf->download('data.pdf');
    }
}
