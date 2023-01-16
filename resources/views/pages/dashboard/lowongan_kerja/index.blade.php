@extends('layouts.app')

@section('content')
    <div class="container">   
        <div class="row">
            <div class="col-12">
                @if(session()->has('success'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Info Lowongan Kerja</h3>

                        <div class="card-tools">
                        {{-- <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div> --}}
                        @can('infoloker-create')
                        <a class="btn btn-primary" href="{{ route('dashboard.infoloker.create') }}">Tambah Data</a>
                        @endcan
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-2">
                        <table id="data1" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>Nama</th>
                            <th>Bagian</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Akhir</th>
                            <th>Persyaratan</th>
                            <th>Status</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>                        
                            @foreach($data as $key => $loker)
                                <tr>
                                    <td>{{ $loker->nama }}</td>
                                    <td>{{ $loker->bagian }}</td>
                                    <td>{{ $loker->tgl_mulai }}</td>
                                    <td>{{ $loker->tgl_akhir }}</td>

                                    <td>{{ $loker->persyaratan }}</td>
                                    <td><span class="tag tag-success">{{ $loker->status }}</span></td>
                                    <td>
                                        @can('infoloker-update')
                                        <a href="{{ route('dashboard.infoloker.edit', $loker->id) }}"  class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        @endcan

                                        @can('infoloker-delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $loker->id }}" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>                                
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        //ajax delete
        function Delete(id){
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");
            Swal.fire({

                title: 'Apakah Kamu Yakin?',
                text: 'Ingin Menghapus Data Ini!',
                icon: 'warning',
                confirmButtonText: 'Yakin',
                showCancelButton: true,
                cancelButtonText: 'Tidak'

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    jQuery.ajax({
                        url: "/dashboard/infoloker/"+id,
                            data:     {
                                "id": id,
                                "_token": token
                            },
                            type: 'DELETE',
                            success: function (response) {
                                console.log(response);
                                if (response.status == "success") {
                                    // Swal.fire('Berhasil', 'Data Berhasil Dihapus', 'success')
                                    Swal.fire({
                                        title: 'Berhasil',
                                        icon: 'success',
                                        html: 'Data Sudah di hapus.',
                                        // timer: 2000,
                                        // timerProgressBar: true,
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });                            
                                }else{
                                    Swal.fire('Gagal', 'Data Gagal Dihapus', 'info')
                                    .then((result) => {
                                        location.reload();
                                    });                                    
                                }
                            }
                    });
                }   
            });
            return true;
            }
    </script>    
@endpush