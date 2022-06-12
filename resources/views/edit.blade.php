@extends('layout.main')
@section('judul', 'Data Pegawai')
@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update',$pegawai->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method ('PUT')
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" name="name" placeholder="name@example.com" value="{{ $pegawai->name }}">
                          @error('name')
                              <div class="text-warning">{{ $message }}</div>
                          @enderror
                          <label for="floatingInputGrid">Nama</label>
                        </div>

                        <div class="row g-2 mb-4">
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" name="nik" placeholder="name@example.com" value="{{ $pegawai->nik }}">     
                          @error('nik')
                          <div class="text-warning">{{ $message }}</div>
                          @enderror

                              <label for="floatingInputGrid">NIK</label>
                            </div>

                          </div>
                          <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" name="jk" aria-label="Default select example">
                                    <option selected>{{ $pegawai->jk }}</option>
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
                                <input type="text" class="form-control" name="jabatan" placeholder="name@example.com" value="{{ $pegawai->jabatan }}">     
                            @error('jabatan')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
  
                                <label for="floatingInputGrid">Jabatan</label>
                              </div>
  
                            </div>
                            <div class="col-md">
                              <div class="form-floating">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control" name="notelp" placeholder="name@example.com" value="{{ $pegawai->notelp }}">
                                    
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
                            <img src="{{ asset('fotopegawai/'.$pegawai->foto) }}" alt="" width="100px">
                          </div>

                        <div class="form-floating mb-4">
                          <textarea type="text" class="form-control" name="alamat" placeholder="name@example.com" style="height: 80px">{{ $pegawai->alamat }}</textarea>
                          
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