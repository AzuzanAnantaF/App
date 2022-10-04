@extends('layout.app')

@section('title') 
   Guru
@endsection

@section('content')
    <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Guru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Guru</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Guru</h3>
                        <div class="card-tools">
                            <button type="button" onclick="addForm('{{route('guru.store')}}')" class="btn btn-tool">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis kelamin</th>
                                    <th>Mapel</th>
                                    <th>Aksi</th>
                                </tr>    
                            </thead>
                        </table>   
                    </div>
                </div>
            </section>
@includeIF('guru.form')            
@endsection

@push('script')
<script>

    let table;

    $(function() {
        table = $('.table').DataTable({
            proccesing: true,
            autowitdh: false,
            ajax: {
                url: '{{ route('guru.data') }}'
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'nama'},
                {data: 'jenis_kelamin'},
                {data: 'mapel_id'},
                {data: 'aksi'}
            ]
        });
    })

    $('#modalForm').on('submit', function(e){
        if(! e.preventDefault()){
            $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
            .done((response) => {
                $('#modalForm').modal('hide');
                table.ajax.reload();
                iziToast.success({
                    title: 'sukses',
                    message: 'Data Berhasil Di-Update',
                    position: 'topRight'
                })
            })
            .fail((errors) => {
                iziToast.error({
                    title: 'gagal',
                    message: 'Data Gagal Di-Update',
                    position: 'topRight'
                })
                return;
            })
        }
    })

    function addForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Data');
        
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
    }

    function editData(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Data Guru');

        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('put');

        $.get(url)
        .done((response) => {
            $('#modalForm [name=nama]').val(response.nama);
        })
        .fail((errors) => {
            alert('Tidak dapat menampilkan data');
            return;
        })
    }

    function hapusData(url){

        swal({
            title: "Yakin ingin menghapus data ini?",
            text: "Jika Anda Klik Ok Maka data akan terhapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method' : 'delete'
            })

            .done((response) => {
                swal({
                    title: "Sukses",
                    text: "Data Berhasil dihapus",
                    icon: "success",
                });
                return;
            })

            .fail((errors) => {
                swal({
                    title: "Gagal",
                    text: "Data Gagal dihapus",
                    icon: "error",
                });
                return;
            })

            table.ajax.reload(); 
            }
        });
    }
</script>
@endpush
