@extends('layouts.admin')
@section('riwayat','active')

@section('style')
<style>
    .cardPengajuan:hover {
        background-color: #edeef3;
        border: 1px solid #343A40;
    }

    .cardPengajuan .card-header:hover {
        cursor: pointer;
    }

    .listPengajuan .list-group-item:hover {
        border: 1px solid #343A40;
    }
</style>
@endsection

@section('content')
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
        @foreach ($list as $li)
        <?php $detail = $cont->getDetail($li->id_cart); ?>
        <div class="card cardPengajuan">
            <div class="card-header" onclick="showBody(<?= $li->id_cart ?>)">
                @php
                $kd_satker = $cont->getItem($detail[0]->id)['kd_satker'];
                $satker = $cont->getSatker($kd_satker);
                @endphp
                <div class="d-inline-block">
                    <b>{{isset($satker) ? $satker['nm_satker'] : $kd_satker}}</b>
                    <small class="d-block"><b>{{$detail->count()}} Item</b></small>
                </div>
                <div class="d-inline-block float-right">
                    <p class="my-0 d-block text-right"><b>{{date_format($li->created_at, 'd F Y')}}</b></p>
                    <p class="my-0 d-block text-right"><b>{{date_format($li->created_at, 'h:i:s A')}}</b></p>
                </div>
            </div>
            <div class="card-body cbody-{{$li->id_cart}} d-none">
                @foreach ($detail as $det)
                <ul class="list-group listPengajuan">
                    <li class="list-group-item p-2" style="border-radius: 0; position: relative;">
                        <div class="d-inline-block">
                            @if($det->desc != $cont->getItem($det->item)['desc'])
                            <p class="my-0" style="text-decoration: line-through;">{{$cont->getItem($det->item)['desc']}}</p>
                            <p class="my-0">{{$det->desc}}</p>
                            <p class="my-0">{{$det->harga}}</p>
                            @else
                            <p class="my-0">{{$cont->getItem($det->item)['desc']}}</p>
                            <p class="my-0">{{$det->harga}}</p>
                            @endif
                        </div>
                        <div class="d-inline-block float-right" style="position: absolute; bottom: 7px; right: 7px;">
                            <p class="my-0 text-right">{{'x'}} <b>{{$det->volume}}</b></p>
                            <p class="my-0 d-block text-right">{{number_format($det->jumlah, 0, ',', '.')}}</p>
                        </div>
                    </li>
                </ul>
                @endforeach
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
                <div>
                    <div class="d-inline-block">
                        <p class="mt-0 mb-2"><b>Status : </b></p>
                    </div>
                    <div class="d-inline-block float-right">
                        <button style="margin-right: 10px;" id="btnStatus-{{$li->id_cart}}" onclick="chgStatus(<?= $li->id_cart ?>,<?= $li->status ?>)" class="mt-0 mb-2 btn btn-sm btn-outline-{{$li->status == 0 ? 'danger' : 'success'}}"><b>{{$li->status == 0 ? 'Belum disetujui' : 'Sudah ditransfer'}}</b></button>
                    </div>
                </div>
                <div>
                    <p class="my-0"><b>Yang Mengajukan : {{$detail[0]->fullname}}</b></p>
                </div>
                <div>
                    <P class="my-0"><b>Kelengkapan Dokumen</b></P>
                    <?php if ($detail->sum('jumlah') > 50000000) { ?>
                        <button class="btn btn-outline-secondary btn-sm my-1">KONTRAK</button>
                        <button class="btn btn-outline-secondary btn-sm my-1">FULLBOARD</button>
                        <button class="btn btn-outline-secondary btn-sm my-1">PERJALANAN DINAS</button>
                    <?php } ?>
                    <button class="btn btn-outline-secondary btn-sm my-1">NOTA</button>
                    <button class="btn btn-outline-secondary btn-sm my-1">KWITANSI</button>
                    <button class="btn btn-outline-secondary btn-sm my-1">HONOR BULANAN</button>
                    <button class="btn btn-outline-secondary btn-sm my-1">HONOR NARASUMBER</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

@section('script')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')

    function showBody(id) {
        var body = $('.cbody-' + id)
        if (body.hasClass('d-none')) {
            body.removeClass('d-none')
        } else {
            body.addClass('d-none')
        }
    }

    function chgStatus(id_cart, status) {
        if (status == 0) {
            warna = '#5cb85c'
            msg = 'Sudah diransfer'
        } else {
            warna = '#d9534f'
            msg = 'Belum disetujui'
        }
        swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin merubah status menjadi',
            icon: 'info',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: msg,
            confirmButtonColor: warna
        }).then((con) => {
            if (con.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("chgStatus") }}',
                    data: {
                        _token: CSRF_TOKEN,
                        'id_cart': id_cart
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#btnStatus-' + id_cart).attr('disabled', true);
                    },
                    success: function(result) {
                        $('#btnStatus-' + id_cart).attr('disabled', false);
                        if (result.success) {
                            swal.fire({
                                title: 'Selamat',
                                text: result.msg,
                                icon: 'success'
                            }).then(function() {
                                location.reload()
                            });
                        } else {
                            swal.fire({
                                title: 'Gagal',
                                text: result.msg,
                                icon: 'error'
                            });
                        }
                    }
                })
            }
        });
    }
</script>
@endsection