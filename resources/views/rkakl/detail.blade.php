@extends('layouts.admin')
@if ($preview == 'true')
@section('v_kegiatan','active')
@endif
@if ($preview == 'false')
@section('rkakl','active')
@endif
@section('sidemenu', 'sidebar-collapse')
{{--@section('navbar', 'layout-navbar-fixed')--}}

@section('style')
<style>
    .loading {
        background: url("{{asset('img/pulse.gif')}}") no-repeat center center;
    }
</style>
@endsection

@section('content')
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid" style="margin-bottom: 50px;">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-sm-3">
                        <div class="form-group row my-0">
                            <label for="thang" class="col-sm-6 col-form-label">Th. Anggaran</label>
                            <div class="col-sm-6">
                                <input type="number" disabled class="form-control" value="{{$import_log->thang}}">
                            </div>
                        </div>
                        <div class="form-group row my-1">
                            <label for="satker" class="col-sm-6 col-form-label">Satker</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="satker" value="{{$import_log->kd_satker}}">
                            </div>
                        </div>
                        <div class="form-group row my-0">
                            {{--<label for="" class="col-sm-6 col-form-label">K/L-Unit</label>
                            <?php $kl = explode('.', $rkakl[1]['hie1']); ?>
                            <div class="col-sm-3 pr-1">
                                <input type="text" class="form-control" id="klu-1" value="{{$kl[0]}}" disabled>
                        </div>
                        <div class="col-sm-3 pl-1">
                            <input type="text" class="form-control" id="klu-2" value="{{$kl[1]}}" disabled>
                        </div>--}}
                    </div>
                </div>
                <div class="title col-sm-9">
                    <div class="text-left">
                        <?php $sker = $cont->getSatker($import_log->kd_satker); ?>
                        <p class="text-uppercase text-bold">{{ isset($sker) ? $sker['nm_satker'] : $import_log->kd_satker }}</p>
                        <p class="card-text text-uppercase my-0">Kementrian kelautan dan perikanan|Ditjen Perikanan tangkap</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>Menampilkan {{$rkakl->total() >= '50' ? '50' : $rkakl->total()}} data dari {{$rkakl->total()}} total data</p>
            {{$rkakl->onEachSide(8)->links()}}
            <div id="toolbar">
                @if($marks)
                <p class="my-0" id="marker">Item yang terpilih berada di halaman {{$marks}}</p>
                @endif
            </div>
            <table id="tableM" data-toggle="table" data-sticky-header="true" data-click-to-select="true" data-filter-control="true" data-toolbar="#toolbar" data-buttons="buttons" data-search="true" data-custom-search="customSearch" data-search-on-enter-key="true">
                <thead>
                    <tr>
                        @if ($preview == 'true')
                        <th data-field="state">No</th>
                        @endif
                        @if ($preview == 'false')
                        <th data-field="state" data-checkbox="true" data-formatter="stateFormatter"></th>
                        @endif
                        <th data-field="id" class="d-none">id</th>
                        <th data-field="hie8" class="d-none">hie8</th>
                        <th data-field="kode">Kode</th>
                        <th data-field="desc">Deskripsi</th>
                        <th data-field="vol">Volume</th>
                        <th data-field="harga">Harga Satuan</th>
                        <th data-field="jumlah">Pagu</th>
                        <th data-field="realisasi">Realisasi</th>
                        <th data-field="sisa">Sisa</th>
                        <th data-field="pengajuan">Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($rkakl))
                    @foreach ($rkakl as $rk)
                    <tr>
                        @if ($preview == 'true')
                        <td>{{$loop->iteration}}</td>
                        @endif
                        @if ($preview == 'false')
                        <td></td>
                        @endif
                        <td>{{$rk['id']}}</td>
                        <td>{{$rk['hie8']}}</td>
                        <td>{{$rk['kode']}}</td>
                        <td>{{$rk['desc']}}</td>
                        <td class="text-right">{{$rk['vol']}}</td>
                        <td class="text-right"><?= $rk['harga'] != '' ? number_format($rk['harga'], 0, ',', '.') : '-' ?></td>
                        <td class="text-right"><?= $rk['jumlah'] != '' ? number_format($rk['jumlah'], 0, ',', '.') : '-' ?></td>
                        <td class="text-right"><?= $rk['realisasi'] != '' ? number_format($rk['realisasi'], 0, ',', '.') : '-' ?></td>
                        <td class="text-right">
                            @php
                            $real = $rk['realisasi'] != '' ? $rk['realisasi'] : 0;
                            $aju = $rk['pengajuan'] != '' ? $rk['pengajuan'] : 0;
                            $sum = $rk['jumlah'] != '' ? $rk['jumlah'] : 0;
                            $sisa = $sum - ($real + $aju);
                            @endphp
                            <?= $sisa != '' ? number_format($sisa, 0, ',', '.') : '-' ?>
                        </td>
                        <td class="text-right"><?= $rk['pengajuan'] != '' ? number_format($rk['pengajuan'], 0, ',', '.') : '-' ?></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-none" id="detail">
        <div class="card shadow-lg mr-2" style="border-radius: 20px; min-width: 260px;">
            <div class="card-body">
                <div class="row" style="height: 100%;">
                    <div class="col-6">
                        <p class="my-0 pt-1" id="count" style="font-weight: bold;"></p>
                    </div>
                    <div class="col-6 text-right">
                        <!-- <button id="btCancel" class="btn btn-warning mx-1" style="border-radius: 10px;"><i class="fa fa-trash mr-1"></i>Cancel</button> -->
                        <button id="myBtn" class="btn btn-success mx-1" style="border-radius: 10px;"><i class="fa fa-arrow-right mr-1"></i>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal-custom">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                </div>
                <div class="modal-body">
                    <table data-toggle="table" data-page-size="all" id="tableMdl" data-url="{{route('getCart')}}">
                        <thead>
                            <tr>
                                <th data-field="id_detail" class="d-none">id</th>
                                <th data-field="kode" class="d-none">Kode</th>
                                <th data-field="aksi"></th>
                                <th data-field="desc" data-editable="true">Uraian</th>
                                <th data-field="vol" data-align="right" data-editable="true">Volume</th>
                                <th data-field="harga" data-align="right">Harga Satuan</th>
                                <th data-field="jumlah" data-align="right" data-editable="true">Jumlah</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer" style="justify-content: space-between;">
                    <div class="d-inline-block float-left">
                        <button type="button" id="btndelAll" class="btn btn-outline-danger"><i class="fa fa-trash mr-1"></i>Delete All</button>
                    </div>
                    <div class="d-inline-block float-right">
                        <button type="button" id="closeMdl" class="btn btn-outline-secondary"><i class="fa fa-times mr-1"></i>Close</button>
                        <button type="button" id="mdlSubmit" class="btn btn-outline-primary"><i class="fa fa-paper-plane mr-1"></i>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mdlFilter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter data by</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php for ($i = 1; $i <= 7; $i++) : ?>
                        @if (isset($level['hie'.$i]))
                        <div class="row my-2">
                            <div class="col-4"><label for="">{{$cont->getKategori($i)}}</label></div>
                            <div class="col-8">
                                <select class="form-select" name="hie{{$i}}" id="hie{{$i}}" data-ke="{{$i}}" required>
                                    <option value="" selected>--PILIH {{strtoupper($cont->getKategori($i))}}--</option>
                                    @foreach ($level['hie'.$i] as $hie => $val)
                                    <option value="{{$hie}}">{{$hie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                    <?php endfor; ?>
                    <small class="text-dark"><i class="fa fa-info-circle mr-1 text-danger"></i> <b><i>Minimal pilih 1 kategori</i></b></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btnFilter" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    var id_import = '{{$import_log->id}}'
    var preview = '{{$preview}}'
    var filter = '@json($filter)'
    var search = '{{$search}}'
    var jenis = '{{$jenis}}'
    var kd_cart = '{{$kd_cart}}'
    var kategori = '@json($kategori)'
    var kat = JSON.parse(kategori)
    var cart = '@json($curCart)'
    var curCart = JSON.parse(cart)

    // if (preview == 'false') {
    //     window.onbeforeunload = function() {
    //         return "All unsaved data will be lost. Are you sure?"
    //     }
    // }

    function stateFormatter(value, row, index) {
        for (let i = 0; i < curCart.length; i++) {
            if (row.id == curCart[i]['item']) {
                if (row.sisa == '-') {
                    return {
                        checked: true,
                        disabled: true
                    }
                }
                return {
                    checked: true
                }
            }
        }
        if (row.hie8 == '') {
            return {
                disabled: true
            }
        }
        if (row.sisa == '-') {
            return {
                disabled: true
            }
        }
        return value
    }

    $(document).ready(function() {
        var si = $('.search-input')
        if (search != 0) {
            si.val(search)
        }

        $('.search-input').on('change', function() {
            if (si.val() == '') {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("search") }}',
                    data: {
                        _token: CSRF_TOKEN,
                        'text': 0,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            location.reload()
                        }
                    }
                })
            }
        })
    })

    function customSearch(data, text) {
        $.ajax({
            type: 'POST',
            url: '{{ route("search") }}',
            data: {
                _token: CSRF_TOKEN,
                'text': text,
            },
            dataType: 'json',
            success: function(result) {
                if (result.success) {
                    location.reload()
                }
            }
        })
    }

    function buttons() {
        return {
            filterBy: {
                text: 'Filter Data',
                icon: 'bi-funnel',
                attributes: {
                    title: 'Filter data by',
                    'data-bs-toggle': "modal",
                    'data-bs-target': "#mdlFilter"
                }
            },
            byAll: {
                text: 'All Data',
                icon: 'bi-grid',
                event: function() {
                    if (filter == null) {
                        alert('Already Showing All Data!')
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("getRkakl") }}',
                            data: {
                                _token: CSRF_TOKEN,
                                'id_import': id_import,
                                'filter': [],
                                'preview': preview,
                                'jenis': jenis,
                                'kd_cart': kd_cart,
                            },
                            dataType: 'json',
                            beforeSend: function() {
                                $('#btnFilter').attr('disabled', true)
                            },
                            success: function(result) {
                                if (result.success) {
                                    window.location.href = '{{ route("idxRkakl") }}'
                                }
                            }
                        })
                    }
                },
                attributes: {
                    title: 'Show all data',
                }
            },
        }
    }

    $(document).on('change', '#hie1,#hie2,#hie3,#hie4,#hie5,#hie6,#hie7', function() {
        var level = $(this).attr('id')
        var kode = [];
        for (var i = 1; i <= 7; i++) {
            kode.push($('#hie' + i).find(':selected').val())
        }
        $.ajax({
            type: 'POST',
            url: '{{ route("getLevel") }}',
            data: {
                _token: CSRF_TOKEN,
                'level': level,
                'kode': kode,
                'id_import': id_import
            },
            dataType: 'json',
            beforeSend: function() {
                for (var i = 1; i <= 7; i++) {
                    var opke = $('#' + level).data('ke')
                    var op = $("#hie" + i)
                    if (i > opke) {
                        op.attr('disabled', true)
                    }
                }
            },
            success: function(result) {
                if (result.success) {
                    for (var i = 1; i <= 7; i++) {
                        if (i > result.hie) {
                            var $el = $("#hie" + i)
                            var ke = 'hie' + i
                            var arr = result.data
                            var newOptions = Object.fromEntries(Object.entries(arr).filter(function([key]) {
                                return key == ke
                            }))
                            $el.empty();
                            $el.attr('disabled', false)
                            $el.append($("<option></option>").attr("value", '').text('--PILIH ' + kat[i].toUpperCase() + '--'));
                            $.each(newOptions[ke], function(key, value) {
                                $el.append($("<option></option>").attr("value", key).text(key));
                            });
                        }
                    }
                }
            }
        })
    })

    $(document).on('click', '#btnFilter', function() {
        var arr = []
        for (var i = 1; i <= 7; i++) {
            var op = $("#hie" + i)
            arr.push(op.val())
        }
        $.ajax({
            type: 'POST',
            url: '{{ route("getRkakl") }}',
            data: {
                _token: CSRF_TOKEN,
                'id_import': id_import,
                'filter': arr,
                'preview': preview,
                'jenis': jenis,
                'kd_cart': kd_cart,
            },
            dataType: 'json',
            beforeSend: function() {
                $('#btnFilter').attr('disabled', true)
            },
            success: function(result) {
                if (result.success) {
                    window.location.href = '{{ route("idxRkakl") }}'
                }
            }
        })
    })

    var modal = document.getElementById("myModal")
    var btn = document.getElementById("myBtn")
    var span = document.getElementById("closeMdl")
    var table = $('#tableM')
    var tableMdl = $('#tableMdl')
    var detail = $('#detail')
    var text = $('#count')

    btn.onclick = function() {
        modal.style.display = "block"
        tableMdl.bootstrapTable('refresh')
    }
    span.onclick = function() {
        modal.style.display = "none"
        location.reload()
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none"
        }
    }

    table.on('check.bs.table', function(row, rowIndex) {
        addCart(rowIndex)
        setTimeout(function() {
            showDet()
        }, 200)
    })
    table.on('uncheck.bs.table', function(row, rowIndex) {
        $.ajax({
            type: 'POST',
            url: '{{ route("delItem") }}',
            data: {
                _token: CSRF_TOKEN,
                'id': rowIndex.id
            },
            dataType: 'json',
            success: function(result) {
                setTimeout(function() {
                    showDet()
                }, 200)
            }
        })
    })

    $('input[name="btSelectAll"]').on('change', function() {
        setTimeout(function() {
            showDet()
        }, 200)
    })

    $(function() {
        $(window).scroll(function() {
            detail.addClass('d-none')
            clearTimeout($.data(this, 'scrollTimer'));
            $.data(this, 'scrollTimer', setTimeout(function() {
                showDet()
            }, 500));
        });
    })

    function showDet() {
        if (preview == 'false') {
            $.get('{{route("countCart")}}', function(count) {
                if (count != 0) {
                    detail.removeClass('d-none')
                    text.text(count + ' item dipilih!')
                } else {
                    detail.addClass('d-none')
                }
            })
        }
    }

    $(document).on('click', '#btCancel', function() {
        data = tableMdl.bootstrapTable('getData')
        $.ajax({
            type: 'POST',
            url: '{{ route("canCart") }}',
            data: {
                _token: CSRF_TOKEN,
                'id': data[0]['id_cart']
            },
            dataType: 'json',
            success: function(result) {
                tableMdl.bootstrapTable('refresh')
                setTimeout(function() {
                    if (result.count == 0) {
                        table.bootstrapTable('uncheckAll')
                        modal.style.display = "none"
                        showDet()
                        $('#marker').text('')
                    }
                }, 200)
            }
        })
    })

    function addCart(data) {
        $.ajax({
            type: 'PUT',
            url: '{{ route("addCart", 0) }}',
            data: {
                _token: CSRF_TOKEN,
                'data': data,
                'add': true
            },
            dataType: 'json',
            success: function(result) {
                tableMdl.bootstrapTable('refresh')
            }
        })
    }

    function delitem(id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("delCart") }}',
            data: {
                _token: CSRF_TOKEN,
                'id': id
            },
            dataType: 'json',
            success: function(result) {
                tableMdl.bootstrapTable('refresh')
                setTimeout(function() {
                    if (result.count == 0) {
                        table.bootstrapTable('uncheckAll')
                        modal.style.display = "none"
                        showDet()
                    }
                }, 200)
            }
        })
    }

    $(document).on('click', '#btndelAll', function() {
        data = tableMdl.bootstrapTable('getData')
        $.ajax({
            type: 'POST',
            url: '{{ route("canCart") }}',
            data: {
                _token: CSRF_TOKEN,
                'id': data[0]['id_cart']
            },
            dataType: 'json',
            success: function(result) {
                tableMdl.bootstrapTable('refresh')
                setTimeout(function() {
                    if (result.count == 0) {
                        table.bootstrapTable('uncheckAll')
                        modal.style.display = "none"
                        showDet()
                        $('#marker').text('')
                    }
                }, 200)
            }
        })
    })

    tableMdl.on('editable-save.bs.table', function(field, row, rowIndex, oldValue, $el) {
        $.ajax({
            type: 'PUT',
            url: '{{ route("addCart", 0) }}',
            data: {
                _token: CSRF_TOKEN,
                'data': rowIndex,
                'edit': true,
                'row': row
            },
            dataType: 'json',
            success: function(result) {
                tableMdl.bootstrapTable('refresh')
            }
        })
    })

    $('#mdlSubmit').on('click', function() {
        $.ajax({
            type: 'POST',
            url: '{{ route("saveCart") }}',
            data: {
                _token: CSRF_TOKEN,
                'id_import': id_import,
                'jenis': jenis,
                'kd_cart': kd_cart,
            },
            dataType: 'json',
            beforeSend: function() {
                $('#mdlSubmit').attr('disabled', true)
                $('#mdlSubmit').html('Processing...')
            },
            success: function(result) {
                if (result.success) {
                    swal.fire({
                        title: 'Success',
                        text: result.msg,
                        icon: 'success'
                    }).then(function() {
                        location.reload()
                    });
                } else {
                    swal.fire({
                        title: 'Error',
                        text: result.msg,
                        icon: 'error'
                    });
                    $('#mdlSubmit').attr('disabled', false)
                    $('#mdlSubmit').html('<i class="fa fa-paper-plane mr-1"></i>Submit')
                }
            }
        })
    })
</script>
@endsection