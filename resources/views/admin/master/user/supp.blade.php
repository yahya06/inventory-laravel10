@extends('layout.layout')

@section('content')

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-item-center">
                            <h4 class="card-title">Data {{ $title }}</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplyer</th>
                                        <th>Category Supplyer</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($dataSupplyer as $row)
                            
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_supplier }}</td>
                                        <td>{{ $row->jenis_supplier }}</td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td>
                                            <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-s btn-primary"><i class="fa fa-edit"> Edit</i></a>
                                            <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-s btn-danger"><i class="fa fa-trash"> Delete</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create User -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Data {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="POST" action="/supplyer/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Supplyer</label>
                        <input class="form-control" type="text" name="nama_supplier" id="" placeholder="Nama Supplyer..." required>
                    </div>
                    <div class="form-group">
                        <label>Category Supplyer</label>
                        <select class="form-control" name="jenis_supplier" id="" required>
                            <option value="" hidden>-- Pilih Category --</option>
                            <option value="kain">Kain</option>
                            <option value="aksesoris">Aksesoris</option>
                            <option value="perkakas">Perkakas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" type="text" name="keterangan" id="" placeholder="Keterangan Supplyer..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit User -->
@foreach($dataSupplyer as $d)
<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="POST" action="/supplyer/update/{{ $d->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Supplyer</label>
                        <input class="form-control" type="text" value="{{ $d->nama_supplier }}" name="nama_supplier" id="" placeholder="Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label>Category Supplyer</label>
                        <select class="form-control" name="jenis_supplier" id="" required>
                            <option <?php if( $d['jenis_supplier']=="kain") echo "selected"; ?> value="kain">Kain</option>
                            <option <?php if( $d['jenis_supplier']=="aksesoris") echo "selected"; ?> value="aksesoris">Aksesoris</option>
                            <option <?php if( $d['jenis_supplier']=="perkakas") echo "selected"; ?> value="perkakas">Perkakas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" type="text" value="{{ $d->keterangan }}" name="keterangan" id="" placeholder="Keterangan Supplyer..." >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Delete User -->
@foreach($dataSupplyer as $c)
<div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="GET" action="/supplyer/destroy/{{ $c->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah anda yakin menghapus <u>{{ $c->nama_supplier }}</u> dari data {{ $title }} ?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection