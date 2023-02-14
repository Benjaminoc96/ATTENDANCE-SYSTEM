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

  <div class="mb-3 form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name"
    value="{{ old('name') ? old('name') : $user->name }}">    
    @error('name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>



  <div class="mb-3 form-group">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" 
    value="{{ old('email') ? old('email') : $user->email }}">
    @error('email')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>





  <div class="mb-3 form-group">
    <label for="password" class="form-label">Password</label>
    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password"
    value="{{ old('password') ? old('password') : $user->password }}">
    @error('password')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>




  <div class="mb-3 form-group">
    <label for="role" class="form-label">Usertype</label>
    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" 
    value="{{ old('role') ? old('role') : $user->role }}">
      <option value="Admin" {{ (old('role') == "Admin")? "selected" : "" }}>Admin</option>
      <option value="HR" {{ (old('role') == "HR")? "selected" : "" }}>HR</option>
      <option value="Receptionist" {{ (old('role') == "Receptionist")? "selected" : "" }}>Receptionist</option>
    </select>
    @error('role')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
   



  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('users.index')}}"class="btn btn-danger">Back</a>
</form>
@endsection

