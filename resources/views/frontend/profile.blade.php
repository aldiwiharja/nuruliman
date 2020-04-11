@extends('frontend.layouts.app')

@section('content')
    @php
        $value = json_decode($profile_setting->value);
    @endphp
    <section id="header-profile" @if (file_exists($value->profile_bg)) style="background: url({{ url($value->profile_bg) }})" @else style="background: linear-gradient(45deg, #5E64EE, #5EEE66))" @endif>
        <div class="title">
            <h1>Profile</h1>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Sejarah Singkat</h1>
                    <hr>
                    <p>{!! $value->profile_sejarah !!}</p>
                    <h1>Visi Misi</h1>
                    <hr>
                    <p>{!! $value->profile_visi_misi !!}</p>
                </div>
            </div>
        </div>
    </section>
@endsection