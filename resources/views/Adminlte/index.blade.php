@extends('home')
@section('content')
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Admin area</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('Adminlte.create') }}">Add User</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S/N</th>
<th>Name</th>
<th>Description</th>
<th>price</th>
<th>Medicine image</th>
<th width="280px">Action</th>
</tr>

@foreach ($medicines as $medicine)
<tr>
<td>{{ $medicine->id }}</td>
<td>{{ $medicine->name }}</td>
<td>{{ $medicine->description }}</td>
<td>{{ $medicine->price}}</td>
<td>{{ $medicine->med_image }}</td>
<td>{{ $company->dob }}</td>
<td>
<form action="{{route('Adminlte.delete',$medicine->id)}}" method="POST" enctype="multipart/form-data">
<a class="btn btn-primary" href="{{ route('Adminlte.edit',$medicine->id) }}">Edit</a>
    <a class="btn btn-secondary" href="{{ route('Adminlte.edit',$medicine->id) }}">View</a>
    @csrf
@method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $medicines->links() !!}
@endsection
