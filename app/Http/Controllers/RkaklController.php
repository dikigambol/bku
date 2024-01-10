<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Cart_detail;
use App\Jenis;
use App\Modelrkakl;
use App\Satker;
use App\Unor;
use App\User;
use App\Rkakl;

class RkaklController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['cont'] = $this;
        $data['title'] = 'Pengajuan';
        $data['auth'] = Auth::user();
        $data['list'] = Cart::orderBy('created_at', 'desc')->get();
        if (Auth::user()->role == 1) {
            return view('rkakl.index', $data);
        } else {
            return view('bp.index', $data);
        }
    }

    public function update(Request $request)
    {
        $id_cart = $request->id_cart;
        $cart = Cart::find($id_cart);
        if ($cart->status == 1) {
            $cart->status = 0;
            $cart->save();
            $result = ['success' => true, 'msg' => 'Status pengajuan berhasil dirubah'];
        } else {
            $cart->status = 1;
            $cart->save();
            $result = ['success' => true, 'msg' => 'Status pengajuan berhasil dirubah'];
        }
        return json_encode($result);
    }

    public function getDetail($id)
    {
        $data = Cart_detail::leftJoin('carts', 'carts.id_cart', 'detail_carts.id_detail')
            ->leftJoin('users', 'users.id', 'carts.admin')
            ->leftJoin('detailUsers', 'detailUsers.id', 'users.id_detuser')
            ->where('detail_carts.id_detail', $id)
            ->get();
        return $data;
    }

    public function getItem($id)
    {
        $data = Modelrkakl::leftJoin('import_log', 'import_log.id', '=', 'excel_rkakl.id_import')
            ->where('excel_rkakl.id', $id)->first();
        return $data;
    }

    public function getSatker($kode)
    {
        $data = Satker::where('kd_satker', $kode)->first();
        if (!$data) {
            $data = null;
        }
        return $data;
    }

    public function tgl_indo($tgl)
    {
        $arr = explode('-', $tgl);
        $day = (int) $arr[2];
        $year = $arr[0];
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        return $day . ' ' . $bulan[(int) $arr[1]] . ' ' . $year;
    }

    public function getUser($id)
    {
        $data = User::find($id);
        return $data;
    }

    public function getJenis($id)
    {
        $data = Jenis::find($id);
        return $data;
    }

    public function getUnor($id)
    {
        $data = Unor::find($id);
        return $data;
    }

    public function riwayat(Request $request)
    {
        $data['cont'] = $this;
        $data['title'] = (Auth::user()->role == 1) ? 'Riwayat Pengajuan' : 'Riwayat Pengajuan (' . Auth::user()->det_user->satker->nm_satker . ')';
        $data['bulan'] = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $data['filtgl'] = $request->session()->get('filtgl', 0);
        $data['filtgl2'] = $request->session()->get('filtgl2', 0);
        $data['filunor'] = $request->session()->get('filunor', 0);
        $data['filuser'] = $request->session()->get('filuser', 0);
        $data['filsatker'] = $request->session()->get('filsatker', 0);
        $data['auth'] = Auth::user();
        $kd_satker = Auth::user()->det_user->kd_satker;
        $data['satker'] = Satker::all();
        $data['unor'] = Unor::all();
        $data['user'] = Cart::where('status', '>=', 0)->leftJoin('users', 'carts.admin', '=', 'users.id')
            ->select('carts.*', 'users.fullname', 'users.id')->groupBy('carts.admin')->get();
        $query = Cart::query();
        if ($data['filtgl'] && $data['filtgl2']) {
            $query = $query->whereDate('created_at', '>=', $data['filtgl'])->whereDate('created_at', '<=', $data['filtgl2']);
        } else if ($data['filtgl']) {
            $query = $query->whereDate('created_at', $data['filtgl']);
        }
        if ($data['filunor']) {
            $query = $query->leftJoin('users', 'carts.admin', 'users.id')->leftJoin('detailUsers', 'users.id', 'detailUsers.id')
                ->leftJoin('unor', 'detailUsers.unor', 'unor.id')
                ->select('carts.*', 'detailUsers.unor', 'users.id')
                ->where('unor.name', $data['filunor']);
        }
        if ($data['filsatker']) {
            $query = $query->leftJoin('detail_carts', 'carts.id_cart', 'detail_carts.id_detail')->leftJoin('rkakl', 'detail_carts.item', 'rkakl.id')
                ->leftJoin('import_log', 'rkakl.id_import', 'import_log.id')
                ->select('carts.*', 'import_log.kd_satker')->where('import_log.kd_satker', $data['filsatker'])
                ->groupBy('carts.id_cart');
        }
        if ($data['filuser']) {
            $query = $query->where('carts.admin', $data['filuser']);
        }
        if (Auth::user()->role != 1) {
            $query = $query->where('satker', $kd_satker);
        }
        $data['list'] = $query->where('admin', '<>', '')->orderBy('carts.created_at', 'desc')->get();
        return view('rkakl.riwayat', $data);
    }

    public function filter(Request $request)
    {
        $mode = $request->mode;
        $val = $request->val;
        $val2 = $request->val2;
        if ($mode == 'tgl') {
            $request->session()->put(['filtgl' =>  $val]);
        }
        if ($mode == 'tgl') {
            $request->session()->put(['filtgl2' =>  $val2]);
        }
        if ($mode == 'unor') {
            $request->session()->put(['filunor' =>  $val]);
            if ($val == 'Unor') {
                $request->session()->forget('filunor');
            }
        }
        if ($mode == 'user') {
            $request->session()->put(['filuser' =>  $val]);
        }
        if ($mode == 'satker') {
            $request->session()->put(['filsatker' =>  $val]);
        }

        if (isset($mode)) {
            $result = ['success' => true];
        }
        return json_encode($result);
    }

    public function approve(Request $request)
    {
        $id_cart = $request->id;
        $cart = Cart::find($id_cart);
        if ($cart->status == 0) {
            $cart->status = 1;
            $cart->save();
            $this->editRkakl($id_cart);
            $result = ['success' => true, 'msg' => 'Pengajuan disetujui'];
            return json_encode($result);
        }
        if ($cart->status == 1) {
            $cart->status = 0;
            $cart->save();
            $result = ['success' => true, 'msg' => 'Pengajuan tidak disetujui'];
            return json_encode($result);
        }
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

    public function detailPengajuan($id_cart)
    {
        $data['cont'] = $this;
        $data['title'] = 'Detail Pengajuan';
        $data['auth'] = Auth::user();
        $data['cart'] = Cart::find($id_cart);
        $data['detail'] = Cart_detail::where('id_detail', $data['cart']->id_cart)->get();
        return view('detail.index', $data);
    }

    public function getRkakl($item)
    {
        $rkakl = Rkakl::find($item);
        $data = $this->getParent($rkakl->id_parent);
        return $data;
    }

    public function getParent($id, $data = [])
    {
        if ($id) {
            $parent = Rkakl::where('id', $id)->first();
            $data[] = ['id' => $parent->id, 'kode' => $parent->kode, 'desc' => $parent->desc, 'sd' => $parent->sdcp];
            if ($parent->id_parent) {
                $data = array_merge($data, $this->getParent($parent->id_parent, $data));
            }
        }
        $uniqueData = array_map('unserialize', array_unique(array_map('serialize', $data)));
        $id_item = array_column($uniqueData, 'id');
        array_multisort($id_item, SORT_ASC, $uniqueData);
        return $uniqueData;
    }
}
