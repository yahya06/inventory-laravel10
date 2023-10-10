@extends('layout.layout')

@section('content')

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Data Master</a></li>
                <li class="breadcrumb-item active"><a href="">{{ $title }}</a></li>
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
                            <h4 class="card-title">{{ $title }}</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode SKU</th>
                                        <th>Nama Barang</th>
                                        <th>Category</th>
                                        <th>Harga</th>
                                        <th>Safety Stock</th>
                                        <th>Stock</th>
                                        <th>Satuan</th>
                                        <th>Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($dataBarang as $row)
                            
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->sku }}</td>
                                        <td>{{ $row->nama_barang }}</td>
                                        <td>{{ $row->nama_category }}</td>
                                        <td>Rp. {{ number_format($row->harga) }}</td>
                                        <td>{{ $row->stok_min }}</td>
                                        <td>{{ $row->stok }}</td>
                                        <td>{{ $row->satuan }}</td>
                                        <td>{{ $row->kelas }}</td>

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

<!-- Modal Create Barang -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="POST" action="/barang/store">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>SKU</label>
                            <input class="form-control input-default" type="text" name="sku" id="" placeholder="" value="WH-" required>
                        </div>
                        <div class="form-group col-md-9">
                            <label>Nama Barang</label>
                            <input class="form-control input-default" type="text" name="nama_barang" id="" placeholder="Nama Barang..." required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Kategori Barang</label>
                            <select class="form-control input-default" name="category" id="" required>
                                <option value="" hidden>-- Pilih Kategori --</option>
                                @foreach ( $dataCategory as $j )
                                    <option value="{{ $j->id }}">{{ $j->nama_category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kelas</label>
                            <select class="form-control input-default" name="kelas" id="">
                                <option value="" hidden>-- Pilih Kelas --</option>
                                <option value="A">Kelas A</option>
                                <option value="B">Kelas B</option>
                                <option value="C">Kelas C</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Safety Stock</label>
                            <input class="form-control input-default" type="number" name="min_stok" id="" placeholder="" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Stok</label>
                            <input class="form-control  input-default" type="number" name="stok" id="" placeholder="Stok..." required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Satuan</label>
                            <select class="form-control input-default" name="satuan" id="" required>
                                <option value="" hidden>-- Pilih Satuan --</option>
                                <option value="Kg">Kg</option>
                                <option value="Meter">Meter</option>
                                <option value="Gram">Gram</option>
                                <option value="Pcs">Pcs</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Rp. </span>
                                </div>
                                <input type="number" class="form-control input-default" name="harga" placeholder="Harga..." required>
                            </div>
                        </div>
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


<!-- Modal Edit barang -->
@foreach($dataBarang as $d)
<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="POST" action="/barang/update/{{ $d->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>SKU</label>
                            <input class="form-control input-default" type="text" name="sku" id="" placeholder="" value="{{ $d->sku }}" readonly>
                        </div>
                        <div class="form-group col-md-9">
                            <label>Nama Barang</label>
                            <input class="form-control input-default" type="text" name="nama_barang" id="" value="{{ $d->nama_barang }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Kategori Barang</label>
                            <select class="form-control input-default" name="category" id="" required>
                                <option value="{{ $d->category }}">{{ $d->nama_category }}</option>
                                @foreach ( $dataCategory as $j )
                                    <option value="{{ $j->id }}">{{ $j->nama_category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kelas</label>
                            <select class="form-control input-default" name="kelas" id="">
                                <option <?php if( $d['kelas']=="A") echo "selected"; ?> value="A">Kelas A</option>
                                <option <?php if( $d['kelas']=="B") echo "selected"; ?> value="B">Kelas B</option>
                                <option <?php if( $d['kelas']=="C") echo "selected"; ?> value="C">Kelas C</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Safety Stock</label>
                            <input class="form-control input-default" type="number" name="min_stok" id="" placeholder="" value="{{ $d->stok_min }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Stok</label>
                            <input class="form-control  input-default" type="number" name="stok" id="" value="{{ $d->stok }}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Satuan</label>
                            <select class="form-control input-default" name="satuan" id="" required>
                                <option <?php if( $d['satuan']=="Kg") echo "selected"; ?> value="Kg">Kg</option>
                                <option <?php if( $d['satuan']=="Meter") echo "selected"; ?> value="Meter">Meter</option>
                                <option <?php if( $d['satuan']=="Gram") echo "selected"; ?> value="Gram">Gram</option>
                                <option <?php if( $d['satuan']=="Pcs") echo "selected"; ?> value="Pcs">Pcs</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Rp. </span>
                                </div>
                                <input type="number" class="form-control input-default" name="harga" value="{{ $d->harga }}" required>
                            </div>
                        </div>
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
@foreach($dataBarang as $c)
<div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="GET" action="/barang/destroy/{{ $c->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah anda yakin menghapus barang {{ $c->nama_barang }} ?</h5>
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