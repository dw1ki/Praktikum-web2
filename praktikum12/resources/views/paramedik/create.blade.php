@include('admin.header')
@include('admin.sidebar')

<div class="container-fluid px-4">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- Bootstrap CSS -->
                    <div class="container mt-5">

                        <h2 class="text-center">Form Paramedik</h2>
                        <form action="{{ route('paramedik.store') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="unit_kerja_id" class="col-4 col-form-label">Pilih unit kerja</label>
                                <div class="col-8">
                                    <select id="unit_kerja_id" name="unit_kerja_id" class="custom-select">
                                        <option selected disabled>pilih unit kerja</option>
                                        @forelse ($list_unit_kerja as $unit_kerja)
                                        <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->nama }}</option>
                                        @empty
                                        <option selected disabled>no data!</option>
                                        @endforelse
                                    </select>
                                    @error('unit_kerja_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-4 col-form-label">Nama</label>
                                <div class="col-8">
                                    <input id="nama" name="nama" type="text" class="form-control">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-8">
                                    <select id="gender" name="gender" class="custom-select">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                <div class="col-8">
                                    <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                                    @error('tmp_lahir')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-8">
                                    <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
                                    @error('tgl_lahir')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kategori" class="col-4 col-form-label">Pilih unit kerja</label>
                                <div class="col-8">
                                    <select id="kategori" name="kategori" class="custom-select">
                                        <option selected disabled>pilih unit kerja</option>
                                        <option value="Perawat">Perawat</option>
                                        <option value="Bidan">Bidan</option>
                                        <option value="Apoteker">Apoteker</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('kategori')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telpon" class="col-4 col-form-label">Telpon</label>
                                <div class="col-8">
                                    <input id="telpon" name="telpon" type="tel" class="form-control">
                                    @error('telpon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                <div class="col-8">
                                    <input id="alamat" name="alamat" type="text" class="form-control">
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>

@include('admin.footer')
