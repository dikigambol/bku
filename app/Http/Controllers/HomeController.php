<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\ExcelImportRKAKL;
use App\Imports\Pushme;
use Maatwebsite\Excel\Facades\Excel;
use App\Modelrkakl;
use App\Rkakl;
use App\Cart;
use App\Cart_detail;
use App\Cart_spj;
use App\Cart_spj_detail;
use App\Satker;
use App\ImportLog;
use App\ImportLogDetail;
use App\Jenis;
use App\Transfer;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mapping($rkakl)
    {
        $sum = count($rkakl);
        $no = 0;
        $id_parent = [];
        $kode = '';
        $id_parent2 = [];
        foreach ($rkakl as $rk) {
            $no++;
            $pres = round(($no * 100) / $sum);
            $data = new Rkakl;
            $rev = str_replace("'", "", $rk->kode);
            $regex1 = "/^[A-Z0-9]{3}.[A-Z0-9]{2}.[A-Z0-9]{2}$/";
            $regex2 = "/^[0-9]{4}$/";
            $regex3 = "/^[0-9]{4}.[A-Z]{3}$/";
            $regex4 = "/^[0-9]{4}.[A-Z]{3}.[0-9]{3}$/";
            $regex5 = "/^[0-9]{3}$/";
            $regex6 = "/^[A-Z]{1}$/";
            $regex7 = "/^[0-9]{6}$/";
            if (preg_match($regex1, $rev)) {
                $hie1 = $rev;
            }
            if (preg_match($regex2, $rev)) {
                $hie2 = $rev;
                if (isset($id_parent2['hie1'])) {
                    $data->id_parent = $id_parent2['hie1'];
                }
            }
            if (preg_match($regex3, $rev)) {
                $hie3 = $rev;
                if (isset($id_parent2['hie2'])) {
                    $data->id_parent = $id_parent2['hie2'];
                }
            }
            if (preg_match($regex4, $rev)) {
                $hie4 = $rev;
                if (isset($id_parent2['hie3'])) {
                    $data->id_parent = $id_parent2['hie3'];
                }
            }
            if (preg_match($regex5, $rev)) {
                $hie5 = $rev;
                if (isset($id_parent2['hie4'])) {
                    $data->id_parent = $id_parent2['hie4'];
                }
            }
            if (preg_match($regex6, $rev)) {
                $hie6 = $rev;
                if (isset($id_parent2['hie5'])) {
                    $data->id_parent = $id_parent2['hie5'];
                }
            }
            if (preg_match($regex7, $rev)) {
                $hie7 = $rev;
                if (isset($id_parent2['hie6'])) {
                    $data->id_parent = $id_parent2['hie6'];
                }
            }
            $hundred = substr($rk->desc, 0, 3);
            $numdesc = preg_match('/[-]/', $hundred);
            $hie8 = ($numdesc == 1) ? 1 : '';

            $data->id_import = $rk->id_import;
            $data->kode = $rk->kode;
            $data->hie1 = isset($hie1) ? $hie1 : '';
            $data->hie2 = isset($hie2) ? $hie2 : '';
            $data->hie3 = isset($hie3) ? $hie3 : '';
            $data->hie4 = isset($hie4) ? $hie4 : '';
            $data->hie5 = isset($hie5) ? $hie5 : '';
            $data->hie6 = isset($hie6) ? $hie6 : '';
            $data->hie7 = isset($hie7) ? $hie7 : '';
            $data->hie8 = $hie8;
            $arrHie = [$data->hie1, $data->hie2, $data->hie3, $data->hie4, $data->hie5, $data->hie6, $data->hie7, $rk->desc];
            $data->string_id = implode(';', $arrHie);
            $data->desc = $rk->desc;
            $data->vol = preg_replace('/[^0-9]/', '', $rk->vol);
            $data->harga = $rk->harga;
            $data->jumlah = $rk->jumlah;
            $data->sb = $rk->sb;
            $data->sdcp = $rk->sdcp;
            if (!$rk->kode) {
                $data->id_parent = $id_parent[$kode];
            }
            $data->save();
            if (preg_match($regex1, $rev)) {
                $id_parent2['hie1'] = $data->id;
            }
            if (preg_match($regex2, $rev)) {
                $id_parent2['hie2'] = $data->id;
            }
            if (preg_match($regex3, $rev)) {
                $id_parent2['hie3'] = $data->id;
            }
            if (preg_match($regex4, $rev)) {
                $id_parent2['hie4'] = $data->id;
            }
            if (preg_match($regex5, $rev)) {
                $id_parent2['hie5'] = $data->id;
            }
            if (preg_match($regex6, $rev)) {
                $id_parent2['hie6'] = $data->id;
            }
            if (preg_match($regex7, $rev)) {
                $id_parent2['hie7'] = $data->id;
            }
            if ($rk->kode) {
                $id_parent[$rk->kode] = $data->id;
                $kode = $rk->kode;
            }
            // event(new Pushme($pres));
        }
    }

    public function level($arr)
    {
        $data = [];
        foreach ($arr as $el) {
            $data['hie1'][$el['hie1']] = '';
            if ($el['hie2'] != '') {
                $data['hie2'][$el['hie2']] = '';
            }
            if ($el['hie3'] != '') {
                $data['hie3'][$el['hie3']] = '';
            }
            if ($el['hie4'] != '') {
                $data['hie4'][$el['hie4']] = '';
            }
            if ($el['hie5'] != '') {
                $data['hie5'][$el['hie5']] = '';
            }
            if ($el['hie6'] != '') {
                $data['hie6'][$el['hie6']] = '';
            }
            if ($el['hie7'] != '') {
                $data['hie7'][$el['hie7']] = '';
            }
        }
        return $data;
    }

    public function index($id = null)
    {
        $data['cont'] = $this;
        $data['auth'] = Auth::user();
        $data['satker'] = Satker::all();
        $data['jenis'] = Jenis::all();
        $kd_satker = Auth::user()->det_user->kd_satker;
        $query = ImportLog::query();
        $query = $query->leftJoin('users', 'users.id', 'import_log.admin');
        if (Auth::user()->role != 1) {
            $query = $query->where('kd_satker', $kd_satker);
        }

        $data['import'] = $query->where('import_log.status', '!=', 0)
            ->orderBy('import_log.created_at', 'desc')
            ->selectRaw('import_log.kd_dokumen, import_log.kd_satker, import_log.thang, import_log.created_at, 
            users.fullname, COUNT(import_log.kd_dokumen) as kd_dokumen_count, GROUP_CONCAT(import_log.id) as jenis_files')
            ->groupBy('import_log.kd_dokumen')
            ->get();

        foreach ($data['import'] as $datas) {
            $datas->jenis_files = explode(',', $datas->jenis_files);
            $countsArr = [];

            foreach ($datas->jenis_files as $id) {
                $importLog = ImportLog::find($id);

                if ($importLog) {
                    $nama_jenis = $importLog->jenis;
                    $counts_jenis = ImportLogDetail::where('import_log_id', $id)->count();
                    $countsArr[$id] = $nama_jenis . " - " . $counts_jenis . " baris";
                }
            }
            $datas->jenis_files = implode(', ', $countsArr);
        }

        $title = (Auth::user()->role != 3) ? 'Upload RKAK/L' : 'RKAK/L';
        $data['title'] = isset($id) ? 'Pengajuan' : $title;

        return view('rkakl.addrkakl', $data);
    }

    public function getAvail($kd_satker, $id_jenis)
    {
        $jenis = Jenis::find($id_jenis);
        $cart = Cart::where('satker', $kd_satker)->where('jenis', $id_jenis)->get();
        $data['opened'] = Cart::where('satker', $kd_satker)->where('jenis', $id_jenis)->where('status', '<', 0)->get();
        if ($cart->isEmpty()) {
            $data['avail'] = [
                $jenis->nm_jenis => 1,
            ];
        } else {
            $data['avail'] = [
                $jenis->nm_jenis => Cart::where('satker', $kd_satker)->where('jenis', $id_jenis)->max('kd_cart') + 1,
            ];
        }
        return $data;
    }

    public function availTup($kd_satker)
    {
        $cart = Cart::leftJoin('jenis', 'carts.jenis', 'jenis.id_jenis')
            ->select('carts.*', 'jenis.nm_jenis')
            ->where('satker', $kd_satker)
            ->where('status', '<', '0')
            ->where('jenis', 3)
            ->get();
        return $cart;
    }

    public function addTup(Request $request)
    {
        $simpan = new Cart;
        $simpan->status = -1;
        $simpan->admin = '';
        $simpan->satker = $request->satker;
        $simpan->jenis = $request->jenis;
        $simpan->kd_cart = $request->kd_cart;
        $simpan->save();

        $jenis = Jenis::find($request->jenis);

        $request->session()->flash('message', 'Berhasil Membuka ' . $jenis->nm_jenis . ' ' . $request->kd_cart);
        return redirect()->back();
    }

    public function closeTup(Request $request)
    {
        $id_cart = $request->id_cart;
        $cart = Cart::find($id_cart);
        $cart->status = 0;
        $cart->save();

        $jenis = Jenis::find($cart->jenis);

        $request->session()->flash('message', 'Berhasil Menutup ' . $jenis->nm_jenis . ' ' . $cart->kd_cart);
        return redirect()->back();
    }

    public function filRkakl(Request $request)
    {
        $id_import = $request->id_import;
        $filter = $request->filter;
        $preview = $request->preview;
        $jenis = $request->jenis;
        $kd_cart = $request->kd_cart;
        $request->session()->put([
            'id_import' => $id_import,
            'filter' => $filter,
            'preview' => $preview,
            'jenis' => $jenis,
            'kd_cart' => $kd_cart,
        ]);
        if (isset($id_import)) {
            $result = ['success' => true, 'filter' => $filter];
        }
        return json_encode($result);
    }

    public function search(Request $request)
    {
        $text = $request->text;
        $request->session()->put(['search' => $text]);
        if (isset($text)) {
            $result = ['success' => true];
        }
        return json_encode($result);
    }

    public function curCart(Request $request)
    {
        $jenis = $request->session()->get('jenis', 0);
        $import = ImportLog::find($request->session()->get('id_import', 0));
        if ($jenis == 3) {
            $kd_cart = $request->session()->get('kd_cart', 0);
            $cartTup = Cart::where('satker', $import->kd_satker)->where('kd_cart', $kd_cart)->where('jenis', $jenis)->first();
            $id_cart = $cartTup->id_cart;
        } else {
            $id_cart = Cart::max('id_cart') + 1;
        }
        $data = Cart_detail::where('id_detail', $id_cart)->get();
        return $data;
    }

    public function markPage($target, $id_import, $filter = null)
    {
        $markPage = [];
        $itemsPerPage = 50;
        if ($filter) {
            $query = Rkakl::query();
            $query = $query->where('id_import', '=', $id_import);
            for ($i = 0; $i < count($filter); $i++) {
                if ($filter[$i] != null) {
                    $query = $query->where('hie' . ($i + 1), '=', $filter[$i]);
                }
            }
            $items = $query->get();
        } else {
            $items = Rkakl::where('id_import', $id_import)->get();
        }

        foreach ($target as $mk) {
            $targetValue = $mk->item;
            $targetItems = $items->where('id', '=', $targetValue);
            if ($targetItems->count() > 0) {
                $pageNumbers = $targetItems->keys()->map(function ($key) use ($itemsPerPage) {
                    return ceil(($key + 1) / $itemsPerPage);
                })->unique();
                $markPage[] = (int) $pageNumbers->toArray()[0];
            }
        }
        $markPage = array_unique($markPage);
        $markPage = array_values($markPage);
        $marker = implode(', ', $markPage);
        return $marker;
    }

    public function rkakl(Request $request)
    {
        $data['cont'] = $this;
        $data['kategori'] = [
            1 =>    'Program',
            'Kegiatan',
            'Output',
            'Suboutput',
            'Komponen',
            'Subkomponen',
            'Akun'
        ];
        $data['preview'] = $request->session()->get('preview', 0);
        if ($data['preview'] == 'false') {
            $jenis = Jenis::find($request->session()->get('jenis', 0));
            $data['kd_cart'] = $request->session()->get('kd_cart', 0) !== null ? $request->session()->get('kd_cart', 0) : '';
            $data['jenis'] = $jenis->id_jenis;
            $title = 'Tambah Pengajuan (' . $jenis->nm_jenis . ' ' . $data['kd_cart'] . ')';
        } else {
            $data['kd_cart'] = 0;
            $data['jenis'] = 0;
            $title = 'Preview';
        }
        $data['curCart'] = $this->curCart($request);
        $data['title'] = $title;
        $data['auth'] = Auth::user();
        $id_import = $request->session()->get('id_import', 0);
        $data['search'] = $request->session()->get('search', 0);
        $data['import_log'] = ImportLog::find($id_import);
        $data['filter'] = $request->session()->get('filter', []);
        $rkaklAll = Rkakl::where('id_import', $id_import)->get();
        if (!isset($data['filter'])) {
            $query = Rkakl::query();
            $query = $query->where('id_import', $id_import);
            if ($data['search'] != '0') {
                $query = $query->where('desc', 'LIKE', '%' . $data['search'] . '%');
            }
            $data['rkakl'] = $query->paginate(50);
            $data['level'] = $this->level($rkaklAll);
            if ($data['curCart']) {
                $data['marks'] = $this->markPage($data['curCart'], $id_import);
            }
        } else {
            $query = Rkakl::query();
            $query = $query->where('id_import', '=', $id_import);
            for ($i = 0; $i < count($data['filter']); $i++) {
                if ($data['filter'][$i] != null) {
                    $query = $query->where('hie' . ($i + 1), '=', $data['filter'][$i]);
                }
            }
            if ($data['search'] != '0') {
                $query = $query->where('desc', 'LIKE', '%' . $data['search'] . '%');
            }
            $data['rkakl'] = $query->paginate(50);
            $data['level'] = $this->level($rkaklAll);
            if ($data['curCart']) {
                $data['marks'] = $this->markPage($data['curCart'], $id_import, $data['filter']);
            }
        }
        if (isset($id_import)) {
            return view('rkakl.detail', $data);
        } else {
            return $this->index();
        }
    }

    public function download($id_import)
    {

        // $rkaklAll = Rkakl::all();
        // $chunks = $rkaklAll->chunk(1000);

        // $pdfs = [];

        // foreach ($chunks as $chunk) {
        //     $pdf = PDF::loadview('rkakl.pdf', compact('chunk'))->setOption(['fontHeightRatio' => 0.9, 'defaultFont' => 'Calibri'])->setPaper('f4', 'landscape')->setWarnings(false);
        //     $pdfs[] = $pdf;
        // }


        // $merged = PDF::merge($pdfs);

        // // return $pdf->download('data.pdf');
        // return $merged->stream();

        $pdf = new Dompdf();

        $data['cont'] = $this;
        $data['auth'] = Auth::user();

        $jumlah_rkakl = Rkakl::count();

        $data['rkaklAll'] = Rkakl::where('id_import', $id_import)->orderBy('id')->chunk($jumlah_rkakl, function ($data) use ($pdf) {
            $html = View::make('rkakl.pdf', ['rkaklAll' => $data]);
            $pdf->setPaper('a4', 'landscape');
            $pdf->loadHtml($html);
            $pdf->render();
            $pdf->stream();
        });

        if (isset($id_import)) {
            return $data;
        } else {
            return $this->index();
        }
    }

    public function cetak($id_import)
    {

        $data['cont'] = $this;

        $rkaklAll = Rkakl::where('id_import', $id_import)->get();

        $pdf = PDF::loadView('rkakl.pdf', compact('rkaklAll'))->setPaper('a4', 'landscape');

        if (isset($id_import)) {
            return $pdf->stream('data.pdf');
        } else {
            return $this->index();
        }
    }

    public function getKategori($id)
    {
        $kategori = [
            1 =>    'Program',
            'Kegiatan',
            'Output',
            'Suboutput',
            'Komponen',
            'Subkomponen',
            'Akun'
        ];
        return $kategori[$id];
    }

    public function getLevel(Request $request)
    {
        $no_hie = preg_replace('/[^0-9]/', '', $request->level);
        $kode = $request->kode;
        $id_import = $request->id_import;
        $query = Rkakl::query();
        $query = $query->where('id_import', '=', $id_import);
        for ($i = 0; $i < count($kode); $i++) {
            if ($kode[$i] != null) {
                $query = $query->where('hie' . ($i + 1), '=', $kode[$i]);
            }
        }
        $rkakl = $query->get();
        $level = $this->level($rkakl);
        $result = [
            'success' => true,
            'data' => $level,
            'hie' => $no_hie
        ];
        return json_encode($result);
    }

    public function getRkakl($id_import)
    {
        $data = Rkakl::where('id_import', $id_import)->count();
        return $data;
    }

    public function getSatker($kode)
    {
        $data = Satker::where('kd_satker', $kode)->first();
        return $data;
    }

    public function addCart(Request $request)
    {
        $data = $request->data;
        $row = $request->row;
        $jenis = $request->session()->get('jenis', 0);
        $import = ImportLog::find($request->session()->get('id_import', 0));
        if ($jenis == 3) {
            $kd_cart = $request->session()->get('kd_cart', 0);
            $cartTup = Cart::where('satker', $import->kd_satker)->where('kd_cart', $kd_cart)->where('jenis', $jenis)->first();
            $id_cart = $cartTup->id_cart;
        } else {
            $id_cart = Cart::max('id_cart') + 1;
        }
        if ($request->edit) {
            $detail = Cart_detail::find($data['id_detail']);
            $detail->id_detail = $id_cart;
            $detail->item = $data['item'];
            $detail->desc = $data['desc'];
            $detail->volume = preg_replace('/[^0-9]/', '', $data['vol']);
            $detail->harga = $data['harga'];
            if (preg_replace('/[^0-9]/', '', $data['harga']) == '') {
                $detail->jumlah = intval(str_replace('.', '', $data['jumlah']));
            } else {
                if (isset($row) && $row == 'jumlah') {
                    $detail->jumlah = intval(str_replace('.', '', $data['jumlah']));
                }
                if (isset($row) && $row == 'vol') {
                    $detail->jumlah = intval(str_replace('.', '', $detail->volume)) * intval(str_replace('.', '', $data['harga']));
                }
            }
            $detail->save();
        } else {
            $rkakl = Rkakl::find($data['id']);
            $cart = Cart_detail::where('id_detail', $id_cart)->where('item', $data['id'])->first();
            if ($cart == null) {
                $detail = new Cart_detail;
                $detail->id_detail = $id_cart;
                $detail->item = $data['id'];
                $detail->desc = $rkakl->desc;
                $detail->volume = preg_replace('/[^0-9]/', '', $data['vol']);
                $detail->harga = $data['harga'];
                $detail->jumlah = intval(str_replace('.', '', $data['jumlah']));
                $detail->save();
            }
        }
        $result = [
            'success' => true,
            'msg' => 'Berhasil menambahkan data',
            'data' => $data
        ];

        return json_encode($result);
    }

    public function countCart(Request $request)
    {
        $jenis = $request->session()->get('jenis', 0);
        $import = ImportLog::find($request->session()->get('id_import', 0));
        if ($jenis == 3) {
            $kd_cart = $request->session()->get('kd_cart', 0);
            $cartTup = Cart::where('satker', $import->kd_satker)->where('kd_cart', $kd_cart)->where('jenis', $jenis)->first();
            $id_cart = $cartTup->id_cart;
        } else {
            $id_cart = Cart::max('id_cart') + 1;
        }
        $data = Cart_detail::where('id_detail', $id_cart)->count();
        if ($data == 0 && $jenis == 3) {
            $cartTup->admin = '';
            $cartTup->save();
        }
        return json_encode($data);
    }

    public function getCart(Request $request)
    {
        $jenis = $request->session()->get('jenis', 0);
        $import = ImportLog::find($request->session()->get('id_import', 0));
        if ($jenis == 3) {
            $kd_cart = $request->session()->get('kd_cart', 0);
            $cartTup = Cart::where('satker', $import->kd_satker)->where('kd_cart', $kd_cart)->where('jenis', $jenis)->first();
            $id_cart = $cartTup->id_cart;
        } else {
            $id_cart = Cart::max('id_cart') + 1;
        }
        $data['data'] = Cart_detail::where('id_detail', $id_cart)->get()->toArray();
        $data['data'][0]['id_cart'] = $id_cart;
        for ($i = 0; $i < count($data['data']); $i++) {
            $id = $data['data'][$i]['item'];
            $rkakl = Rkakl::find($id);
            $data['data'][$i]['id_detail'] = $data['data'][$i]['id'];
            $data['data'][$i]['aksi'] = '<button class="btn btn-outline-danger btn-sm" onclick="delitem(' . $data['data'][$i]['id'] . ')"><i class="fa fa-trash"></i></button>';
            $data['data'][$i]['kode'] = $id;
            $data['data'][$i]['desc'] = $data['data'][$i]['desc'] == $id ? $rkakl->desc : $data['data'][$i]['desc'];
            $data['data'][$i]['vol'] = $data['data'][$i]['volume'];
            $data['data'][$i]['jumlah'] = number_format($data['data'][$i]['jumlah'], 0, ',', '.');
        }
        return json_encode($data['data']);
    }

    public function delItem(Request $request)
    {
        $item = $request->id;
        $jenis = $request->session()->get('jenis', 0);
        $import = ImportLog::find($request->session()->get('id_import', 0));
        if ($jenis == 3) {
            $kd_cart = $request->session()->get('kd_cart', 0);
            $cartTup = Cart::where('satker', $import->kd_satker)->where('kd_cart', $kd_cart)->where('jenis', $jenis)->first();
            $id_cart = $cartTup->id_cart;
        } else {
            $id_cart = Cart::max('id_cart') + 1;
        }
        $cart = Cart_detail::where('id_detail', $id_cart)->where('item', $item)->first();
        $cart->delete();
        $result = ['success' => true];
        return json_encode($result);
    }

    public function delCart(Request $request)
    {
        $id = $request->id;
        Cart_detail::find($id)->delete();
        $jenis = $request->session()->get('jenis', 0);
        $import = ImportLog::find($request->session()->get('id_import', 0));
        if ($jenis == 3) {
            $kd_cart = $request->session()->get('kd_cart', 0);
            $cartTup = Cart::where('satker', $import->kd_satker)->where('kd_cart', $kd_cart)->where('jenis', $jenis)->first();
            $id_cart = $cartTup->id_cart;
        } else {
            $id_cart = Cart::max('id_cart') + 1;
        }
        $cart = Cart_detail::where('id_detail', $id_cart)->count();
        $result = ['success' => true, 'count' => $cart];
        return json_encode($result);
    }

    public function canCart(Request $request)
    {
        $id_cart = $request->id;
        Cart_detail::where('id_detail', $id_cart)->delete();
        $cart = Cart_detail::where('id_detail', $id_cart)->count();
        $result = ['success' => true, 'count' => $cart];
        return json_encode($result);
    }

    public function saveCart(Request $request)
    {
        $user = Auth::user();
        $import = ImportLog::find($request->id_import);
        $kd_satker = $import->kd_satker;
        $jenis = $request->jenis;
        if ($jenis == 3) {
            $kd_cart = $request->kd_cart;
            $cartTup = Cart::where('satker', $kd_satker)->where('kd_cart', $kd_cart)->where('jenis', $jenis)->first();
            $id_cart = $cartTup->id_cart;
        } else {
            $id_cart = Cart::max('id_cart') + 1;
        }
        $cart = Cart_detail::where('id_detail', $id_cart)->get()->toArray();
        for ($i = 0; $i < count($cart); $i++) {
            $ori = Rkakl::find($cart[$i]['item']);
            $vol = preg_replace('/[^0-9]/', '', $ori['vol']);
            $jumlah = preg_replace('/[^0-9]/', '', $ori['jumlah']);
            if ($cart[$i]['volume'] > $vol) {
                $result = [
                    'success' => false,
                    'msg' => 'Volume item : "' . $ori['desc'] . '" melebihi batas (batas maks ' . $vol . ')'
                ];
                return json_encode($result);
            }
            if ($cart[$i]['jumlah'] > $jumlah) {
                $result = [
                    'success' => false,
                    'msg' => 'Jumlah item : "' . $ori['desc'] . '" melebihi batas (batas maks ' . $jumlah . ')'
                ];
                return json_encode($result);
            }
        }
        if ($jenis == 3) {
            $simpan = Cart::find($id_cart);
            $simpan->admin = $user->id;
            $simpan->save();
            // $this->editRkakl($id_cart);
        } else {
            $simpan = new Cart;
            $simpan->id_cart = $id_cart;
            $simpan->status = 0;
            $simpan->admin = $user->id;
            $simpan->satker = $kd_satker;
            $simpan->jenis = $jenis;
            $simpan->kd_cart = Cart::where('satker', $kd_satker)->where('jenis', $jenis)->max('kd_cart') + 1;
            $simpan->save();
            // $this->editRkakl($id_cart);
        }
        $this->addSpj($id_cart);
        $result = [
            'success' => true,
            'msg' => 'Pengajuan berhasil disimpan'
        ];
        return json_encode($result);
    }

    public function editRkakl($id_cart)
    {
        $cart = Cart_detail::where('id_detail', $id_cart)->get();
        foreach ($cart as $cr) {
            $rkakl = Rkakl::find($cr->item);
            if ($rkakl->pengajuan == null) {
                $rkakl->pengajuan = $cr->jumlah;
                $rkakl->save();
                $this->editParent($rkakl->id_parent, $cr->jumlah);
            }
        }
    }

    public function editParent($id, $jumlah)
    {
        if ($id) {
            $parent = Rkakl::where('id', $id)->first();
            $parent->pengajuan += $jumlah;
            $parent->save();
            if ($parent->id_parent) {
                $this->editParent($parent->id_parent, $jumlah);
            }
        }
    }

    public function addSpj($id_cart)
    {
        $cart = Cart::find($id_cart);
        $find = Cart_spj::where('id_cart', $id_cart)->first();
        if (!$find) {
            $spj = new Cart_spj;
            $spj->id_cart = $id_cart;
            $spj->status = 0;
            $spj->admin = $cart->admin;
            $spj->save();

            $detail = Cart_detail::where('id_detail', $id_cart)->get();
            foreach ($detail as $dt) {
                $spj_detail = new Cart_spj_detail;
                $spj_detail->id_detail_spj = $spj->id_cart_spj;
                $spj_detail->item = $dt->item;
                $spj_detail->desc = $dt->desc;
                $spj_detail->volume = $dt->volume;
                $spj_detail->harga = $dt->harga;
                $spj_detail->jumlah = $dt->jumlah;
                $spj_detail->save();
            }
        } else {
            Cart_spj_detail::where('id_detail_spj', $find->id_cart_spj)->delete();

            $detail = Cart_detail::where('id_detail', $id_cart)->get();
            foreach ($detail as $dt) {
                $spj_detail = new Cart_spj_detail;
                $spj_detail->id_detail_spj = $find->id_cart_spj;
                $spj_detail->item = $dt->item;
                $spj_detail->desc = $dt->desc;
                $spj_detail->volume = $dt->volume;
                $spj_detail->harga = $dt->harga;
                $spj_detail->jumlah = $dt->jumlah;
                $spj_detail->save();
            }
        }
    }

    public function import(Request $req)
    {
        $user = Auth::user();

        $file = $req->file('import-data');
        $fileName = $file->storeAs('file_import', 'temp_file.' . $file->getClientOriginalExtension(), 'public');
        $filePath = storage_path('app/public/' . $fileName);

        $isJenisExisted = ImportLog::isJenisUniqueForKdDokumen($req->kd_dokumen, $req->jenis);

        if ($file->getClientOriginalExtension() == 'csv') {

            if ($isJenisExisted !== true) {
                ImportLogDetail::where('import_log_id', $isJenisExisted)->delete();
                if (filesize($filePath) > 0) {
                    $fileHandle = fopen($filePath, "r");

                    if ($fileHandle !== false) {
                        while (($data = fgetcsv($fileHandle, 1000, ",")) !== false) {
                            $isi_baris = $data[0];

                            ImportLogDetail::create([
                                'import_log_id' => $isJenisExisted,
                                'value' => $isi_baris
                            ]);
                        }

                        fclose($fileHandle);
                    }
                }
                return response()->json(['status' => "Updated"]);
            } else {
                $log = new ImportLog;
                $log->id = $this->kode();
                $log->kd_satker = $req->kd_satker;
                if ($req->kd_dokumen !== "") {
                    $jumlahData = ImportLog::countRecords($req->kd_dokumen);
                    if ($jumlahData > 0 && $jumlahData < 7) {
                        $log->kd_dokumen = $req->kd_dokumen;
                    } else {
                        $log->kd_dokumen = $this->kode();
                    }
                }
                $log->admin = $user->id;
                $log->thang = $req->thang;
                $log->status = 1;
                $log->jenis = $req->jenis;
                $log->updated_from = 0;
                $log->save();

                $import_log_id = $log->id;

                if (filesize($filePath) > 0) {
                    $fileHandle = fopen($filePath, "r");

                    if ($fileHandle !== false) {
                        while (($data = fgetcsv($fileHandle, 1000, ",")) !== false) {
                            $isi_baris = $data[0];

                            ImportLogDetail::create([
                                'import_log_id' => $import_log_id,
                                'value' => $isi_baris
                            ]);
                        }

                        fclose($fileHandle);
                    }
                }

                Storage::delete($fileName);
                return response()->json(['status' => "Imported"]);
            }
        } else {
            Storage::delete($fileName);
            return response()->json(['status' => "Invalid file type"]);
        }

        // $file = $req->file('import-data');
        // $fileName = $file->storeAs('file_import', 'temp_file.' . $file->getClientOriginalExtension(), 'public');
        // $filePath = storage_path('app/public/' . $fileName);

        // $fileHandle = fopen($filePath, "r");

        // if ($fileHandle !== false) {
        //     while (($data = fgetcsv($fileHandle, 1000, ",")) !== false) {
        //         $isi_baris = $data[0];

        //         ImportLogDetail::create([
        //             'import_log_id' => 8,
        //             'value' => $isi_baris
        //         ]);
        //     }

        //     fclose($fileHandle);
        // }
    }

    public function importLawas(Request $req)
    {
        $user = Auth::user();
        $file = $req->file('import-data');
        $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $nama_file = $file->getClientOriginalName();

        if ($ext == "xls" || $ext == "xlsx") {
            $dir = 'file_import';
            $file->move($dir, $nama_file);
            Excel::import(new ExcelImportRKAKL, public_path('/' . $dir . '/' . $nama_file));

            $rkakl = Modelrkakl::where('id_import', $this->kode())->get();
            $this->mapping($rkakl);

            $log = new ImportLog;
            $log->id = $this->kode();
            $log->kd_satker = $req->kd_satker;
            $log->admin = $user->id;
            $log->thang = $req->thang;
            $log->status = 1;
            $log->updated_from = 0;
            $log->save();

            $return = [];
            $return['stsImport'] = true;
            $return['msg'] = "Berhasil import data";
        } else {
            $return['stsImport'] = false;
            $return['msg'] = "This file isn't supported by the system";
        }
        return redirect()->back()->with($return);
    }

    public function updateRkakl(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('edit-data');
        $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $nama_file = $file->getClientOriginalName();

        if ($ext == "xls" || $ext == "xlsx") {
            $dir = 'file_import';
            $file->move($dir, $nama_file);
            Excel::import(new ExcelImportRKAKL, public_path('/' . $dir . '/' . $nama_file));

            $rkakl = Modelrkakl::where('id_import', $this->kode())->get();
            $this->mapping($rkakl);

            $ori = ImportLog::find($request->edtid_import);
            $this->timpaRkakl($ori->id, $this->kode());

            $log = new ImportLog;
            $log->id = $this->kode();
            $log->kd_satker = $ori->kd_satker;
            $log->admin = $user->id;
            $log->thang = $ori->thang;
            $log->status = 1;
            $log->updated_from = $ori->id;
            $log->save();

            $ori->status = 0;
            $ori->save();

            $return = [];
            $return['stsImport'] = true;
            $return['msg'] = "Berhasil import data";
        } else {
            $return['stsImport'] = false;
            $return['msg'] = "This file isn't supported by the system";
        }
        return redirect()->back()->with($return);
    }

    public function timpaRkakl($from, $to)
    {
        $ori = Rkakl::where('id_import', $from)->get();
        foreach ($ori as $o) {
            if ($o->pengajuan != null || $o->realisasi != null || $o->sisa != null) {
                $new = Rkakl::query();
                $new = $new->where('id_import', $to);
                if ($o->hie1 != '') {
                    $new = $new->where('hie1', $o->hie1);
                }
                if ($o->hie2 != '') {
                    $new = $new->where('hie2', $o->hie2);
                }
                if ($o->hie3 != '') {
                    $new = $new->where('hie3', $o->hie3);
                }
                if ($o->hie4 != '') {
                    $new = $new->where('hie4', $o->hie4);
                }
                if ($o->hie5 != '') {
                    $new = $new->where('hie5', $o->hie5);
                }
                if ($o->hie6 != '') {
                    $new = $new->where('hie6', $o->hie6);
                }
                if ($o->hie7 != '') {
                    $new = $new->where('hie7', $o->hie7);
                }
                $new = $new->where('desc', $o->desc)->first();
                if ($new) {
                    $new->pengajuan = ($o->pengajuan != null) ? $o->pengajuan : null;
                    $new->realisasi = ($o->realisasi != null) ? $o->realisasi : null;
                    $new->sisa = ($o->sisa != null) ? $o->sisa : null;
                    $new->save();
                }
            }
        }
    }

    public function kode()
    {
        $kode = ImportLog::max('id');
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
        return $incrementKode;
    }

    public function getImportLog()
    {
        $importLogs = ImportLog::all();

        return response()->json(['data' => $importLogs], 200);
    }

    public function readCsvFileToString($filePath)
    {
        $csvString = file_get_contents($filePath);
        return $csvString;
    }
}
