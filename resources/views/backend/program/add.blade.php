@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Tambah Program</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('admin.program') }}" class="btn btn-sm mb-2 btn-primary nav-item">Kembali</a>
            <div class="tile">
                <div class="tile-header">
                    <h2>Program</h2>
                </div>
                <div class="tile-body">
                    <form action="{{ route('admin.program.add.proses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Program</label>
                                    <input type="text" name="nama_program" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Program</label>
                                    <select name="kategori_program" class="form-control" required>
                                        <option value="">--Pilih Category--</option>
                                        <option value="sekolah">Sekolah</option>
                                        <option value="pesantren">Pesantren</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Program</label>
                                    <textarea name="desc_program" id="" cols="6" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Banner Program</label>
                                    <input type="file" name="banner_program" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Galeri Poto</label>
                                    <div id="upload-images">
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <button type="button" class="btn btn-primary" onclick="add_more_image()">
                                                    <i class="fa fa-plus"></i> Lebih Banyak
                                                </button>
                                            </div>
                                            <div class="col-md-auto">
                                                <input type="file" name="galeri[]" id="image-1" class="form-control" data-multiple-caption="{count} files selected" accept="image/*" />
                                                <label for="image-1" class="mw-100 mb-3">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection

@section('script')
    <script>
        var img_id = 2;
        function add_more_image(){
            var photoAdd =  '<div class="row">';
            photoAdd +=  '<div class="col-md-1">';
            photoAdd +=  '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            photoAdd +=  '</div>';
            photoAdd +=  '<div class="col-md-11">';
            photoAdd +=  '<input type="file" name="galeri[]" id="image-'+img_id+'" class="form-control" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            photoAdd +=  '<label for="image-'+img_id+'" class="mw-100 mb-3">';
            photoAdd +=  '</label>';
            photoAdd +=  '</div>';
            photoAdd +=  '</div>';
            $('#upload-images').append(photoAdd);
            img_id++;
        }
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }
    </script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('desc_program');
    </script>
@endsection
