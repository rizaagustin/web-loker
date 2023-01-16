@extends('layouts.app')

@section('content')
    <div class="container">   
        <div class="row">
            <div class="col-6">
                @if(session()->has('success'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Info Lowongan Kerja</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-2">
                        <table id="data1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            @php
                                $no=1;
                            @endphp

                            @foreach ($roles as $i => $role)
                                <tr>
                                    <td>{{  $no++;  }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('role-update')
                                        <a class="btn btn-sm btn-primary" title="Ubah" href="{{ route('dashboard.role.edit', $role->id) }}">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>                    
                                        @endcan               
                                        @can('role-delete')     
                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $role->id }}" title="Hapus">
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
            {{-- create --}}
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Role</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('dashboard.role.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
    
                            <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Name Role @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            
                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="bagian">Permissions</label>                            
                                <!-- checkbox -->
                                <div class="form-group clearfix">
                                    @foreach($permissions as $key => $permission)
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name = "permissions[]" value="{{ $permission->id }}" id="checkboxPrimary2">
                                        <label for="checkboxPrimary2">
                                            {{ $permission->name }}
                                        </label>
                                    </div>                                    
                                    @endforeach                              
                                </div>
                            </div>

                        </div>
            
                      <div class="card-footer">
                        @can('role-create')
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        @endcan
                      </div>
                    </form>
                </div>
                  <!-- /.card -->
            </div>
            {{-- akhir create --}}
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
                        url: "/dashboard/role/"+id,
                            data:     {
                                "id": id,
                                "_token": token
                            },
                            type: 'DELETE',
                            success: function (response) {
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