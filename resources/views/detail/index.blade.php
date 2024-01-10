@extends('layouts.admin')
@section('riwayat','active')

@section('style')
<style>
    .cardPengajuan {
        border: 1px solid #343A40;
    }
</style>
@endsection

@section('content')
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid">

        <?php $detail = $cont->getDetail($cart->id_cart); ?>
        <div class="card">
            <div class="card-body">
                @php
                $satker = $cont->getSatker($cart->satker);
                @endphp
                <div class="d-inline-block">
                    <b>{{isset($satker) ? $satker['nm_satker'] : $cart->satker}} | {{$cont->getUnor($detail[0]->unor)['name']}} | {{$detail[0]->fullname}}</b>
                    @php
                    $nm_jenis = $cont->getJenis($cart->jenis)['nm_jenis'] . ' (' . $cart->kd_cart .') ';
                    @endphp
                    <small class="d-block"><b>{{$detail->count()}} Item | {{$nm_jenis}}</b></small>
                </div>
                <div class="d-inline-block float-right">
                    <p class="my-0 d-block text-right"><b>{{$cont->tgl_indo($cart->created_at)}}</b></p>
                    <p class="my-0 d-block text-right"><b>{{date_format($cart->created_at, 'H:i:s')}}</b></p>
                </div>
            </div>
            <div class="card-footer">
                <div>
                    <div class="d-inline-block">
                        <b>GRAND TOTAL : </b>
                    </div>
                    <div class="d-inline-block float-right">
                        <b class="text-right" style="margin-right: 10px;">{{number_format($detail->sum('jumlah'), 0, ',', '.')}}</b>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($detail as $dt)
        <div class="card">
            <div class="card-header">
                @php
                $parent = $cont->getRkakl($dt->item);
                $sdcp = '';
                @endphp
                @foreach ($parent as $pr)
                <?php
                if ($pr['sd'] != '') {
                    $sdcp = $pr['sd'];
                }
                $reg['1'] = ['regex' => '/^[A-Z0-9]{3}.[A-Z0-9]{2}.[A-Z0-9]{2}$/', 'fil' => 'Program'];
                $reg['2'] = ['regex' => '/^[0-9]{4}$/', 'fil' => 'Kegiatan'];
                $reg['3'] = ['regex' => '/^[0-9]{4}.[A-Z]{3}$/', 'fil' => 'Output'];
                $reg['4'] = ['regex' => '/^[0-9]{4}.[A-Z]{3}.[0-9]{3}$/', 'fil' => 'Suboutput'];
                $reg['5'] = ['regex' => '/^[0-9]{3}$/', 'fil' => 'Komponen'];
                $reg['6'] = ['regex' => '/^[A-Z]{1}$/', 'fil' => 'Subkomponen'];
                $reg['7'] = ['regex' => '/^[0-9]{6}$/', 'fil' => 'Akun'];
                $check = str_replace("'", "", $pr['kode']);
                ?>
                <div class="row">
                    <div class="col-2">
                        <?php
                        for ($i = 1; $i <= count($reg); $i++) {
                            if (preg_match($reg[$i]['regex'], $check)) {
                                $fil = $reg[$i]['fil'];
                        ?>
                                <p class="my-0">{{$fil}}</p>
                            <?php
                            } else {
                                $fil = '';
                            ?>
                                <p class="my-0">{{$fil}}</p>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-2">
                        <p class="my-0">:&emsp;{{$check}}</p>
                    </div>
                    <div class="col">
                        <p class="my-0">({{$pr['desc']}})</p>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col-2">
                        <p class="my-0">Uraian</p>
                    </div>
                    <div class="col">
                        <p class="my-0">:&emsp;({{$dt->desc}})</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2">
                        <p class="my-0">Sumber Dana</p>
                    </div>
                    <div class="col">
                        @php
                        $sdcp = str_replace(' ', '', $sdcp);
                        @endphp
                        <p class="my-0">:&emsp;<?= $sdcp == 'RM' ? 'Rupiah Murni' : 'Penerimaan Negara Bukan Pajak' ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p class="my-0">Jumlah</p>
                    </div>
                    <div class="col">
                        <p class="my-0">:&emsp;Rp {{number_format($dt->jumlah, 0, ',', '.')}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="my-0">Terbilang</p>
                    </div>
                    <div class="col">
                        <p class="my-0 terbilang">{{$dt->jumlah}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body"></div>
        </div>
        @endforeach
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        const terbilang = document.querySelectorAll('.terbilang');
        terbilang.forEach(function(paragraph) {
            const initialValue = paragraph.innerHTML
            const newValue = pembilang(initialValue)
            paragraph.innerHTML = ': &ensp;' + newValue
        })
    })

    function pembilang(nilai) {
        nilai = Math.abs(nilai);
        var simpanNilaiBagi = 0;
        var huruf = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh",
            "Sebelas"
        ];
        var temp = "";

        if (nilai < 12) {
            temp = " " + huruf[nilai];
        } else if (nilai < 20) {
            temp = pembilang(nilai - 10) + " Belas";
        } else if (nilai < 100) {
            simpanNilaiBagi = Math.floor(nilai / 10);
            temp = pembilang(simpanNilaiBagi) + " Puluh" + pembilang(nilai % 10);
        } else if (nilai < 200) {
            temp = " Seratus" + pembilang(nilai - 100);
        } else if (nilai < 1_000) {
            simpanNilaiBagi = Math.floor(nilai / 100);
            temp = pembilang(simpanNilaiBagi) + " Ratus" + pembilang(nilai % 100);
        } else if (nilai < 2_000) {
            temp = " Seribu" + pembilang(nilai - 1_000);
        } else if (nilai < 1_000_000) {
            simpanNilaiBagi = Math.floor(nilai / 1_000);
            temp = pembilang(simpanNilaiBagi) + " Ribu" + pembilang(nilai % 1_000);
        } else if (nilai < 1_000_000_000) {
            simpanNilaiBagi = Math.floor(nilai / 1_000_000);
            temp = pembilang(simpanNilaiBagi) + " Juta" + pembilang(nilai % 1_000_000);
        } else if (nilai < 1_000_000_000_000) {
            simpanNilaiBagi = Math.floor(nilai / 1_000_000_000);
            temp = pembilang(simpanNilaiBagi) + " Miliar" + pembilang(nilai % 1_000_000_000);
        } else if (nilai < 1_000_000_000_000_000) {
            simpanNilaiBagi = Math.floor(nilai / 1_000_000_000_000);
            temp = pembilang(simpanNilaiBagi) + " Triliun" + pembilang(nilai % 1_000_000_000_000);
        } else if (nilai < 1_000_000_000_000_000_000) {
            simpanNilaiBagi = Math.floor(nilai / 1_000_000_000_000_000);
            temp = pembilang(simpanNilaiBagi) + " Kuadriliun" + pembilang(nilai % 1_000_000_000_000_000);
        }

        return temp;
    }
</script>
@endsection