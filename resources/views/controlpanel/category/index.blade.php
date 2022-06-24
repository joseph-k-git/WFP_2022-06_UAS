@extends('controlpanel.layout.conquer')

@section('content')
<!-- BEGIN Portlet PORTLET-->
<div class="portlet">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-reorder"></i>Daftar Kategori
    </div>
  </div>
  <a class='btn btn-info' href="{{ route('category.create') }}">
    Add New Category
  </a>
  <div class="portlet-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Category Name</th>
          <th>Description</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td><a href="/category/{{ $category->id }}">{{ $category->name }}</a></td>
          <td>{{ $category->description }}</td>
        </tr>
        <tr>
          <td colspan=4>
          @foreach ($category->medicines as $medicine)
            <div class="col-md-3" style="text-align:center; border:1px solid #999; border-radius:10px; margin:10px; padding:10px;">
              <img src="{{ asset('/images/'.$medicine->image) }}" height="120px"/><br>
              <b>{{ $medicine->generic_name }}</b><br>
              {{ $medicine->form }}
            </div>
          @endforeach
          </td>
          <td>
            <a href="{{ url('/category/'.$category->id.'/edit') }}" class='btn btn-warning'>
              Edit
            </a>
            <form method="POST" action="{{ url('/category/'.$category->id) }}">
              @csrf
              @method('DELETE')
              <input type="submit" value="Hapus" class="btn btn-xs btn-danger" onclick="if(!confirm('Are you sure want to delete this record {{ $category->name }}?')) return false;">
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- END Portlet PORTLET-->

<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content" id="showproducts">
      <div class="modal-header">
        <h4 class="modal-title">Detail Category</h4>
      </div>
      <div class="modal-body">
        <!--loading animated gif can put here-->
        <img src="{{ asset('/assets/img/ajax-modal-loading.gif') }}" alt="" class="loading">
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script>
    function showProducts(category_id)
    {
        $.ajax({
            type: 'GET',
            url: '{{ url("/report/listmedicine/") }}'+'/'+category_id,
            data: {
              '_token':'<?php echo csrf_token() ?>',
              'category_id':category_id,
            },
            success: function(data)
            {
                $('#showproducts').html(data);
            },
        });
    }
</script>
@endsection
