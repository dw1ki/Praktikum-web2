@include('admin.header')
@include('admin.sidebar')

<div class="container-fluid px-4">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h2 class="text-center mb-4">Form Unit Kerja</h2>
                                <form>

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input disabled id="nama" name="nama" type="text" class="form-control" value="{{ $unit_kerja->nama }}">
                                            @error('nama')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-4 col-sm-8">
                                            <a href="{{ route('unit_kerja.index') }}" class="btn btn-primary">Kembali</a>
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
