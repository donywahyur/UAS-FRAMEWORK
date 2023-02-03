@extends('layout')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Pemakaian Meter Air</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form id="formFilter" action="./pemakaian/table" method="post">
                                @csrf
                                <label for="inputTahun" class="form-label">Tahun</label>
                                <select name="tahun" id="inputTahun" class="form-control">
                                    @for($tahun = date('Y');$tahun >= 2021;$tahun--)
                                        <option value="{{ $tahun }}" {{ $tahun == date('Y') ? 'selected' : '' }}>{{ $tahun }}</option>
                                    @endfor
                                </select><br>
                                <label for="inputBulan" class="form-label">Bulan</label>
                                <select name="bulan" id="inputBulan" class="form-control">
                                    @for($bulan = 1;$bulan <= 12;$bulan++)
                                        <option value="{{ $bulan }}">{{ $bulan }}</option>
                                    @endfor
                                </select><br>
                                <button type="submit" class="btn btn-primary">Lihat</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="filter-content">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#formFilter").submit(function(e){
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            cache: false,
            success: function(msg){
                $("#filter-content").html(msg);
            }
        });
    })
</script>
@endsection