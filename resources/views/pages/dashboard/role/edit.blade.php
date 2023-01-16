@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">UBAH ROLE {{ $role->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('dashboard.role.update',$role->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">

                    <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Name Role @error('name') is-invalid @enderror" value="{{ old('name',$role->name) }}" required>
                    
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
                                <input type="checkbox" name = "permissions[]" value="{{ $permission->id }}" id="check-{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif>
                                <label for="check-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>                                    
                            @endforeach                              
                        </div>
                    </div>

                </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection