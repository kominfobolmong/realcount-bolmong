<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

use App\Models\Event;
use App\Models\Tag;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Category;
use App\Models\Download;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Infografis;
use App\Models\Kecamatan;
use App\Models\Koperasi;
use App\Models\Link;
use App\Models\News;
use App\Models\Photo;
use App\Models\Potensi;
use App\Models\Profile;
use App\Models\Profpeg;
use App\Models\Sosmed;
use App\Models\Ukm;
use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PageController extends Controller
{

    public function index()
    {
        // $contact = Contact::first();
        // $profil = Profile::select('favicon', 'maklumat', 'motto')->first();
        // $sliders = Slider::take(2)->latest()->get();
        // $photos = Photo::take(6)->latest()->get();
        // $news = News::without('tags')->take(6)->latest()->get();
        // $faq = Faq::get();
        // $links = Link::latest()->get();
        // // $services = Service::select('id')->get();
        // $layanans = Service::get();

        // $count_koperasi = DB::table('koperasis')->count();
        // $count_ukm = DB::table('ukms')->count();

        // return view('frontend.index', compact(
        //     'contact',
        //     'profil',
        //     'sliders',
        //     'links',
        //     'photos',
        //     'news',
        //     'faq',
        //     'layanans',
        //     'count_koperasi',
        //     'count_ukm'
        // ));

        return view('frontend.index');
    }

    // controller for route profil

    public function pimpinan()
    {
        $item = Profile::select('foto_pimpinan', 'kata_sambutan')->first();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();
        return view('frontend.detail.pimpinan', compact('item', 'contact', 'profil', 'sosmeds', 'links'));
    }

    public function visimisi()
    {
        $item = Profile::select('visi', 'misi')->first();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();
        return view('frontend.detail.visimisi', compact('item', 'sosmeds', 'links', 'profil', 'contact'));
    }

    public function struktur_organisasi()
    {
        $item = Profile::select('struktur_organisasi')->first();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();
        return view('frontend.detail.struktur', compact('item', 'contact', 'profil', 'sosmeds', 'links'));
    }

    public function maklumat_pelayanan()
    {
        $item = Profile::select('maklumat')->first();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();
        return view('frontend.detail.maklumat', compact('item', 'sosmeds', 'links', 'profil', 'contact'));
    }

    public function motto()
    {
        $item = Profile::select('motto')->first();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();
        return view('frontend.detail.motto', compact('item', 'sosmeds', 'links', 'profil', 'contact'));
    }

    // controller for route layanan

    public function layanan()
    {
        $layanans = Service::get();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.layanan', compact('sosmeds', 'links', 'profil', 'contact', 'layanans'));
    }

    public function koperasi(Request $request)
    {
        $kecamatan = Kecamatan::get();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        if ($request->ajax()) {

            $items = Koperasi::latest()->get();

            return DataTables::of($items)
                ->addIndexColumn()
                ->editColumn('tahun_berdiri', function ($row) {
                    return $row->tahun_berdiri ? with(new Carbon($row->tahun_berdiri))->format('m/d/Y') : '';
                })
                ->editColumn('kecamatan', function ($row) {
                    return $row->kecamatan->nama;
                })
                ->editColumn('sertifikat', function ($row) {
                    return $row->sertifikat === 'Y' ? '<span class="badge bg-success">Sudah Bersertifikat</span>' : '<span class="badge bg-warning">Belum Bersertifikat</span>';
                })
                ->editColumn('status', function ($row) {
                    return $row->status === 'Y' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';
                })
                ->rawColumns(['sertifikat', 'status'])
                ->make(true);
        }

        return view('frontend.detail.koperasi', compact('sosmeds', 'links', 'profil', 'contact', 'kecamatan'));
    }

    public function ukm(Request $request)
    {
        $kecamatan = Kecamatan::get();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        if ($request->ajax()) {

            $items = Ukm::latest()->get();

            return DataTables::of($items)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {
                //     $btn = '<a href="/ukm/' . $row->id . '" class="btn btn-secondary"><i class="bi bi-eye"></i></a>';
                //     return $btn;
                // })
                ->editColumn('kecamatan', function ($row) {
                    return $row->desa->kecamatan->nama;
                })
                ->editColumn('desa', function ($row) {
                    return $row->desa->nama;
                })
                ->editColumn('jenis_usaha', function ($row) {
                    return $row->jenis_usaha !== null ? $row->jenis_usaha : '--';
                })
                // ->rawColumns(['action'])
                ->make(true);
        }

        return view('frontend.detail.ukm', compact('sosmeds', 'links', 'profil', 'contact', 'kecamatan'));
    }

    // controller for route media

    public function kegiatan()
    {
        $kegiatan = Photo::latest()->paginate(9);
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.galery_kegiatan', compact('kegiatan', 'sosmeds', 'links', 'profil', 'contact'));
    }

    public function dokumen()
    {
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();
        return view('frontend.detail.dokumen', compact('sosmeds', 'links', 'profil', 'contact'));
    }

    public function berita()
    {
        $news = News::without('tags')->latest()->paginate(9);
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.berita', compact('news', 'contact', 'profil', 'sosmeds', 'links'));
    }

    public function berita_detail($slug)
    {
        $category = Category::withCount('news')->get();
        $tags = Tag::latest()->get();
        $news = News::where('slug', $slug)->firstOrFail();
        $news_new = News::take(5)->latest()->get();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.berita_detail', compact('news', 'category', 'tags', 'news_new', 'contact', 'profil', 'sosmeds', 'links'));
    }

    public function kategori(Category $kategori)
    {
        $news = $kategori->news()->with('user')->latest()->paginate(5);
        $category = Category::latest()->get();
        $tags = Tag::latest()->get();
        $news_new = News::take(3)->latest()->get();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.berita', compact('news', 'category', 'tags', 'news_new', 'contact', 'profil', 'sosmeds', 'links'));
    }

    public function tag(Tag $tag)
    {
        $news = $tag->news()->latest()->paginate(5);
        $category = Category::latest()->get();
        $tags = Tag::latest()->get();
        $news_new = News::take(3)->latest()->get();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.berita', compact('news', 'category', 'tags', 'news_new', 'contact', 'profil', 'sosmeds', 'links'));
    }

    public function kontak()
    {
        $kontak = Contact::latest()->first();
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.kontak', compact('kontak', 'contact', 'profil', 'sosmeds', 'links'));
    }

    // public function download()
    // {
    //     $downloads = Download::latest()->paginate(5);
    //     return view('opd/detail/download', compact('downloads'));
    // }

    // public function getDownload(Request $request, $id)
    // {
    //     $entry = Download::where('id', '=', $id)->firstOrFail();
    //     $pathToFile = storage_path() . "/app/public/" . $entry->file;
    //     return response()->download($pathToFile);
    // }

    public function informasi_berkala()
    {
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.informasi_berkala', compact(
            'contact',
            'profil',
            'sosmeds',
            'links',
        ));
    }

    public function informasi_serta_merta()
    {
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.informasi_serta_merta', compact(
            'contact',
            'profil',
            'sosmeds',
            'links',
        ));
    }

    public function informasi_setiap_saat()
    {
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.informasi_setiap_saat', compact(
            'contact',
            'profil',
            'sosmeds',
            'links',
        ));
    }

    public function informasi_dikecualikan()
    {
        $contact = Contact::first();
        $profil = Profile::select('logo', 'favicon')->first();
        $sosmeds = Sosmed::get();
        $links = Link::latest()->get();

        return view('frontend.detail.informasi_dikecualikan', compact(
            'contact',
            'profil',
            'sosmeds',
            'links',
        ));
    }
}
