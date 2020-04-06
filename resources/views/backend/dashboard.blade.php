@extends('backend.layouts.app') @section('content')
<main class="app-content">
    <div class="app-title">
        <h2>Dashboard</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                            <h4>Calon Siswa</h4>
                            <p>
                                <b>{{ \App\Student::all()->count() }}</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                        <div class="info">
                            <h4>Pembayaran Masuk</h4>
                            <p>
                                <b>{{ \App\Payment::all()->count() }}</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-money fa-3x"></i>
                        <div class="info">
                            <h4>Total Pembayaran</h4>
                            @php 
                                $total = 0; 
                                foreach (\App\Payment::all() as $key => $p) { 
                                    if ($p->status == 1) {
                                        $total+=$p->total; 
                                    }
                                } 
                            @endphp
                            <p><b>Rp. {{ number_format($total) }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>10 data calon siswa terbaru</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Daftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Student::orderBy('id', 'DESC')->take(10)->get() as $key => $s)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $s->nama_siswa }}</td>
                                        <td>{{ $s->jenis_kelamin }}</td>
                                        <td>{{ $s->tgl_masuk }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>10 data pembayaran masuk terbaru</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Payment::orderBy('id', 'DESC')->where('status', 1)->take(10)->get() as $key => $p)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $p->code }}</td>
                                            <td>Approved</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection