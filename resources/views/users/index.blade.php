@extends ('layouts.master')

@section ('content')
{{-- <div class="container"> --}}
    <h1 class="text-center">Users List</h1>
    {{-- <div class="card-tools">
      <form action="" method="POST">
        <button type="submit" class="btn btn-flat btn-success" style="float: right" id="print"><span class="fas fa-print"></span>  Print</button>
      </form>
		</div> --}}




<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">
      <a type="button" class="btn btn-info" href="{{ route('users.create') }}">
          Add User
      </a>
  </h6>
</div>


{{-- ADD USER --}}

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="Close" data-dismiss="modal" aria-label="Close">
                        <a href="{{ route('users.index') }}"><span aria-hidden="true">&times;</span></a>
                    </button>
                  </div>



                  
        <form action="{{ $action }}" method="POST" >
          @csrf

          @isset($edit)
            @method("PATCH")
          @endisset


          <div class="modal-body">

            <div class="row">
              <div class="col">


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
              </div>


              <div class="col">
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
              </div>
            </div>




        <div class="row">
          <div class="col">

        <div class="mb-3 form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password"
          value="{{ old('password') ? old('password') : $user->password }}">
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
          </div>




          <div class="col">
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
          </div>
        </div>


        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-danger" data-dismiss="modal">Back</a>




          </div>

        </form>
                </div>
            </div>
</div>



    
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Users table</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usertype</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">last Login</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($findUsers as $user)
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            {{-- <div>
                              <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            </div> --}}
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> {{$user->name}} </h6>
                            </div>
                          </div>
                        </td>

                        <td>
                          <div class="d-flex px-2 py-1 text-center">
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> {{$user->email}} </h6>
                              
                            </div>
                          </div>
                        </td>


                        <td>
                          <div class="d-flex px-2 py-1 justify-content-center">
                            <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"> {{$user->role}} </h6>
                              
                            </div>
                          </div>
                        </td>



                        <td>
                            <div class="d-flex px-2 py-1 justify-content-center">
                              <div class="d-flex flex-column">
                              <h6 class="mb-0 text-sm"> {{$user->lastactivity}} </h6>
                                
                              </div>
                            </div>
                          </td>




                            <td>
                       <div class="d-flex px-2 py-1 justify-content-center">
                        @if(Auth::user()->isAdmin()  or Auth::user()->isDirector() or Auth::user()->isReceptionist())
                        <a type="submit" id="editUser" class="btn btn-info btn-sm" href="{{route('users.edit', ['id'=> $user->id])}}">
                          Edit
                        </a>
                        @endif


                        @if($user->trashed())
                        <button type="submit" class="btn btn-success btn-sm" onclick="restoreUser(this)">
                          <form action="{{route('users.restore', ['id'=> $user->id])}}" method="post">
                                  @csrf
                          </form>
                          Restore
                        </button>
                        @else
                        <button type="submit" class="btn btn-danger btn-sm" onclick="deleteUser(this)">
                          <form action="{{route('users.destroy', ['id'=> $user->id])}}" method="post">
                                  @method("DELETE")
                                  @csrf
                          </form>
                          Delete
                        </button>
                        @endif

                    </div>
                          </td>

                      </tr>
                  
                      @empty
                      <p>No User record found</p>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
 
        

@endsection

@push('scripts')

  <script>

          const windowLocation = window.location.href;
          const openForm = windowLocation.includes('create');
          if(openForm){
            const modalElement = document.getElementById('addUser'); 
            const addUserModal = bootstrap.Modal.getOrCreateInstance(modalElement);
      console.log(addUserModal);
          addUserModal.show();

          }
    </script>

@endpush
