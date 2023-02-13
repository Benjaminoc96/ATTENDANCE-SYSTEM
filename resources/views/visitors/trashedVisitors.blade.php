@extends ('layouts.master')

@section ('content')
{{-- <div class="container"> --}}
    <h1 class="text-center">Deleted Visitors List</h1>
    {{-- <div class="card-tools">
      <form action="" method="POST">
        <button type="submit" class="btn btn-flat btn-success" style="float: right" id="print"><span class="fas fa-print"></span>  Print</button>
      </form>
		</div> --}}

    
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Deleted Visitors table</h6>
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
                      @forelse ($findTrashedVisitors as $visitor)
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
                          <button type="submit" class="btn btn-success btn-sm" data-type='IN'>
                            {{ $visitor->log_type }}
                          </button>
                          @endif
                          @else
                  
                          @if(Auth::user()->isAdmin()  or Auth::user()->isReceptionist())
                          <button type="submit" class="btn btn-danger btn-sm" data-type='IN'>
                            {{ $visitor->log_type }}
                          </button>
                          @endif
                  
                  
                          @endif
                          </div>
                          </td>

                        


                            <td>
                        @if(Auth::user()->isAdmin()  or Auth::user()->isDirector())
                        <button type="submit" class="btn btn-success btn-sm" onclick="restoreVisitors(this)">
                          <form action="{{route('visitors.restoreVisitors', ['id'=> $visitor->id])}}" method="post">
                                  @method("POST")
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
