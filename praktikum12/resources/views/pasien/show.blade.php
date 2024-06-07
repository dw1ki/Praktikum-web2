@include('admin.header')
@include('admin.sidebar')

<div class="container-fluid px-4">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title text-center">Detail Pasien</h3>
                            </div>
                            <div class="card-body">
                                <form>

                                    <div class="form-group row">
                                        <label for="kelurahan_id" class="col-sm-4 col-form-label">Kelurahan</label>
                                        <div class="col-sm-8">
                                            <input disabled id="kelurahan_id" name="kelurahan_id" type="text" class="form-control" value="{{ $pasien->kelurahan->nama }}">
                                            @error('kelurahan_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                                        <div class="col-sm-8">
                                            <input disabled id="kode" name="kode" type="text" class="form-control" value="{{ $pasien->kode }}">
                                            @error('kode')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input disabled id="nama" name="nama" type="text" class="form-control" value="{{ $pasien->nama }}">
                                            @error('nama')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tmp_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-8">
                                            <input disabled id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="{{ $pasien->tmp_lahir }}">
                                            @error('tmp_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-8">
                                            <input disabled id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="{{ $pasien->tgl_lahir }}">
                                            @error('tgl_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-8">
                                            <input disabled id="gender" name="gender" type="text" class="form-control" value="{{ $pasien->gender === 'L' ? 'Laki-Laki' : 'Perempuan' }}">
                                            @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input disabled id="email" name="email" type="email" class="form-control" value="{{ $pasien->email }}">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea disabled id="alamat" name="alamat" class="form-control" rows="3">{{ $pasien->alamat }}</textarea>
                                            @error('alamat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-4 col-sm-8">
                                            <a href="{{ route('pasien.index') }}" class="btn btn-primary">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>

@include('admin.footer')
