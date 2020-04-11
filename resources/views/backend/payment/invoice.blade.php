@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>INVOICE</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <a href="{{ route('admin.payment') }}" class="btn btn-sm btn-primary mb-2">Kembali</a>
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table">
                            <tr>
                                <td>Nama Siswa</td>
                                <td>:</td>
                                <td>
                                    @php
                                        $nama_siswa = \App\Student::where('id', $payment->student_id)->first()->nama_siswa;
                                    @endphp
                                    {{ $nama_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>No Pembayaran</td>
                                <td>:</td>
                                <td>{{ $payment->code }}</td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>:</td>
                                <td>
                                    @if ($payment->status == 0)
                                        <div class="badge badge-danger">Belum Bayar</div>
                                    @elseif ($payment->status == 1)
                                        <div class="badge badge-success">Sudah Bayar</div>
                                    @elseif ($payment->status == 2)
                                        <div class="badge badge-info">Perlu dicek</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Jumah Pembayaran</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pembayaran Pendafataran</td>
                                        <td>Rp {{ number_format($payment->total) }}</td>
                                        <th><b>Rp {{ number_format($payment->total) }}</b></th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <h5>Grand Total</h5>
                                        </td>
                                        <td><h5>Rp {{ number_format($payment->total) }}</h5></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </main>
@endsection