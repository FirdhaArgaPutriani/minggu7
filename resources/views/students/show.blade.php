@extends('layouts.app') 
   
@section('content') 
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <div class="card"> 
                <div class="card-header">{{ __('SHOW STUDENT DATA') }}</div> 
   
                <div class="card-body"> 
                    @if (session('status')) 
                        <div class="alert alert-success" role="alert"> 
                            {{ session('status') }} 
                        </div> 
                    @endif 
  
                    <form action="/students/{{$student->id}}" method="post"> 
                        {{csrf_field()}} 
                        @method('PUT') 
                        <h2>Show Student {{ $student->name }}</h2>
                        <br>
                        <table>
                            <tr><th>NIM</th><th>:</th><td>{{ $student->nim }}</td></tr>
                            <tr><th>Name</th><th>:</th><td>{{ $student->name }}</td></tr>
                            <tr><th>Class</th><th>:</th><td>{{ $student->kelas->class_name }}</td></tr>
                            <tr><th>Department</th><th>:</th><td>{{ $student->departement }}</td></tr>
                            <tr><th>Phone</th><th>:</th><td>{{ $student->phone }}</td></tr>
                            <tr><th>Created At</th><th>:</th><td>{{ $student->created_at }}</td></tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
