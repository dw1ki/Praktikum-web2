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

                        <h2 class="text-center">Form Periksa</h2>
                        <form action="{{ route('periksa.update', $periksa->id) }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="form-group row">
                                <label for="pasien_id" class="col-4 col-form-label">Pilih Pasien</label>
                                <div class="col-8">
                                    <select id="pasien_id" name="pasien_id" class="custom-select">
                                        <option selected disabled>Pilih pasien</option>
                                        @forelse ($list_pasien as $pasien)
                                        <option {{ $periksa->pasien_id === $pasien->id ? 'selected' : '' }} value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                        @empty
                                        <option selected disabled>no data!</option>
                                        @endforelse
                                    </select>
                                    @error('pasien_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dokter_id" class="col-4 col-form-label">Pilih dokter</label>
                                <div class="col-8">
                                    <select id="dokter_id" name="dokter_id" class="custom-select">
                                        <option selected disabled>pilih dokter</option>
                                        @forelse ($list_paramedik as $dokter)
                                        <option {{ $periksa->dokter_id === $dokter->id ? 'selected' : '' }} value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                        @empty
                                        <option selected disabled>no data!</option>
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
                                    <input id="tanggal" name="tanggal" type="date" class="form-control" value="{{ $periksa->tanggal }}">
                                    @error('tanggal')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="berat" class="col-4 col-form-label">Berat</label>
                                <div class="col-8">
                                    <input id="berat" name="berat" type="number" class="form-control" value="{{ $periksa->berat }}">
                                    @error('berat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tinggi" class="col-4 col-form-label">Tinggi</label>
                                <div class="col-8">
                                    <input id="tinggi" name="tinggi" type="number" class="form-control" value="{{ $periksa->tinggi }}">
                                    @error('tinggi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tensi" class="col-4 col-form-label">Tensi</label>
                                <div class="col-8">
                                    <input id="tensi" name="tensi" type="number" class="form-control" value="{{ $periksa->tensi }}">
                                    @error('tensi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                                <div class="col-8">
                                    <input id="keterangan" name="keterangan" type="text" class="form-control" value="{{ $periksa->keterangan }}">
                                    @error('keterangan')
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
