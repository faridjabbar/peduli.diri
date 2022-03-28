@extends('template.app')

@section('content') 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap">
<div class="container">
    <div class="main-body">    
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
                @foreach ( $user as $p)
                @if ($p->id == Auth::user()->id)
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{$p->getFoto()}}" alt="foto" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>{{ $p->username }}</h4>
                  <div>{{ $p->nik }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-header">MyProfile</div>
            <div class="card-body">

            <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">NIK</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $p->nik ??="Isi NIK Anda"}}
                </div>
              </div>
              <hr>

            <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nama</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $p->name ??="Isi Nama Anda"}}
                </div>
              </div>
              <hr>

            <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $p->email}}
                </div>
              </div>
              <hr>

            <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nomor Telepon</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $p->telp }}
                </div>
              </div>
              <hr>

            <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Kota</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $p->alamat ??"Isi Kota Anda" }}
                </div>
              </div>
              <hr>

            <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-info "  href="/user/edit/{{ $p->id }}">Edit</a>
                  @if(auth()->user()->role == 'admin')
                  <a href="/user_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
                  @endif
                </div>
              </div>

            @endif
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection