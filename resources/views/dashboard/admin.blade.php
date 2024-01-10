@extends('layouts.admin')

@section('content')
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Upload RKAKL</h5>
                <div class="my-2">
                    <button class="btn-import btn btn-sm btn-secondary" role="button" data-toggle="modal" data-target="#import"><i class="fa fa-upload mr-1" aria-hidden="true"></i>Import</button>
                </div>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div id="import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content bg-success">
                <div class="modal-header">
                    <h5 class="modal-title" id="importData">Import Data</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('import') }}" id="form-import" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body bg-light">
                        <div class="form-group">
                            <input type="file" class="form-control pt-3 pb-5" name="import-data" id="import-data" aria-describedby="desInput" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" multiple required>
                            <small id="desInput" class="form-text text-muted">File excel yang diupload adalah format 97-2003 workbook (.xls) dan Microsoft Excel Worksheet(.xlsx)</small>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button id="btn-import" type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- endModal --}}
</section>
<section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
        <div class="form-group row">
            <label for="thang" class="col-sm-2 col-form-label">Th. Anggaran</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="thang">
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        "@if(session()->get('stsImport'))"
        swal.fire({
            title: 'Selamat',
            text: '{{ session()->get("msg") }}',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });
        "@endif"
        "@if(session()->get('stsImport')===false)"
        swal.fire({
            title: 'Error',
            text: '{{ session()->get("msg") }}',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
        });
        "@endif"
    })
</script>
@endsection