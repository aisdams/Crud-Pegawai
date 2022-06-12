@extends('layout.main')
@section('judul', 'Data Pegawai')
@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('simpan') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" name="name" placeholder="name@example.com">
                          @error('name')
                              <div class="text-warning">{{ $message }}</div>
                          @enderror
                          <label for="floatingInputGrid">Nama</label>
                        </div>

                        <div class="row g-2 mb-4">
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" name="nik" placeholder="name@example.com">     
                          @error('nik')
                          <div class="text-warning">{{ $message }}</div>
                          @enderror

                              <label for="floatingInputGrid">NIK</label>
                            </div>

                          </div>
                          <div class="col-md">
                            <div class="form-floating">
                              <select class="form-select" id="floatingSelectGrid" name="jk">
                                <option selected>selects gender</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <label for="floatingSelectGrid">selects gender</label>
                            </div>
                          </div>
                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="jabatan" placeholder="name@example.com">     
                            @error('jabatan')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
  
                                <label for="floatingInputGrid">Jabatan</label>
                              </div>
  
                            </div>
                            <div class="col-md">
                              <div class="form-floating">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control" name="notelp" placeholder="name@example.com">
                                    
                                    @error('notelp')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
          
                                    <label for="floatingInputGrid">No Telpon</label>
                                  </div>
                              </div>
                            </div>
                          </div>
  
                          <div class="mb-3" style="margin-top: -1.5rem">
                            <label for="formFileMultiple" class="form-label">Masukkan Gambar</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple name="foto">
                          </div>

                        <div class="form-floating mb-4">
                          <textarea type="text" class="form-control" name="alamat" placeholder="name@example.com" style="height: 80px"></textarea>
                          
                          @error('alamat')
                              <div class="text-warning">{{ $message }}</div>
                          @enderror

                          <label for="floatingInputGrid">Alamat</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection