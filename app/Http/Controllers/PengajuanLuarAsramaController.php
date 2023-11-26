<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLuarAsrama;
use App\Models\Mahasiswa;
use App\Models\Penjamin;
use App\Models\PengajuanDataPenjamin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class PengajuanLuarAsramaController extends Controller
{
    public function index()
    {
        // $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        // $data_pengajuan_outside = PengajuanLuarAsrama::where('id_mahasiswa', $id_mahasiswa)
        //     ->where('status_penjamin', 'pending')
        //     ->first();

        // if ($data_pengajuan_outside) {
        //     return redirect('/mhs/data-pengajuan');
        // }

        return view('mahasiswa.pengajuan_luar_asrama');
    }

    public function process(Request $request)
    {
        $request->validate([
            'status_tinggal' => 'required',
            'surat_outside' => 'required|file|mimes:pdf',
        ]);

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
        $validator = Validator::make($request->all(), [
            'kode_penjamin' => 'required',
        ]);

        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();

        if ($validator->fails()) {
            $error = "Kode penjamin wajib diisi!";
            
            if ($error) {
                return view('mahasiswa.pengajuan_penjamin', compact('mahasiswa', 'error'));
            } else {
                return view('mahasiswa.pengajuan_penjamin', compact('mahasiswa'));
            }
        }

        $kode_penjamin = strtoupper($request->input('kode_penjamin'));

        $data_pengajuan_penjamin = PengajuanDataPenjamin::where('kode_penjamin', $kode_penjamin)->first();
        if ($data_pengajuan_penjamin) {
            $id_penjamin = $data_pengajuan_penjamin->penjamin->id;
        }
        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();

        if ($data_pengajuan_penjamin) {
            $jumlah_pengajuan_penjamin_disetujui = PengajuanLuarAsrama::where('id_penjamin', $id_penjamin)
            ->where('status_penjamin', 'disetujui')
            ->where('status', 'disetujui')
            ->count();
        }

        if ($data_pengajuan_penjamin) {
            $batas_jaminan = $data_pengajuan_penjamin->kapasitas;
        }


        // dd($jumlah_pengajuan_penjamin_disetujui);
        
        if (!($data_pengajuan_penjamin)) {
            $mahasiswa->percobaan -= 1;
            $mahasiswa->save();

            if ($mahasiswa->percobaan == 0) {
                $mahasiswa->update(['waktu_setuju' => Carbon::now()]);
                $mahasiswa->percobaan = 5;
                $mahasiswa->save();

                return view('mahasiswa.pengajuan_penjamin', compact('mahasiswa'));
            }

            return view('mahasiswa.pengajuan_penjamin', compact('mahasiswa'))->with('pesan', 'Kode penjamin tidak sesuai dengan penjamin manapun!');
        }

        else if ($jumlah_pengajuan_penjamin_disetujui >= $batas_jaminan) {
            return view('mahasiswa.pengajuan_penjamin', compact('mahasiswa'))->with('pesan', 'Penjamin ini sudah menjamin lebih dari batas mahasiswa yang ditampung!');
        }
        
        else {
            $pengajuan_luar_asrama = new PengajuanLuarAsrama();
            
            $pengajuan_luar_asrama->id_mahasiswa = $id_mahasiswa;
            $pengajuan_luar_asrama->id_penjamin = $data_pengajuan_penjamin->id_penjamin;

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

            $request->session()->forget(['status_tinggal', 'surat_outside']);

            return redirect()->route('mhs.data-pengajuan');
        }
    }

    public function store_tanpa_penjamin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alamat' => 'required|string|max:255',
            'foto_tempat_tinggal' => 'required|file|max:2048|image|mimes:jpeg,png,jpg,gif',
            'longitude' => 'required',
            'latitude' => 'required',
            'surat_kebenaran' => 'required|file|mimes:pdf'
        ]);

        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();

        if ($validator->fails()) {
            $errors = $validator->errors();
            
            return view('mahasiswa.pengisian_alamat', compact('mahasiswa', 'errors'));
        }

        $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();

        $pengajuan_luar_asrama = new PengajuanLuarAsrama();

        $pengajuan_luar_asrama->id_mahasiswa = $id_mahasiswa;

        $pengajuan_luar_asrama->alamat = $request->input('alamat');
        $pengajuan_luar_asrama->latitude = $request->input('latitude');
        $pengajuan_luar_asrama->longitude = $request->input('longitude');
        $pengajuan_luar_asrama->foto_tempat_tinggal = $request->foto_tempat_tinggal->store('pengajuan_luar_asrama');
        $pengajuan_luar_asrama->surat_kebenaran = $request->surat_kebenaran->store('surat_kebenaran');

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

        $request->session()->forget(['status_tinggal', 'surat_outside']);

        return redirect()->route('mhs.data-pengajuan');
    }

    // public function data() {
    //     $id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
    //     $data_pengajuan_outside = PengajuanLuarAsrama::where('id_mahasiswa', $id_mahasiswa)
    //         ->where('status_penjamin', 'pending')
    //         ->first();

    //     if ($data_pengajuan_outside->id_penjamin) {
    //         $penjamin = Penjamin::where('id', $data_pengajuan_outside->id_penjamin)->first();

    //         $data_pengajuan_penjamin = PengajuanDataPenjamin::where('id_penjamin', $penjamin->id)->first();

    //         return view('mahasiswa.fixed_pengajuan_luar_asrama', compact('data_pengajuan_outside', 'data_pengajuan_penjamin'));
    //     }

    //     return view('mahasiswa.fixed_pengajuan_luar_asrama', compact('data_pengajuan_outside'));
    //     // dd('test');
    // }
}
