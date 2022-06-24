@extends('controlpanel.layout.conquer')

@section('content')

<h3 class="page-title">
    Obat Terlaris <small>daftar lima obat terlaris yang ada di apotik ini</small>
</h3>
<div class="page-bar">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Medicine</a>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
    <div class="page-toolbar">
        <!-- tempat action button -->
    </div>
</div>

<div class="container">
  <a class='btn btn-info' href="{{ route('medicine.create') }}">
    Add New Medicine
  </a>
  
  <a href="#modalCreate" data-toggle="modal" class="btn btn-info">
    Add Medicine with Modal
  </a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Form</th>
        <th>Restriction</th>
        <th>Quantity</th>
        <th>Foto</th>
        <th>Harga</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
    @foreach($result as $d)
      <tr id="tr_{{ $d->id }}">
        <td id="td_name_{{ $d->id }}"><a href="/medicine/{{ $d->id }}" target="_blank"><b>{{ $d->generic_name }}</b></a></td>
        <td id="td_form_{{ $d->id }}">{{ $d->form }}</td>
        <td id="td_restriction_{{ $d->id }}">{{ $d->restriction_formula }}</td>
        <td id="td_quantity_{{ $d->id }}">{{ $d->jumlah_per_medicine }}</td>
        <td id="td_image_{{ $d->id }}">
          <a href="#detail_{{ $d->id }}" data-toggle="modal">
            <img id="image_container_{{ $d->id }}" src="{{ asset('/images/'.$d->image) }}" height="100px"/>
          </a>
        </td>
        <td id="td_price_{{ $d->id }}">{{ $d->price }}</td>
        <td>
          <a class='btn btn-info' href="{{ route('medicine.show', $d->id) }}" data-target="#show{{$d->id}}" data-toggle='modal'>
            Detail
          </a>
          <a href="{{ url('/medicine/'.$d->id.'/edit') }}" class="btn btn-xs btn-warning">Edit</a>
          <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-warning" onclick="getEditFormA({{ $d->id }})">Edit A</a>
          <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-warning" onclick="getEditFormB({{ $d->id }})">Edit B</a>
          @can('admin-action_any')
          <a class="btn btn-xs btn-danger" onclick="if(confirm('Apakah Anda yakin menghapus {{ $d->generic_name }}?')) deleteDataRemoveTR({{ $d->id }})">DEL</a>
          <form method="POST" action="{{ url('/medicine/'.$d->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Hapus" class="btn btn-danger" onclick="if(!confirm('Are you sure want to delete this record {{ $d->generic_name }}?')) return false;">
          </form>
          @endcan
        </td>
      </tr>

      <div class="modal fade" id="detail_{{$d->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{$d->generic_name}}</h4>
            </div>
            <div class="modal-body">
              <img src="{{ asset('/images/'.$d->image) }}" height="400px"><br>
              <b>Description:</b><br>
              {{ $d->restriction_formula }}
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="show{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <img src="{{ asset('/assets/img/ajax-modal-loading.gif') }}" alt="" class="loading">
          </div>
        </div>
      </div>
    </td>
    @endforeach
    </tbody>
  </table>
</div>

<div class="container">
  <h2>Apotek Joseph</h2>
  <div class="row">
  @foreach ($result as $d)
    <div class="col-md-3" style="text-align:center; border:1px solid #999; border-radius:10px; margin:10px; padding:10px;">
      <img src="{{ asset('/images/'.$d->image) }}" height="120px"/><br>
      <a href="/medicine/{{ $d->id }}" target="_blank"><b>{{ $d->generic_name }}</b></a><br>
      {{ $d->form }}
    </div>
  @endforeach
  </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" >
      <form ole="form" enctype="multipart/form-data" method="POST" action="{{ route('medicine.store') }}">
        @csrf
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add New Medicine</h4>
        </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modalEditContent">
      <div style="text-align:center;">
        <img src="{{ asset('assets/img/loading.gif') }}">
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script>
    function getEditFormA(id)
    {
        $.ajax({
            type: 'POST',
            url: '{{ route("medicine.getEditFormA") }}',
            data: {
              '_token':'<?php echo csrf_token() ?>',
              'id':id,
            },
            success: function(data)
            {
                $('#modalEditContent').html(data.msg);
            },
        });
    }

    function getEditFormB(id)
    {
        $.ajax({
            type: 'POST',
            url: '{{ route("medicine.getEditFormB") }}',
            data: {
                '_token':'<?php echo csrf_token() ?>',
                'id':id,
            },
            success: function(data)
            {
                $('#modalEditContent').html(data.msg);
            },
        });
    }

    function saveDataUpdateTD(id)
    {
        var eName = $('#eName').val()
        var eForm = $('#eForm').val()
        var eRestriction = $('#eRestriction').val()
        var ePrice = $('#ePrice').val()
        var eCategory = $('#eCategory').val()
        var eFaskes1= 0 + $('#eFaskes1').is(":checked")
        var eFaskes2= 0 + $('#eFaskes2').is(":checked")
        var eFaskes3= 0 + $('#eFaskes3').is(":checked")
        var eDescription = $('#eDescription').val()
        var eImage = $('#eImage').prop('files')[0];

        var formData = new FormData()
        formData.append('_token', '<?php echo csrf_token() ?>')
        formData.append('id', id)
        formData.append('name', eName)
        formData.append('form', eForm)
        formData.append('restriction', eRestriction)
        formData.append('price', ePrice)
        formData.append('category', eCategory)
        formData.append('faskes1', eFaskes1)
        formData.append('faskes2', eFaskes2)
        formData.append('faskes3', eFaskes3)
        formData.append('description', eDescription)
        formData.append('image', eImage);

        var dir = '{{ asset("images/") }}'+'/'

        $.ajax({
            type: 'POST',
            url: '{{ route("medicine.saveData") }}',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data)
            {
                if (data.status=='OK') {
                    $('#td_name_'+id).html('<a href="/medicine/'+id+'" target="_blank"><b>'+eName+'</b></a>');
                    $('#td_form_'+id).html(eForm);
                    $('#td_restriction_'+id).html(eRestriction);
                    $('#td_price_'+id).html(ePrice);
                    $('#td_category_'+id).html(data.category_name);
                    $('#td_description_'+id).html(eDescription);
                    $('#image_container_'+id).attr('src', dir+data.image)
                    $('#pesan').html(data.msg);
                    $('#pesan').show();
                }
            },
        });
    }

function deleteDataRemoveTR(id)
{
    $.ajax({
        type: 'POST',
        url: '{{ route("medicine.deleteData") }}',
        data: {
          '_token':'<?php echo csrf_token() ?>',
          'id':id,
        },
        success: function(data)
        {
            if (data.status=='OK') {
                $('#tr_'+id).remove();
            }
            alert(data.msg);
        },
    });
}
</script>
@endsection
