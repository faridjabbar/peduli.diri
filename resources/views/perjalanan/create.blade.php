@extends('template.app')

@section('content')
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Peduli Diri</title>
        <link rel="stylesheet" href={{asset('assets/vendors/feather/feather.css')}}>
        <link rel="stylesheet" href={{asset('assets/vendors/ti-icons/css/themify-icons.css')}}>
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href={{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}>
        <link rel="stylesheet" href={{asset('assets/vendors/ti-icons/css/themify-icons.css')}}>
        <link rel="stylesheet" type={{asset('assets/text/css')}} href={{asset('assets/js/select.dataTables.min.css' )}}>
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href={{asset('assets/css/vertical-layout-light/style.css')}}>
        <!-- endinject -->
        <link rel="shortcut icon" href={{asset('assets/images/favicon.png')}} />
    </head>
    <body>
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Buatlah Perjalanan Anda</h4>
              <p class="card-description">
                
              </p>
              <form method="post" action="/perjalanan/store">

                    {{ csrf_field() }}
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="date" name="tanggal" class="form-control" placeholder="tanggal">

                        @if($errors->has('tanggal'))
                            <div class="text-danger">
                                {{ $errors->first('tanggal')}}
                            </div>
                        @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Jam</label>
                  <div class="col-sm-9">
                    <input type="time" name="jam" class="form-control" placeholder="jam">

                        @if($errors->has('jam'))
                            <div class="text-danger">
                                {{ $errors->first('jam')}}
                            </div>
                        @endif                      
                    </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputMobile" class="col-sm-3 col-form-label">Lokasi</label>
                  <div class="col-sm-9">
                    <input type="text" name="lokasi" class="form-control" placeholder="lokasi">

                         @if($errors->has('lokasi'))
                            <div class="text-danger">
                                {{ $errors->first('lokasi')}}
                            </div>
                        @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Suhu Tubuh</label>
                  <div class="col-sm-9">
                    <input type="text" name="suhu_tubuh" class="form-control" placeholder="suhu tubuh">

                    @if($errors->has('suhu_tubuh'))
                        <div class="text-danger">
                            {{ $errors->first('suhu_tubuh')}}
                        </div>
                    @endif
                  </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Simpan</button>
                <a href="/perjalanan" class="btn btn-primary">Kembali</a>
              </form>
            </div>
          </div>
        </div>
    </body>
</html>
@endsection
<script src={{asset('assets/vendors/js/vendor.bundle.base.js')}}></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src={{asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')}}></script>
  <script src={{asset('assets/vendors/select2/select2.min.js')}}></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src={{asset('assets/js/off-canvas.js')}}></script>
  <script src={{asset('assets/js/hoverable-collapse.js')}}></script>
  <script src={{asset('assets/js/template.js')}}></script>
  <script src={{asset('assets/js/settings.js')}}></script>
  <script src={{asset('assets/js/todolist.js')}}></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src={{asset('assets/js/file-upload.js')}}></script>
  <script src={{asset('assets/js/typeahead.js')}}></script>
  <script src={{asset('assets/js/select2.js')}}></script>
  <!-- End custom js for this page-->