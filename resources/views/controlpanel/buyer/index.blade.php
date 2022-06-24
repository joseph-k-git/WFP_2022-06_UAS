@extends('controlpanel.layout.conquer')

@section('content')

<h3 class="page-title">
    Daftar Pembeli <small>daftar semua akun buyer yang ada di apotik ini</small>
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
  <table class="table table-hover">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($buyers as $b)
      <tr id="tr_{{ $b->id }}">
        <td id="td_id_{{ $b->id }}"><b>{{ $b->id }}</b></a></td>
        <td id="td_name_{{ $b->id }}">{{ $b->name }}</td>
        <td id="td_email_{{ $b->id }}">{{ $b->email }}</td>
        <td>
          <a class='btn btn-info' href="{{ route('buyer.show', $b->id) }}">
            Transactions
          </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
