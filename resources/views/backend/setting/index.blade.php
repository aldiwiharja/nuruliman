@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Settings</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="col-lg-12">
                    @if(Session::has('msg'))
                        @section('script')
                            {!! Session::get('msg') !!}
                        @endsection
                    @endif
                    <h3>Setting Frontend</h3>
                    <div class="bs-component">
                      <ul class="nav nav-tabs">
                        <li>
                            <a class="nav-link active" data-toggle="tab" href="#slide">Banner</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="tab" href="#about">Sambutan Kepsek</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="tab" href="#profile">Profile</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="slide">
                          <div class="row">
                            <div class="col-md-12">
                                <h4>Upload Banner Disini</h4>
                                @php
                                    $banner_setting = json_decode($banner_setting->value);
                                @endphp
                                <div class="row">
                                    @foreach ($banner_setting as $key => $bs)
                                        <div class="col-md-6">
                                            <div class="card mt-2" style="background-size: cover; height: 30vh;background: url({{ url($bs) }})">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="{{ route('admin.hapus.banner', $key) }}" class="btn btn-trash btn-danger btn-sm text-white">
                                                                <i class="fa fa-times"></i> Hapus Banner
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <form class="text-center dropzone mt-4" method="POST" enctype="multipart/form-data" action="{{ route('admin.upload.banner') }}">
                                    @csrf
                                    <div class="dz-message">Klik disini untuk upload banner<br><small class="text-info">Tinggal seret file yang mau di upload</small></div>
                                </form>    
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="about">
                            @php
                                $kepsek_setting = json_decode($kepsek_setting->value);
                            @endphp  
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <table class="table">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{ $kepsek_setting->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td>{{ $kepsek_setting->jabatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Photo</td>
                                            <td>:</td>
                                            <td>
                                                <img src="{{ url($kepsek_setting->photo) }}" width="100">    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sambutan</td>
                                            <td>:</td>
                                            <td>{{ $kepsek_setting->sambutan }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('admin.update.kepsek') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{ $kepsek_setting->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan" value="{{ $kepsek_setting->jabatan }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Foto Kepala Sekolah</label>
                                            <input type="file" class="form-control" name="photo">
                                        </div>
                                        <div class="form-group">
                                            <label>Sambutan</label>
                                            <textarea id="" cols="10" rows="5" name="sambutan" class="form-control">{{ $kepsek_setting->sambutan }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block nav-item btn-primary">
                                                <i class="fa fa-refresh"></i> Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <div class="row">
                                @php
                                    $p = json_decode($profile_setting->value);
                                @endphp
                                <div class="col-md-12">
                                    <form action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Banner</label>
                                            <input type="file" name="profile_bg" class="form-control">
                                            <img src="{{ url($p->profile_bg) }}" alt="" height="100">
                                        </div>
                                        <div class="form-group">
                                            <label>Sejarah Singkat</label>
                                            <textarea name="profile_sejarah" class="form-control" cols="8" rows="5">{{ $p->profile_sejarah }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Visi Misi</label>
                                            <textarea name="profile_visi_misi" class="form-control" cols="8" rows="5">{{ $p->profile_visi_misi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary nav-item btn-block">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        </div>
    </div>
    </main>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('profile_visi_misi');
    CKEDITOR.replace('profile_sejarah');
</script>
@endsection