@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Lowongan Kerja</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('dashboard.infoloker.update',$loker->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lowongan @error('name') is-invalid @enderror" value="{{ old('nama', $loker->nama) }}" required>
                    
                      @error('nama')
                      <div class="invalid-feedback" style="display: block">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="bagian">Bagian</label>
                        <input type="text" class="form-control" name="bagian" id="bagian" placeholder="Masukan Bagian" value="{{ old('bagian', $loker->bagian) }}" required>

                        @error('bagian')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                          <div class="input-group date" id="tgl_mulai" data-target-input="nearest">
                              <input type="text" name="tgl_mulai" class="form-control datetimepicker-input datepicker" data-target="#tgl_mulai" value="{{ old('tgl_mulai', $loker->tgl_mulai) }}" required>
                              <div class="input-group-append" data-target="#tgl_mulai" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>

                              @error('tgl_mulai')
                              <div class="invalid-feedback" style="display: block">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                          <div class="input-group date" id="tgl_akhir" data-target-input="nearest">
                              <input type="text" name="tgl_akhir" class="form-control datetimepicker-input datepicker" data-target="#tgl_akhir" value="{{ old('tgl_akhir', $loker->tgl_akhir) }}" required>
                              <div class="input-group-append" data-target="#tgl_akhir" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>

                              @error('tgl_akhir')
                              <div class="invalid-feedback" style="display: block">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="persyaratan" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile" required></label>
                          </div>

                          @error('persyaratan')
                          <div class="invalid-feedback" style="display: block">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="Masukan Tanggal Akhir" value="{{ old('status', $loker->status) }}" required>

                        @error('status')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                  </div>
                  <!-- /.card-body -->
        
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
    </div>
</div>

@endsection

@push('after-script')
    <script>
    //Date picker
    $('#tgl_mulai').datetimepicker({
        format: 'Y-MM-DD',
        autoclose: true
    });

    $('#tgl_akhir').datetimepicker({
        format: 'Y-MM-DD',
        autoclose: true
    });


    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endpush
