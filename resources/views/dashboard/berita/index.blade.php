@extends('dashboard.layout')
@section('content')
<h3>Data Berita</h3>
<a href="/dashboard/berita/create" class="btn btn-primary mb-2">Tambah</a>
<table class="table table-bordered">
<tr>
<th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th>
</tr>
@foreach($beritas as $b)
<tr>
<td>{{ $b->judul }}</td>
<td>{{ $b->kategori }}</td>
<td>{{ $b->status==2?'Publish':'Draft' }}</td>
<td>
<a href="/dashboard/berita/{{ $b->id }}/edit" class="btn btn-sm btn-
warning">Edit</a>
<form action="/dashboard/berita/{{ $b->id }}" method="POST"
style="display:inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Hapus</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection