@extends('home')
@section('content')
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit medicine</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('Adminlte.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('Adminlte.update',$medicine->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" value="{{ $medicine->name }}" class="form-control"
       placeholder="Enter the First Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<input type="text" name="description" value="{{ $medicine->descritpion }}" class="form-control" placeholder="Enter the description">
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Price:</strong>
<input type="number" name="price" class="form-control" placeholder="Medicine price" value="{{ $medicine->price }}">
@error('price')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Medicine image:</strong>
<input type="text" name="med_image" value="{{ $medicine->med_image }}" class="form-control" placeholder="upload medicine image">
@error('med_image')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Update</button>
</div>Adminlte.index
</form>
</div>
@endsection
