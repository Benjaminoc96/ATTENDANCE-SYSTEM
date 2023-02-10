@extends ('layouts.master')

@section('title', $title)

@section ('content')

{{-- @if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif --}}



<form action="{{ $action }}" method="POST" >
    @csrf

    @isset($edit)
      @method("PATCH")
    @endisset

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name"
    value="{{ old('name') ? old('name') : $visitor->name }}">    
    @error('name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>



  <div class="mb-3">
    <label for="contact" class="form-label">Contact</label>
    <input type="tel" class="form-control @error('contact') is-invalid @enderror" name="contact" placeholder="Enter Phone Number" 
    value="{{ old('contact') ? old('contact') : $visitor->contact }}">
    @error('contact')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter address"
    value="{{ old('address') ? old('address') : $visitor->address }}">
    @error('address')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>


  <div class="mb-3">
    <label for="visitor_type" class="form-label">Visitor Type</label>
    <select class="form-control @error('visitor_type') is-invalid @enderror" name="visitor_type" id="visitor_type" required="required"
    value="{{ old('visitor_type') ? old('visitor_type') : $visitor->visitor_type }}">
      <option value="{{ $visitor->visitor_type }}">{{ $visitor->visitor_type }}</option>
      <option value="Visitor">Visitor</option>
    </select>
    @error('visitor_type')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>



  <div class="mb-3">
    <label for="department" class="form-label">Department</label>
    <select class="form-control @error('department') is-invalid @enderror" name="department" id="department" required="required">
      <option>Select Department</option>
      <option value="Faculty">Faculty</option>
      <option value="Research and Innovation">Research and Innovation</option>
    </select>
    @error('department')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="staff" class="form-label">Staff</label>
    <input type="text" class="form-control @error('staff') is-invalid @enderror" id="name" name="staff" placeholder="Enter staff"
    value="{{ old('staff') ? old('staff') : $visitor->staff }}">
    @error('staff')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="purpose" class="form-label">Purpose</label>
    <input type="text" class="form-control @error('purpose') is-invalid @enderror" id="name" name="purpose" placeholder="Enter purpose" 
    value="{{ old('purpose') ? old('purpose') : $visitor->purpose }}">
    @error('purpose')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <input type="hidden" name="log_type" value="OUT">

  <input type="hidden" name="visitor_type" value="visitor">

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('visitors.index')}}"class="btn btn-danger">Back</a>
</form>
@endsection

