@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
<h5 class="mb-0">Employees</h5>
<div class="d-flex gap-2">
<form method="GET" class="d-flex">
{{--<input type="text" name="q" value="{{ $q }}" class="form-control me-2" placeholder="Search
name, email, phone, position">
<button class="btn btn-outline-primary" type="submit">Search</button> --}}
</form>
<a class="btn btn-primary" href="{{ url('/create') }}">+ Add Employee</a>

</div>
</div>
</div>
<div class="table-responsive mx-2">
<table class="table align-middle">
<thead>
<tr>
<th>Id</th>
<th>Name & Email</th>
<th>Phone</th>
<th>Position</th>
<th>Created At</th>
<th>Updated At</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
@if(!empty($employees))
@foreach($employees as $emp)
<tr>
<td>{{ $emp->id }}</td>
<td>
<div class="fw-semibold">{{ $emp->name }}</div>
<div class="text-muted small">{{ $emp->email }}</div>
</td>
<td>{{ $emp->phone ?: '—' }}</td>
<td><span class="badge badge-soft">{{ $emp->position ?: '—' }}</span></td>
<td class="text-muted">{{ $emp->created_at->format('d M Y') }}</td>
<td class="text-muted">{{ $emp->updated_at->format('d M Y') }}</td>
<td class="text-end">
<a href="{{ url('/employee/'.$emp->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
<form action="{{ route('employee_delete') }}" method="POST" class="d-inline" onsubmit="return
confirm('Delete this employee?');">
@csrf
<input type="hidden" name="id" value="{{ $emp->id }}">
<button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
@else
<tr><td colspan="6" class="text-center text-muted py-4">No employees found.</td></tr>
@endif
</tbody>

</table>
</div>
</div>
@endsection
Create.blade.php
@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
<h5 class="mb-0">Employees</h5>
<div class="d-flex gap-2">
<form method="GET" class="d-flex">
{{--<input type="text" name="q" value="{{ $q }}" class="form-control me-2" placeholder="Search
name, email, phone, position">
<button class="btn btn-outline-primary" type="submit">Search</button> --}}
</form>
<a class="btn btn-primary" href="{{ url('/create') }}">+ Add Employee</a>
</div>
</div>
</div>
<div class="table-responsive mx-2">
<table class="table align-middle">
<thead>
<tr>
<th>Id</th>
<th>Name & Email</th>
<th>Phone</th>
<th>Position</th>
<th>Created At</th>
<th>Updated At</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
@if(!empty($employees))
@foreach($employees as $emp)
<tr>
<td>{{ $emp->id }}</td>
<td>
<div class="fw-semibold">{{ $emp->name }}</div>
<div class="text-muted small">{{ $emp->email }}</div>

</td>
<td>{{ $emp->phone ?: '—' }}</td>
<td><span class="badge badge-soft">{{ $emp->position ?: '—' }}</span></td>
<td class="text-muted">{{ $emp->created_at->format('d M Y') }}</td>
<td class="text-muted">{{ $emp->updated_at->format('d M Y') }}</td>
<td class="text-end">
<a href="{{ url('/employee/'.$emp->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
<form action="{{ route('employee_delete') }}" method="POST" class="d-inline" onsubmit="return
confirm('Delete this employee?');">
@csrf
<input type="hidden" name="id" value="{{ $emp->id }}">
<button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
@else
<tr><td colspan="6" class="text-center text-muted py-4">No employees found.</td></tr>
@endif
</tbody>
</table>
</div>
</div>
@endsection

Edit.blade.php
@extends('layouts.app')
@section('title','Employee Update')
@section('content')
<div class="card-body">
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
<h5 class="mb-0">Employee Update</h5>
</div>
</div>
<form method="POST" name="employee_update" action="{{ route('employee_update',
$employee->id) }}">
@csrf
<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Name <span class="text-danger">*</span></label>
<input type="text" name="name" class="form-control" value="{{ $employee->name }}">

</div>
<div class="col-md-6">
<label class="form-label">Email <span class="text-danger">*</span></label>
<input type="email" name="email" class="form-control" value="{{ $employee->email }}">
</div>
<div class="col-md-6">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
</div>
<div class="col-md-6">
<label class="form-label">Position</label>
<input type="text" name="position" class="form-control" value="{{ $employee->position }}">
</div>
</div>
<div class="d-flex gap-2 mt-4">
<button class="btn btn-primary px-4" type="submit">Update</button>
<a href="{{ url('/list') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
</form>
@endsection
