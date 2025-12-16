@extends('dashboard.layout')
@section('content')

<h3>Dashboard</h3>
<div class="row">
<div class="col-md-4">
<div class="card text-bg-success">
<div class="card-body">
<h5>Total Berita Publish</h5>
<h2>{{ $totalPublish }}</h2>
</div>
</div>
</div>
</div>
@endsection