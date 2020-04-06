@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>PEMBAYARAN</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col">
                        @if(Session::has('msg'))
                            <div class="alert alert-success">{{ Session::get('msg') }}</div>
                        @endif

                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Pemayaran</th>
                                    <th>Nama Siswa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $key => $p)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $p->code }}</td>
                                        <td>
                                            @php
                                                $nama_siswa = \App\Student::where('id', $p->student_id)->first()['nama_siswa'];
                                            @endphp
                                            {{ $nama_siswa }}
                                        </td>
                                        <td>Rp. {{ number_format($p->total) }}</td>
                                        <td>
                                            @if ($p->status == 0)
                                                <div class="badge badge-danger">Belum Bayar</div>
                                            @elseif ($p->status == 1)
                                                <div class="badge badge-success">Sudah Bayar</div>
                                            @elseif ($p->status == 2)
                                                <div class="badge badge-info">Perlu dicek</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($p->bukti !== null)
                                                <a href="{{ url($p->bukti) }}" download>
                                                    <i class="fa fa-download"></i> Download Bukti
                                                </a>
                                            @else 
                                                Tidak Ada
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Lihat
                                            </a>
                                            @if ($p->status !== 1)
                                                <a href="{{ route('admin.payment.approve', encrypt($p->id)) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i> Approve
                                                </a>
                                            @endif
                                        </td>
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