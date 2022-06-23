@extends('controlpanel.layout.conquer')

@section('content')
<div class="container">
    <h2>Form Tambah Medicine</h2>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>Tambah Data Obat
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('medicine.store') }}">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label for="Medicine">Medicine</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="Isikan nama obat">
                        <span class="help-block">
                        Tulis nama obat (medicine's name). </span>
                    </div>
                    <div class="form-group">
                        <label for="Form">Form</label>
                        <input type="text" class="form-control" id="" name="form" placeholder="Isikan form obat">
                        <span class="help-block">
                        Tulis bentuk obat (medicine's form). </span>
                    </div>
                    <div class="form-group">
                        <label for="Restriction">Restriction</label>
                        <input type="text" class="form-control" id="" name="restriction" placeholder="Isikan restriction obat">
                        <span class="help-block">
                        Tulis batasan obat (medicine's restriction). </span>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" class="form-control" id="" name="price" placeholder="Isikan harga jual obat">
                        <span class="help-block">
                        Tulis harga jual obat (medicine's retail price). </span>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option>-- pilih --</option>
                            @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ketersediaan</label>
                        <div class="checkbox-list">
                            <input type="checkbox" id="faskes1" name="faskes1" value="1">Faskes 1<br>
                            <input type="checkbox" id="faskes2" name="faskes2" value="1">Faskes 2<br>
                            <input type="checkbox" id="faskes3" name="faskes3" value="1">Faskes 3<br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar Obat</label>
                        <input type="file" accept="image/*" name="image">
                        <p class="help-block">
                            Medicine's Photo
                        </p>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
