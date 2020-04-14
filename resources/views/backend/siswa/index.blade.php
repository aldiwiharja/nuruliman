@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Siswa</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('msg'))
                            @section('script')
                                {!! Session::get('msg') !!}
                            @endsection
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal daftar</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Program yang dipilih</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Dokumen Siswa</th>
                                        <th>Info Login</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $s)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $s->tgl_masuk }}</td>
                                            <td>{{ $s->nama_siswa }}</td>
                                            <td>{{ $s->jenis_kelamin }}</td>
                                            <td>{{ $s->program }}</td>
                                            <td>{{ $s->tgl_lahir_siswa }}</td>
                                            <td>
                                                <a href="#" onclick="showDocument({{ $s->id }})" class="nav-link">
                                                    <i class="fa fa-file"></i> Lihat Dokumen
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#infoLogin{{ $s->id }}">Lihat</button>
                                                <div class="modal fade" id="infoLogin{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
                                                    <div class="modal-content border-0">
                                                        <div class="modal-header" style="background: #009688">
                                                            <h5 class="modal-title text-white" id="exampleModalLongTitle">Informasi Login Siswa</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row justify-content-center">
                                                                <div class="col-11">
                                                                    @php
                                                                        $user = \App\User::where('student_id', $s->id)->first();
                                                                    @endphp
                                                                    <table>
                                                                        <tr>
                                                                            <td>email</td>
                                                                            <td>:</td>
                                                                            <td>{{ $user->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>password</td>
                                                                            <td>:</td>
                                                                            <td>123456</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.siswa.detail', encrypt($s->id)) }}" class="btn btn-info btn-sm nav-item">
                                                    <i class="fa fa-eye"></i> Lihat
                                                </a>
                                                <a href="{{ route('admin.siswa.edit', encrypt($s->id)) }}" class="btn btn-primary btn-sm nav-item">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteSiswa{{ $s->id }}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="deleteSiswa{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
                                            <div class="modal-content border-0">
                                                <div class="modal-header" style="background: #009688">
                                                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Hapus data user {{ $s->nama_siswa }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-11">
                                                            <h5>Apakah anda yakin ingin menghapus {{ $s->nama_siswa }} ?</h5>
                                                            <h6>Proses ini akan menghapus data pembayaran siswa juga</h6>
                                                            <a href="{{ route('admin.siswa.delete', encrypt($s->id)) }}" class="btn btn-block btn-danger nav-item">Ya Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
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

    <div class="modal fade" id="showDocs" tabindex="-1" role="dialog" aria-labelledby="showDocsLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="row" id="loader">
                    <div class="col">
                        <h1 class="text-center">
                            <i class="fa fa-spin fa-spinner"></i>
                        </h1>
                    </div>
                </div>
                <div id="showDocs-body">
    
                </div>
            </div>
        </div>
        </div>
@endsection

<script>
    function showDocument(id) {
        $('#showDocs-body').html(null);
        $('#showDocs').modal();
        $('#loader').show();
        var base_url = {!! json_encode(url('/')) !!};
        var url = base_url + '/admin/siswa-document/'+id;
        $.get(url, function(data) {
            $('#loader').hide();
            $('#showDocs-body').html(data);
        })
    }
</script>