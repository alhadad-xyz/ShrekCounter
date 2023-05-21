@extends('layouts.master')

@section('title')
    Member
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Member</li>
@endsection

@section('content')
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <button onclick="addForm('{{ route('member.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
              <button onclick="cetakMember('{{route('member.cetak_member')}}')" class="btn btn-info btn-xs btn-flat"><i class="fa fa-id-card"> Cetak Member</i></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <form action="" method="post" class="form-member">
                    @csrf
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th width="5%">
                                <input type="checkbox" name="select_all" id="select_all">
                            </th>
                            <th width="5%">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                    </table>
                </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      @includeIf('member.form')
@endsection

@push('scripts')
<script>
    let table;

$(function () {
    table = $('.table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('member.data') }}',
        },
        columns: [
            {data: 'select_all', searchable: false, sortable: false},
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'kode_member'},
            {data: 'nama'},
            {data: 'telepon'},
            {data: 'alamat'},
            {data: 'aksi', searchable: false, sortable: false},
        ]
    });

    $('#modal-form').validator().on('submit', function (e) {
        if (! e.preventDefault()) {
        $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
            .done((response) => {
                $('#modal-form').modal('hide');
                table.ajax.reload();
            })
            .fail((errors) => {
                alert('Tidak dapat menyimpan data');
                return;
            });
        }
    });

    $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
        });
});

function addForm(url) {
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Tambah Member');

    $('#modal-form form')[0].reset();
    $('#modal-form form').attr('action', url);
    $('#modal-form [name=_method]').val('post');
    $('#modal-form [name=nama]').focus();
}

function editForm(url) {
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Edit Member');

    $('#modal-form form')[0].reset();
    $('#modal-form form').attr('action', url);
    $('#modal-form [name=_method]').val('put');
    $('#modal-form [name=nama_kategori]').focus();

    $.get(url)
        .done((response) => {
            $('#modal-form [name=nama]').val(response.nama);
            $('#modal-form [name=telepon]').val(response.telepon);
            $('#modal-form [name=alamat]').val(response.alamat);
        })
        .fail((errors) => {
            alert('tidak dapat menampilkan data')
            return;
        });
}

function deleteData(url) {
        if (confirm('yakin nih mau ngapus data?')) {
            $.post(url, {
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'delete'
        })
        .done((response) => {
            table.ajax.reload();
        })
        .fail((errors) => {
            alert('tidak dapat menghapus data');
            return;
        });
    }
}

function cetakMember(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih data yang akan dicetak');
            return;
        } else {
            $('.form-member')
                .attr('target', '_blank')
                .attr('action', url)
                .submit();
        }
    }
</script>
@endpush

{{-- @push('scripts')
    <script>
        let table;

        $(function () {
            table = $('.table').DataTable({
                processing: true,
                autoWidth: false,
                // ajax: {
                //     url:'{{ route('kategori.data') }}',
                // }
            });
            
        //     $('#modal-form').validator().on('submit', function (e) {
        //        if (! e.preventDefault()) {
        //             $.ajax({
        //                 url: $('#modal-form form').attr('action'),
        //                 type: 'post',
        //                 data: $('#modal-form form').serialize()
        //             })
        //             .done((response) => {
        //                 $('mdodal-form').modal('hide');
        //                 table.ajax.reload();
        //             })
        //             .fail((errors) => {
        //                 alert('tidak dapat menyimpan data');
        //                 return;
        //             });
        //         } 
        //     }) 
        // });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Kategori');

            $('modal-form form')[0],reset();
            $('#modal-form form').attr('action', url);
            $('modal-form [name=_method]').val('post');
            $('modal-form [nama=nama_kategori]').focus();

        }
    </script>
@endpush --}}

