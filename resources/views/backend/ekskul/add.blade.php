@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Tambah Ekskul</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-header">
                    <h2>Ekskul</h2>
                </div>
                <div class="tile-body">
                    <form action="{{ route('admin.ekskul.add.proses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Ekskul</label>
                            <input type="text" name="nama_ekskul" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Galeri</label>
                            <div id="upload-images">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="text-left">
                                            <button type="button" class="btn btn-primary" onclick="add_more_image()"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="file" name="galeri[]" id="image-1" class="form-control" data-multiple-caption="{count} files selected" accept="image/*" />
                                        <label for="image-1" class="mw-100 mb-3">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
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
@endsection