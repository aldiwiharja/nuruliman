@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>FORMULIR SANTRI/PESERTA DIDIK BARU</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Tanggal Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="">Tanggal/Bulan/Tahun</span>
                                        </div>
                                        <select class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <select class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <input type="text" class="form-control" value="2021" readonly>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label>Pilih Program</label><br>
                                    <div class="">
                                        @foreach ($programs as $key => $p)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadio{{ $key }}" name="customRadio" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio{{ $key }}">{{ $p->name }}</label>
                                          </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection