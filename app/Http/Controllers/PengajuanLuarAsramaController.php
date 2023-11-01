<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLuarAsrama;
use App\Models\Mahasiswa;
use App\Models\PengajuanDataPenjamin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengajuanLuarAsramaController extends Controller
{
    public function index()
    {
        $idPenjamin = Auth::guard('mahasiswa')->user()->id;
        $data_penjaminan = PengajuanLuarAsrama::where('id_mahasiswa', $idPenjamin)->first();

        if ($data_penjaminan) {
            return view('mahasiswa.fixed_pengajuan_luar_asrama', compact('data_penjaminan'));
        } else {
            return view('mahasiswa.pengajuan_luar_asrama');
        }
    }   

    public function process(Request $request)
    {
        $request->validate([
            'jurusan' => 'required',
            'status_tinggal' => 'required',
            'surat_outside' => 'required|file|mimes:pdf',
        ]);

        $request->session()->put('jurusan', $request->input('jurusan'));
        $request->session()->put('status_tinggal', $request->input('status_tinggal'));
        // $request->session()->put('surat_outside', $request->surat_outside);
        $request->session()->put('surat_outside', $request->surat_outside->store('surat_outside'));

        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();

        $status_dengan_penjamin = ['Orang Tua', 'Saudara', 'Dosen'];
        $status_tanpa_penjamin = ['Married', 'Profesi Ners', 'Skripsi'];

        if (in_array($request->input('status_tinggal'), $status_dengan_penjamin)) {
            return view('mahasiswa.pengajuan_penjamin', compact('mahasiswa'));
        } else if (in_array($request->input('status_tinggal'), $status_tanpa_penjamin)) {
            return view('mahasiswa.pengisian_alamat', compact('mahasiswa'));
        }
    }   

    public function store_dengan_penjamin(Request $request)
    {
        $request->validate([
            'kode_penjamin' => 'required',
        ]);

        $kode_penjamin = strtoupper($request->input('kode_penjamin'));

        $data_pengajuan_penjamin = PengajuanDataPenjamin::where('kode_penjamin', $kode_penjamin)->first();
        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();
        
        if (!($data_pengajuan_penjamin)) {
            $mahasiswa->percobaan -= 1;
            $mahasiswa->save();

            return view('mahasiswa.pengajuan_penjamin', compact('mahasiswa'))->with('pesan', 'Kode penjamin tidak sesuai dengan penjamin manapun!');
        }
        
        else {
            $pengajuan_luar_asrama = new PengajuanLuarAsrama();
            
            $pengajuan_luar_asrama->id_mahasiswa = $id_mahasiswa;
            $pengajuan_luar_asrama->id_penjamin = $data_pengajuan_penjamin->id_penjamin;

            $pengajuan_luar_asrama->jurusan = $request->session()->get('jurusan');
            $pengajuan_luar_asrama->status_tinggal = $request->session()->get('status_tinggal');
            $pengajuan_luar_asrama->surat_outside = $request->session()->get('surat_outside');
            
            $bulan = date('n');
            $tahun = date('Y');
            
            if ($bulan >= 1 && $bulan <= 6) {
                $tahun_ajaran = ($tahun - 1) . '/' . $tahun;
            } else {
                $tahun_ajaran = $tahun . '/' . ($tahun + 1);
            }
                        
            $pengajuan_luar_asrama->tahun_ajaran = $tahun_ajaran;
            
            $pengajuan_luar_asrama->save();

            $request->session()->forget(['jurusan', 'status_tinggal', 'surat_outside']);

            return redirect()->route('pengajuan-luar-asrama');
        }
    }

    public function store_tanpa_penjamin(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'foto_tempat_tinggal' => 'required|file|max:2048|image|mimes:jpeg,png,jpg,gif',
            'longitude' => 'required',
            'latitude' => 'required',
            'surat_kebenaran' => 'required|file|mimes:pdf'
        ]);

        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();

        $pengajuan_luar_asrama = new PengajuanLuarAsrama();

        $pengajuan_luar_asrama->id_mahasiswa = $id_mahasiswa;

        $pengajuan_luar_asrama->alamat = $request->input('alamat');
        $pengajuan_luar_asrama->latitude = $request->input('latitude');
        $pengajuan_luar_asrama->longitude = $request->input('longitude');
        $pengajuan_luar_asrama->foto_tempat_tinggal = $request->foto_tempat_tinggal->store('pengajuan_luar_asrama');
        $pengajuan_luar_asrama->surat_kebenaran = $request->surat_kebenaran->store('surat_kebenaran');

        $pengajuan_luar_asrama->jurusan = $request->session()->get('jurusan');
        $pengajuan_luar_asrama->status_tinggal = $request->session()->get('status_tinggal');
        $pengajuan_luar_asrama->surat_outside = $request->session()->get('surat_outside');

        $bulan = date('n');
        $tahun = date('Y');
        
        if ($bulan >= 1 && $bulan <= 6) {
            $tahun_ajaran = ($tahun - 1) . '/' . $tahun;
        } else {
            $tahun_ajaran = $tahun . '/' . ($tahun + 1);
        }
                    
        $pengajuan_luar_asrama->tahun_ajaran = $tahun_ajaran;

        $pengajuan_luar_asrama->save();

        $request->session()->forget(['jurusan', 'status_tinggal', 'surat_outside']);

        return view('mahasiswa.fixed_pengajuan_luar_asrama', compact('pengajuan_luar_asrama'));
    }
}
