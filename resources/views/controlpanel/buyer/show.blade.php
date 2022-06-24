
@extends('controlpanel.layout.conquer')

@section('content')

<h3 class="page-title">
    Daftar Transaksi {{ $buyer->name }} <small>daftar semua transaksi pembeli id {{ $buyer->id }}</small>
</h3>
<div class="page-bar">
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
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($transactions as $d)
      <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->transaction_date }}</td>
        <td>Rp{{ number_format($totals[$d->id], 0, ',', '.') }}</td>
        <td>
            <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData({{ $d->id }})">
                Lihat Rincian Pembelian
            </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
            </div>
            <div class="modal-body" id="msg">
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
    function getDetailData(id) {
        $.ajax({
            type:'POST',
            url:'{{ route("transaction.showAjax") }}',
            data:'_token=<?php echo csrf_token() ?> &id='+id,
            success: function(data) {
                $("#msg").html(data.msg);
            },
        });
    }
</script>

@endsection
