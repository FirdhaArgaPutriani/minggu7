@extends('layouts.app') 
   
@section('content') 
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <div class="card"> 
                <div class="card-header">{{ __('STUDENT DATA') }}</div> 
   
                <div class="card-body"> 
                    @if (session('status')) 
                        <div class="alert alert-success" role="alert"> 
                            {{ session('status') }} 
                        </div> 
                    @endif 
  
                    <table class="table table-responsive table-striped"> 
                        <a href="/students/create" class="btn btn-primary">Add Data</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <form method=GET action="/students">
			                <input type="text" name="cari" placeholder="Search Student">
			                <button type="submit" name="search" class="btn btn-primary">Search</button>
                        </form>

                        <thead> 
                            <tr> 
                                <th>NIM</th>  
                                <th>Name</th> 
                                <th>Class</th>
                                <th>Departement</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($student as $s) 
                            <tr> 
                                <td>{{ $s->nim }}</td> 
                                <td>{{ $s->name }}</td> 
                                <td>{{ $s->kelas->class_name }}</td>
                                <td>{{ $s->departement }}</td>
                                <td>{{ $s->phone }}</td>
                                <td>
                                    <form action="/students/{{$s->id}}" method="post"> 
                                        <a href="/students/{{$s->id}}/edit" class="btn btn-warning">Edit</a> 
                                        @csrf 
                                        @method('DELETE') 
                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button> 
                                        <a href="/students/{{$s->id}}" class="btn btn-info">Show</a> 
                                    </form>
                                </td> 
                            </tr> 
                            @endforeach 
                        </tbody> 
                    </table> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
@endsection 