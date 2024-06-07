@include('admin.header')
@include('admin.sidebar')

<div class="container-fluid px-4">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @session('success')
            <div class="info-box bg-success">
                <div class="info-box-content">
                    <span class="info-box-text">{{ session('success') }}</span>
                </div>
            </div>
        @endsession

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Data Unit Kerja</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Unit Kerja</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Unit Kerja</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="my-4">Daftar Unit Kerja</h1>
                        <a href="{{ route('unit_kerja.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>Tambah</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_unit_kerja as $unit_kerja)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit_kerja->nama}}</td>
                                    <td class="d-flex">
                                        <a  href="{{ route('unit_kerja.show', $unit_kerja->id) }}" class="btn btn-primary mr-2"><i class="bi bi-eye"></i></a>
                                        <a  href="{{ route('unit_kerja.edit', $unit_kerja->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>

                                        <form action="{{ route('unit_kerja.destroy', $unit_kerja->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mr-2"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Unit_Kerja
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>

@include('admin.footer')
