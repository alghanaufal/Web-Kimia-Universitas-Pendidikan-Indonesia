<?php

namespace App\Http\Controllers;

use App\Models\pkm;
use App\Models\dosen;
use App\Models\staff;
use App\Models\jurnal;
use App\Models\posisi;
use App\Models\akademik;
use App\Models\fasilitas;
use App\Models\informasi;
use App\Models\mahasiswa;
use App\Models\pengabdian;
use App\Models\programKimia;
use Illuminate\Http\Request;
use App\Models\tenagaKependidikan;

class depanController extends Controller
{
    //INDEX
    public function index()
    {
        $data = informasi::orderBy('id', 'desc')->get();
        return view('depan.index')->with('data', $data);
    }

    //LEMBAGA
    public function lembaga()
    {
        $isi = get_meta_value('_isi');
        $staff = staff::orderBy('id', 'asc')->get();
        $posisi = posisi::where('tipe', 'Pimpinan')->where('nama', 'Ketua')->first();
        if ($posisi) {
            $staffPimpinan = $staff->where('id_posisi', $posisi->id);
            if ($staffPimpinan->count() > 0) {
                $idDosen = $staffPimpinan->first()->id_dosen;
                $dosen = dosen::where('id', $idDosen)->first();
                return view('depan.lembaga.lembaga')->with('kaprodi', $dosen)->with('isi', $isi);
            }
        }
    }
    public function visimisi()
    {
        $visi = get_meta_value('_visi');
        $misi = get_meta_value('_misi');
        return view('depan.lembaga.visimisi')->with('visi', $visi)->with('misi', $misi);
    }
    public function struktur()
    {
        $foto = get_meta_value('_foto');
        $staff = staff::orderBy('id', 'asc')->get();
        $posisi = posisi::orderBy('id', 'asc')->get();
        $dosen = dosen::orderBy('id', 'asc')->get();
        $fasilitas = fasilitas::orderBy('id', 'asc')->where('tipe', 'Laboratorium')->get();
        
        return view('depan.lembaga.struktur')->with('foto', $foto)->with('staff', $staff)->with('posisi', $posisi)->with('dosen', $dosen)->with('fasilitas', $fasilitas);
    }
    public function staff()
    {
        $data = dosen::orderBy('id', 'asc')->get();
        $data2 = tenagaKependidikan::orderBy('id', 'asc')->get();
        return view('depan.lembaga.staff')->with('data', $data)->with('data2', $data2);
    }
    public function staffDetail($id)
    { 
        $data = dosen::orderBy('id', 'asc')->where('id', $id)->first();
        return view('depan.lembaga.detail')->with('data', $data);
    }
    public function fasilitas()
    {
        $fasilitas = fasilitas::orderBy('id', 'asc')->get();
        return view('depan.lembaga.fasilitas')->with('fasilitas', $fasilitas);
    }

