@extends('layouts.admin')
@section('users','active')

@section('content')
<section class="container">
    <div class="container-fluid pt-3">
        <!-- <h3>@yield('subtitle') {{ Session::get('stsTbh') }}</h3> -->
        @yield('body')
    </div>
</section>
@endsection

@section('script')
<script>
    function showAlert(msg, icon, title) {
        Swal.fire({
            icon: icon,
            width: 600,
            title: title,
            text: msg,
        })
    }
</script>
@yield('scriptBody')
@endsection