@extends('layouts.main')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif

<form method="POST" action="{{route('visitors.store')}}">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{old('name')}}">
        @error('name')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
  </div>

  <div class="mb-3">
    <label for="contact" class="form-label">Contact</label>
    <input type="tel" class="form-control" name="contact" placeholder="Enter Phone Number" value="{{old('contact')}}">
        @error('contact')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
  </div>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" placeholder="Enter address" value="{{old('address')}}">
        @error('address')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
  </div>

  <div class="mb-3">
    <label for="department" class="form-label">Department</label>
    <select class="form-control" name="department" id="department">
      <option value="Faculty">Faculty</option>
      <option value="Research and Innovation">Research and Innovation</option>
    </select>
        @error('department')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Staff</label>
    <input type="text" class="form-control" id="name" name="staff" placeholder="Enter staff" value="{{old('staff')}}">
        @error('staff')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Purpose</label>
    <input type="text" class="form-control" id="name" name="purpose" placeholder="Enter purpose" value="{{old('purpose')}}">
        @error('purpose')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
  </div>
  <input type="hidden" name="visitor_type" value="visitor">

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('visitors.index')}}"class="btn btn-danger">Back</a>
</form>
@endsection

