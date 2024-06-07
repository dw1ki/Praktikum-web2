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
                                <h2 class="card-title text-center">Form Paramedik</h2>
                            </div>
                            <div class="card-body">
                                <form>

                                    <div class="form-group row">
                                        <label for="unit_kerja_id" class="col-4 col-form-label">Unit Kerja</label>
                                        <div class="col-8">
                                            <input disabled id="unit_kerja_id" name="unit_kerja_id" type="text" class="form-control" value="{{ $paramedik->unit_kerja->nama }}">
                                            @error('unit_kerja_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-4 col-form-label">Nama</label>
                                        <div class="col-8">
                                            <input disabled id="nama" name="nama" type="text" class="form-control" value="{{ $paramedik->nama }}">
                                            @error('nama')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-8">
                                            <input disabled id="gender" name="gender" type="text" class="form-control" value="{{ $paramedik->gender === 'L' ? 'Laki-Laki' : 'Perempuan' }}">
                                            @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                        <div class="col-8">
                                            <input disabled id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="{{ $paramedik->tmp_lahir }}">
                                            @error('tmp_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                        <div class="col-8">
                                            <input disabled id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="{{ $paramedik->tgl_lahir }}">
                                            @error('tgl_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kategori" class="col-4 col-form-label">Kategori</label>
                                        <div class="col-8">
                                            <input disabled id="kategori" name="kategori" type="text" class="form-control" value="{{ $paramedik->kategori }}">
                                            @error('kategori')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telpon" class="col-4 col-form-label">Telpon</label>
                                        <div class="col-8">
                                            <input disabled id="telpon" name="telpon" type="text" class="form-control" value="{{ $paramedik->telpon }}">
                                            @error('telpon')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                        <div class="col-8">
                                            <input disabled id="alamat" name="alamat" type="text" class="form-control" value="{{ $paramedik->alamat }}">
                                            @error('alamat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <a href="{{ route('paramedik.index') }}" class="btn btn-primary">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>

@include('admin.footer')
