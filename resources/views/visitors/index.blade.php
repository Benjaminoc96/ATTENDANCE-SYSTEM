@extends ('layouts.main')
@section ('content')
<div class="container">
    <h1>Visitors List</h1>
    <div>
        <a href="{{route('visitors.create')}}" class="btn btn-primary">Add</a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Department</th>
                <th>Staff</th>
                <th>Purpose</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitors as $visitor)
            <tr>
                <td>{{$visitor->name}}</td>
                <td>{{$visitor->contact}}</td>
                <td>{{$visitor->address}}</td>
                <td>{{$visitor->department}}</td>
                <td>{{$visitor->staff}}</td>
                <td>{{$visitor->purpose}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{route('visitors.show', $visitor->id) }}" title="Log Out"><button class="btn btn-success">Log Out</button></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
