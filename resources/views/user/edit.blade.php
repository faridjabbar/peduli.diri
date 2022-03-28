@extends('template.app')

@section('content')

<div class="container bootstrap snippets bootdey">
    <form method="post"  action="/user/update/{{ $user->id }}"enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <h1 class="text-primary">Edit Profile</h1>
    <hr>
        <div class="row">
          <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                  <img src="{{$user->getFoto()}}" class="rounded-circle" width="150" alt="foto">
                  <h6>Unggah Foto Lain...</h6>
                  
                  <input type="file" name="foto" class="form-control" placeholder="foto" value="{{ $user->foto }}">

                    @if($errors->has('foto'))
                        <div class="text-danger">
                            {{ $errors->first('foto')}}
                        </div>
                    @endif

                </div>
            </div>
            <div class="col-md-9 personal-info">
                <div class="form-group">
                <h3>Personal info</h3>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">NIK</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="nik" type="text" value=" {{ $user->nik }} ">

                            @if($errors->has('nik'))
                                <div class="text-danger">
                                    {{ $errors->first('nik')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nama</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="name" type="text" value=" {{ $user->name }} ">
                            
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Username</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="username" type="text" value=" {{ $user->username }} ">
                            
                            @if($errors->has('username'))
                                <div class="text-danger">
                                    {{ $errors->first('username')}}
                                </div>
                            @endif

                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="email" type="email" value=" {{ $user->email }} ">

                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nomor Telepon</label>
                        <div class="col-lg-8">
                          <input class="form-control" name="telp" type="text" value=" {{ $user->telp }} ">

                            @if($errors->has('telp'))
                                <div class="text-danger">
                                    {{ $errors->first('telp')}}
                                </div>
                            @endif

                        </div>
                    </div>

                   <div class="form-group">
                        <ul class="list-unstyled">
                            <li class="d-flex">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <h5>Alamat</h5>
                                        <select class="form-control mt-3" id="selectProvinsi">
                                            <option>Provinsi</option>
                                        </select>
                                        <select class="form-control mt-3" id="selectKota">
                                            <option>Kota</option>
                                        </select>
                                        <select class="form-control mt-3" id="selectKecamatan">
                                            <option>Kecamatan</option>
                                        </select>
                                        <select class="form-control mt-3" id="selectKelurahan">
                                            <option>Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- end of card -->

                    <div class="form-group">
                        <ul class="list-unstyled">
                            <li class="d-flex">
                                <div class="col-lg-8">
                                    <h5>Full Alamat</h5>
                                    <textarea class="form-control" value="" name="alamat" id="alamat" rows="3">{{ $user->alamat }}
                                    </textarea>

                                    @if($errors->has('alamat'))
                                        <div class="text-danger">
                                            {{ $errors->first('alamat')}}
                                        </div>
                                    @endif

                                </div>
                            </li>
                        </ul>
                    </div> <!-- end of card -->
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="/home" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>   
    </form>
</div>
<script>
        let selectProvinsi = document.getElementById('selectProvinsi');
        let selectKota = document.getElementById('selectKota');
        let selectKecamatan = document.getElementById('selectKecamatan');
        let selectKelurahan = document.getElementById('selectKelurahan');
        let alamat = document.getElementById('alamat');
        document.addEventListener("DOMContentLoaded", function () {
            fetchProvinsi();
            selectKota.style.display = "none";
            selectKecamatan.style.display = "none";
            selectKelurahan.style.display = "none";
            // fetchKota();
            // fetchKecamatan();
            // fetchKelurahan();
            getValueToAlamat();
        });
        const config = {
            method: "GET"
        };
        async function fetchProvinsi() {
            const URL = 'http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
            await fetch(URL, config)
                .then(response => response.json())
                .then(provinsi => {
                    if (provinsi !== null || undefined) {
                        provinsi.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectProvinsi.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                }).catch(error => alert(`Data provinsi tidak ada`));
        }
        async function fetchKota(id) {
            const URL = `http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
                .then(response => response.json())
                .then(kota => {
                    if (kota !== null || undefined) {
                        kota.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKota.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                });
        }
        async function fetchKecamatan(id) {
            const URL = `http://www.emsifa.com/api-wilayah-indonesia/api/districts/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
                .then(response => response.json())
                .then(kecamatan => {
                    if (kecamatan !== null || undefined) {
                        kecamatan.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKecamatan.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                });
        }
        async function fetchKelurahan(id) {
            const URL = `http://www.emsifa.com/api-wilayah-indonesia/api/villages/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
                .then(response => response.json())
                .then(kelurahan => {
                    if (kelurahan !== null || undefined) {
                        kelurahan.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKelurahan.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                });
        }
        // selectProvinsi.addEventListener('change', () => {
        //     console.log(selectProvinsi.options[selectProvinsi.selectedIndex].text);
        // })
        selectProvinsi.addEventListener('change', () => {
            fetchKota(selectProvinsi.value);
            selectKota.style.display = "block";
            selectKota.innerHTML = '';
            selectKecamatan.innerHTML = '';
            selectKelurahan.innerHTML = '';
        });
        selectKota.addEventListener('change', () => {
            fetchKecamatan(selectKota.value);
            selectKecamatan.style.display = "block";
            selectKecamatan.innerHTML = '';
            selectKelurahan.innerHTML = '';
        });
        selectKecamatan.addEventListener('change', () => {
            fetchKelurahan(selectKecamatan.value);
            selectKelurahan.style.display = "block";
            selectKelurahan.innerHTML = '';
        });
        function getValueToAlamat() {
            alamat.addEventListener('change', () => {
                let alamatText = alamat.value;
                document.getElementById('alamat').value = `${alamatText}, ${selectKelurahan.options[selectKelurahan.selectedIndex].text}, ${selectKecamatan.options[selectKecamatan.selectedIndex].text}, ${selectKota.options[selectKota.selectedIndex].text}, ${selectProvinsi.options[selectProvinsi.selectedIndex].text}, `;
                // console.log(`${alamatText}, ${selectKelurahan.options[selectKelurahan.selectedIndex].text}, ${selectKecamatan.options[selectKecamatan.selectedIndex].text}, ${selectKota.options[selectKota.selectedIndex].text}, ${selectProvinsi.options[selectProvinsi.selectedIndex].text}, `);
            });
        }
    </script>
@endsection