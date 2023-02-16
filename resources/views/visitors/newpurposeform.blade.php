@extends ('layouts.master')

@section('title', $title)

@section ('content')

<div class="card card-outline card-primary">

<form action="{{ $action }}" method="POST" >
    @csrf

    {{-- @isset($edit)
      @method("PUT")
    @endisset --}}


    <input type="text" value="{{ $visitor->id }}" name="id" id="">

<br><br>


  <div class="mb-3">
    <label for="department" class="form-label">Department</label>
    <select class="form-control @error('department') is-invalid @enderror" name="department" id="department">
      <option>Select Department</option>
      <option value="Faculty" {{ (old('department') == "Faculty")? "selected" : "" }}>Faculty</option>
      <option value="Research and Innovation" {{ (old('department') == "Research and Innovation")? "selected" : "" }}>Research and Innovation</option>
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
    value="{{ old('staff') }}">
    @error('staff')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>




  <div class="mb-3">
    <label for="purpose" class="form-label">Purpose</label>
    <input type="text" class="form-control @error('purpose') is-invalid @enderror" id="name" name="purpose" placeholder="Enter purpose" 
    value="{{ old('purpose') }}">
    @error('purpose')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('visitors.index')}}"class="btn btn-danger">Back</a>
</form>
</div>
@endsection

