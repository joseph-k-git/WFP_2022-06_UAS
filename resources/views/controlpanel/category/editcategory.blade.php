@extends('controlpanel.layout.conquer')

@section('content')
<div class="container">
    <h2>Form Tambah Category</h2>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>Tambah Data Category
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/medicine/'.$data->id) }}">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="form-group">
                        <label for="Medicine">Category</label>
                        <input value="{{ $data->generic_name }}" type="text" class="form-control" id="" name="name" placeholder="Isikan nama kategori">
                        <span class="help-block">
                        Tulis nama kategori (category's name). </span>
                    </div>                                  
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description">{{ $data->description }}</textarea>
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