    //AKADEMIK
    public function akademik()
    {
        return view('depan.akademik.akademik');
    }
    public function akademikDetail($id)
    {
        $data = akademik::orderBy('id', 'asc')->where('id', $id)->first();
        // $dataTerbaru = informasi::orderBy('id', 'desc')->get();
        return view('depan.akademik.detail')->with('data', $data);
    }
    // 'Pedoman Akademik','Penerimaan Mahasiswa','MBKM','Visiting Professor','Summer School','Learning Management System','Module','Tracer Study','Survey Kepuasan Mahasiswa'
    public function akademikPedoman()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Pedoman Akademik')->get();
        return view('depan.akademik.pedoman')->with('data',$data);
    }

    public function akademikVisiting()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Visiting Professor')->get();
        return view('depan.akademik.visiting')->with('data',$data);
    }
    public function akademikModule()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Module')->where('detail_tipe', 'Sarjana')->get();
        $data2 = akademik::orderBy('id', 'asc')->where('tipe', 'Module')->where('detail_tipe', 'Magister')->get();
        return view('depan.akademik.module')->with('data',$data)->with('data2',$data2);
    }
    public function akademikPenerimaan()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Penerimaan Mahasiswa')->get();
        return view('depan.akademik.penerimaan')->with('data',$data);
    }
    public function akademikSummer()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Summer School')->get();
        return view('depan.akademik.summer')->with('data',$data);
    }
    public function akademikTracer()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Tracer Study')->get();
        return view('depan.akademik.tracer')->with('data',$data);
    }
    public function akademikMBKM()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'MBKM')->get();
        return view('depan.akademik.mbkm')->with('data',$data);
    }
    public function akademikLearning()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Learning Management System')->get();
        return view('depan.akademik.learning')->with('data',$data);
    }
    public function akademikSurvey()
    {
        $data = akademik::orderBy('id', 'asc')->where('tipe', 'Survey Kepuasan Mahasiswa')->get();
        return view('depan.akademik.survey')->with('data',$data);
    }

    //RISET
    public function riset()
    {
        $data = programKimia::orderBy('id', 'asc')->get();
        $isi = get_meta_value('_isiKerjaSama');
        return view('depan.riset.riset')->with('data', $data)->with('isi', $isi);
    }

    public function risetDetail($id)
    {
        $data = programKimia::orderBy('id', 'asc')->where('id', $id)->first();
        return view('depan.riset.detail')->with('data', $data);
    }

    //PENGABDIAN
    public function pengabdian()
    {
        $data = pengabdian::orderBy('id', 'asc')->get();
        return view('depan.pengabdian.pengabdian')->with('data', $data);
    }
    public function pengabdianDetail($id)
    {
        $data = pengabdian::orderBy('id', 'asc')->where('id', $id)->first();
        // $dataTerbaru = informasi::orderBy('id', 'desc')->get();
        return view('depan.pengabdian.detail')->with('data', $data);
    }

    //JURNAL
    public function jurnal()
    {
        $data = jurnal::orderBy('id', 'asc')->get();
        return view('depan.jurnal.jurnal')->with('data', $data);
    }

    //MAHASISWA
    public function mahasiswa()
    {
        return view('depan.mahasiswa.mahasiswa');
    }
    public function mahasiswaDetail($id)
    {
        $data = mahasiswa::orderBy('id', 'asc')->where('id', $id)->first();
        // $dataTerbaru = informasi::orderBy('id', 'desc')->get();
        return view('depan.mahasiswa.detail')->with('data', $data);
    }
    public function alumniDetail($id)
    {
        $data = mahasiswa::orderBy('id', 'asc')->where('id', $id)->first();
        // $dataTerbaru = informasi::orderBy('id', 'desc')->get();
        return view('depan.mahasiswa.detailAlumni')->with('data', $data);
    }
    public function pkmDetail($id)
    {
        $data = pkm::orderBy('id', 'asc')->where('id', $id)->first();
        // $dataTerbaru = informasi::orderBy('id', 'desc')->get();
        return view('depan.mahasiswa.detailPkm')->with('data', $data);
    }


    public function mahasiswaBemHmk()
    {
        $data = [
            'namaBEM' => get_meta_value('mhs_bem_nama'),
            'logoBEM' => get_meta_value('mhs_bem_logo'),
            'tahunBEM' => get_meta_value('mhs_bem_tahun'),
            'visiBEM' => get_meta_value('mhs_bem_visi'),
            'misiBEM' => get_meta_value('mhs_bem_misi'),
            'ketuaBEM' => get_meta_value('mhs_bem_ketua'),
            'fotoKetuaBEM' => get_meta_value('mhs_bem_ketuaFoto'),
            
            'logoDPM' => get_meta_value('mhs_dpm_logo'),
            'namaDPM' => get_meta_value('mhs_dpm_nama'),
            'ketuaDPM' => get_meta_value('mhs_dpm_ketua'),
            'fotoKetuaDPM' => get_meta_value('mhs_dpm_ketuaFoto'),
        ];

        return view('depan.mahasiswa.mahasiswa.bemhmk')->with('data', $data);
    }

    public function mahasiswaKegiatanPrestasi()
    {
        $data = mahasiswa::orderBy('id', 'asc')->where('tipe', 'Kegiatan dan Prestasi')->get();
        return view('depan.mahasiswa.mahasiswa.kegiatan&prestasi')->with('data', $data);
    }

    public function mahasiswaPKM()
    {
        $data = pkm::orderBy('id', 'asc')->get();
        return view('depan.mahasiswa.mahasiswa.pkm')->with('data', $data);
    }

    //ALUMNI
    public function alumni()
    {
        return view('depan.mahasiswa.alumni.alumni');
    }
    public function alumniLegalisir()
    {
        return view('depan.mahasiswa.alumni.legalisir');
    }
    public function alumniPortal()
    {
        $data = mahasiswa::orderBy('id', 'asc')->where('tipe', 'Portal Alumni')->get();
        return view('depan.mahasiswa.alumni.portal')->with('data', $data);
    }

    //BEASISWA
    public function beasiswa()
    {
        $data = mahasiswa::orderBy('id', 'asc')->where('tipe', 'Beasiswa')->get();
        return view('depan.mahasiswa.beasiswa.beasiswa')->with('data', $data);
    }
    // public function mahasiswa()
    // {
    //     return view('depan.mahasiswa.mahasiswa');
    // }
    // public function mahasiswa()
    // {
    //     return view('depan.mahasiswa.mahasiswa');
    // }

    public function informasiBerita()
    {        
        $data = informasi::orderBy('id', 'asc')->where('tipe', 'Berita')->get();
        return view('depan.informasi.informasi')->with('data', $data);
    }
    public function informasiAgenda()
    {
        $data = informasi::orderBy('id', 'asc')->where('tipe', 'Agenda')->get();
        return view('depan.informasi.informasi')->with('data', $data);
    }
    public function informasiKegiatan()
    {
        $data = informasi::orderBy('id', 'asc')->where('tipe', 'Kegiatan')->get();
        return view('depan.informasi.informasi')->with('data', $data);
    }
    public function informasiPengumuman()
    {
        $data = informasi::orderBy('id', 'asc')->where('tipe', 'Pengumuman')->get();
        return view('depan.informasi.informasi')->with('data', $data);
    }
    public function informasiSistem()
    {
        $data = informasi::orderBy('id', 'asc')->where('tipe', 'Sistem Penjaminan Mutu')->get();
        return view('depan.informasi.informasi')->with('data', $data);
    }
    public function informasiDetail($id)
    {
        $data = informasi::orderBy('id', 'asc')->where('id', $id)->first();
        $dataTerbaru = informasi::orderBy('id', 'desc')->get();
        return view('depan.informasi.detail')->with('data', $data)->with('dataTerbaru', $dataTerbaru);
    }
}