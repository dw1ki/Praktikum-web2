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
                                <h2 class="card-title text-center">Form Periksa</h2>
                            </div>
                            <div class="card-body">
                                <form>

                                    <div class="form-group row">
                                        <label for="pasien_id" class="col-4 col-form-label">Pilih Pasien</label>
                                        <div class="col-8">
                                            <select disabled id="pasien_id" name="pasien_id" class="custom-select">
                                                <option selected disabled>Pilih Pasien</option>
                                                @forelse ($list_pasien as $pasien)
                                                    <option {{ $periksa->pasien_id === $pasien->id ? 'selected' : '' }} value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                                @empty
                                                    <option disabled>Tidak ada data pasien</option>
                                                @endforelse
                                            </select>
                                            @error('pasien_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dokter_id" class="col-4 col-form-label">Pilih Dokter</label>
                                        <div class="col-8">
                                            <select disabled id="dokter_id" name="dokter_id" class="custom-select">
                                                <option selected disabled>Pilih Dokter</option>
                                                @forelse ($list_paramedik as $dokter)
                                                    <option {{ $periksa->dokter_id === $dokter->id ? 'selected' : '' }} value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                                @empty
                                                    <option disabled>Tidak ada data dokter</option>
                                                @endforelse
                                            </select>
                                            @error('dokter_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                                        <div class="col-8">
                                            <input disabled id="tanggal" name="tanggal" type="date" class="form-control" value="{{ $periksa->tanggal }}">
                                            @error('tanggal')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="berat" class="col-4 col-form-label">Berat</label>
                                        <div class="col-8">
                                            <input disabled id="berat" name="berat" type="number" class="form-control" value="{{ $periksa->berat }}">
                                            @error('berat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tinggi" class="col-4 col-form-label">Tinggi</label>
                                        <div class="col-8">
                                            <input disabled id="tinggi" name="tinggi" type="number" class="form-control" value="{{ $periksa->tinggi }}">
                                            @error('tinggi')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tensi" class="col-4 col-form-label">Tensi</label>
                                        <div class="col-8">
                                            <input disabled id="tensi" name="tensi" type="number" class="form-control" value="{{ $periksa->tensi }}">
                                            @error('tensi')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                                        <div class="col-8">
                                            <input disabled id="keterangan" name="keterangan" type="text" class="form-control" value="{{ $periksa->keterangan }}">
                                            @error('keterangan')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <a href="{{ route('periksa.index') }}" class="btn btn-primary">Kembali</a>
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
