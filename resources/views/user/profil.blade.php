@extends('layouts.master')

@section('title')
  Edit Profil
@endsection

@section('breadcrumb')
  @parent
  <li class="active">Edit Profil</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box">
        <div class="container">
        <form action="{{ route('setting.update')}}" method="post" data-toggle="validator" enctype="multipart/form-data" class="form-setting">
          @csrf
          <div class="box-body">
            <div class="alert alert-info alert-dismissible" style="display: none;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="icon fa fa-check"></i> Perubahan Berhasil Disimpan
            </div>
            <div class="form-group row">
              <label for="name" class="col-lg-2 control-label">Nama</label>
              <div class="col-lg-6">
                <input type="text" name="name" class="form-control" id="name" required autofocus>
                <span class="help-block with-errors"></span>
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-lg-2 control-label">Profil</label>
              <div class="col-lg-3">
                <input type="file" name="foto" class="form-control" id="foto"
                onchange="preview('.tampil-foto', this.files[0], 300)">
                <span class="help-block with-errors"></span>
                <br>
                <div class="tampil-foto"></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="old_password" class="col-lg-3 col-lg-offset-1 control-label">Password Lama</label>
              <div class="col-lg-6">
                  <input type="old_password" name="old_password" id="old_password" class="form-control" required>
                  <span class="help-block with-errors"></span>
              </div>
          </div>
            
            <div class="form-group row">
              <label for="password" class="col-lg-3 col-lg-offset-1 control-label">Password</label>
              <div class="col-lg-6">
                  <input type="password" name="password" id="password" class="form-control" required>
                  <span class="help-block with-errors"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="password_confirmation" class="col-lg-3 col-lg-offset-1 control-label">Konfirmasi Password</label>
              <div class="col-lg-6">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required
                  data-match="#password">
                  <span class="help-block with-errors"></span>
              </div>
          </div>
            
          </div>
          <div class="box-footer text-right">
            <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i>Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(function () {
        showData();

        $('.form-profil').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('.form-profil').attr('action'),
                    type: $('.form-profil').attr('method'),
                    data: new FormData($('.for-profil')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                 $('[name = name]').val(response.name);

                $('.tampil-foto').html(`<img src="{{ url('/') }}${response.foto}" width="200">`);
                    setTimeout(() => {
                        $('.alert').fadeOut();
                    }, 3000);
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
            }
        });
    });
  </script>
@endpush