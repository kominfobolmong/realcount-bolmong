@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>File</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-file-image"></i> File</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('file.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('files.create')
                                <div class="input-group-prepend">
                                    <a href="{{ route('file.create') }}" class="btn btn-primary"
                                        style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                </div>
                                @endcan
                                <input type="text" class="form-control" name="q" placeholder="cari berdasarkan judul">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">DATA</th>
                                    <th scope="col">DOWNLOAD</th>
                                    <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($files as $no => $file)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($files->currentPage()-1) * $files->perPage() }}</th>
                                    <td>{{ $file->title }}</td>
                                    <td class="text-center">
                                        <img src='/public/download-files/{{ $file->data }}' />
                                        </td>
                                    <td>{{ $file->download }}</td>
                                    <td class="text-center">
                                    @can('files.edit')
                                            <a href="{{ route('file.edit', $file->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('files.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $file->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">Empty</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$files->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {


                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("file.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@stop
