@extends ('layouts.master')

@section ('content')
{{-- <div class="container"> --}}
    <h1 class="text-center">Visitors List</h1>
    <div class="card-tools">
			<button type="submit" class="btn btn-flat btn-success" style="float: right" id="print"><span class="fas fa-print"></span>  Print</button>
		</div>

    {{-- <div>
        <a href="{{route('visitors.create')}}" class="btn btn-primary">Add</a>
    </div> --}}

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addvisitor">
          Add Visitor
      </button>
  </h6>
</div>




<div class="modal fade" id="addvisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Add New Visitor</h5>
             <button type="button" class="Close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
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
  value="{{ old('name') ? old('name') : $visitor->name }}">    
  @error('name')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
      </div>


      <div class="col">
<div class="mb-3 form-group">
  <label for="contact" class="form-label">Contact</label>
  <input type="tel" class="form-control @error('contact') is-invalid @enderror" name="contact" placeholder="Enter Phone Number" 
  value="{{ old('contact') ? old('contact') : $visitor->contact }}">
  @error('contact')
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
  <label for="address" class="form-label">Address</label>
  <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter address"
  value="{{ old('address') ? old('address') : $visitor->address }}">
  @error('address')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
  </div>




  <div class="col">
<div class="mb-3 form-group">
  <label for="visitor_type" class="form-label">Visitor Type</label>
  <select class="form-control @error('visitor_type') is-invalid @enderror" name="visitor_type" id="visitor_type" required="required"
  value="{{ old('visitor_type') ? old('visitor_type') : $visitor->visitor_type }}">
    <option value="Student" {{ (old('visitor_type') == "Student")? "selected" : "" }}>Student</option>
    <option value="Visitor" {{ (old('visitor_type') == "Visitor")? "selected" : "" }}>Visitor</option>
  </select>
  @error('visitor_type')
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
  <label for="department" class="form-label">Department</label>
  <select class="form-control @error('department') is-invalid @enderror" name="department" id="department" required="required">
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
  </div>



  <div class="col">
<div class="mb-3 form-group">
  <label for="staff" class="form-label">Staff</label>
  <input type="text" class="form-control @error('staff') is-invalid @enderror" id="name" name="staff" placeholder="Enter staff"
  value="{{ old('staff') ? old('staff') : $visitor->staff }}">
  @error('staff')
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
  <label for="purpose" class="form-label">Purpose</label>

<textarea  cols="5" rows="5" class="form-control @error('purpose') is-invalid @enderror" id="name" name="purpose" placeholder="Enter purpose" 
value="{{ old('purpose') ? old('purpose') : $visitor->purpose }}"></textarea>
@error('purpose')
<div class="invalid-feedback">
  {{ $message }}
</div>
@enderror
  {{-- <input type="text" class="form-control @error('purpose') is-invalid @enderror" id="name" name="purpose" placeholder="Enter purpose" 
  value="{{ old('purpose') ? old('purpose') : $visitor->purpose }}"> --}}

</div>

    </div>
</div>

<input type="hidden" name="log_type" value="OUT">

<input type="hidden" name="visitor_type" value="visitor">

<button type="submit" class="btn btn-success">Submit</button>
<a href="{{route('visitors.index')}}"class="btn btn-danger">Back</a>




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
                  <h6 class="text-white text-capitalize ps-3">Visitors table</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purpose</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Log Type</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($visitors as $visitor)
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> {{$visitor->name}} </h6>
                              <p class="text-xs text-secondary mb-0">{{$visitor->visitor_type}}</p>
                            </div>
                          </div>
                        </td>

                        <td>
                          <div class="d-flex px-2 py-1 text-center">
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> {{$visitor->contact}} </h6>
                              
                            </div>
                          </div>
                        </td>


                        <td>
                          <div class="d-flex px-2 py-1 justify-content-center">
                            <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"> {{$visitor->address}} </h6>
                              
                            </div>
                          </div>
                        </td>


                        <td>
                          <div class="d-flex px-2 py-1 justify-content-center">
                            <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"> {{$visitor->purpose}} </h6>
                              
                            </div>
                          </div>
                        </td>


                        <td>
                          <div class="d-flex px-2 py-1 justify-content-center">
                            <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"> {{$visitor->department}} </h6>
                              
                            </div>
                          </div>
                        </td>


                        <td>
                          <div class="d-flex px-2 py-1 justify-content-center">
                            <div class="d-flex flex-column">
                            <h6 class="mb-0 text-sm"> {{$visitor->staff}} </h6>
                              
                            </div>
                          </div>
                        </td>


                        <td>
                          <div class="d-flex px-2 py-1 justify-content-center">
                          @if( $visitor->log_type  == 'IN')
                          @if(Auth::user()->isAdmin()  or Auth::user()->isReceptionist())
                          <button type="submit" class="btn btn-success btn-sm" onclick="logVisitorIn(this)" data-type='IN'>
                            <form action="{{route('visitors.updateOnlyLogOut', ['id'=> $visitor->id])}}" method="post">
                                    @method("PATCH")
                                    @csrf
                            </form>
                            {{ $visitor->log_type }}
                          </button>
                          @endif
                          @else
                  
                          @if(Auth::user()->isAdmin()  or Auth::user()->isReceptionist())
                          <button type="submit" class="btn btn-danger btn-sm" onclick="logVisitorOut(this)" data-type='IN'>
                            <form action="{{route('visitors.updateOnlyLogIn', ['id'=> $visitor->id])}}" method="post">
                                    @method("PATCH")
                                    @csrf
                            </form>
                            {{ $visitor->log_type }}
                          </button>
                          @endif
                  
                  
                          @endif
                          </div>
                          </td>

                          <td>
                            <div class="d-flex px-2 py-1 justify-content-center">
                            @if(Auth::user()->isAdmin()  or Auth::user()->isDirector() or Auth::user()->isReceptionist())
          <a type="submit" class="btn btn-secondary btn-sm" href="{{route('visitors.show', ['id'=> $visitor->id])}}">
            View
          </a>

          <a type="submit" class="btn btn-success btn-sm" href="{{route('visitors.edit', ['id'=> $visitor->id])}}">
            Edit
          </a>
          @endif

          @if(Auth::user()->isAdmin()  or Auth::user()->isDirector())
          <button type="submit" class="btn btn-primary btn-sm" onclick="deleteVisitor(this)">
            <form action="{{route('visitors.destroy', ['id'=> $visitor->id])}}" method="post">
                    @method("DELETE")
                    @csrf
            </form>
            Delete
          </button>
          @endif

          @if(Auth::user()->isAdmin())
          <button type="submit" class="btn btn-info btn-sm" onclick="deleteVisitor(this)">
            <form action="{{route('visitors.destroy', ['id'=> $visitor->id])}}" method="post">
                    @method("DELETE")
                    @csrf
            </form>
            Restore
          </button>
          @endif
                    </div>
                          </td>

                      </tr>
                  
                      @empty
                      <p>No visitor record found</p>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
 

@endsection

@extends ('layouts.scripts')