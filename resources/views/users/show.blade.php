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
  
                    <form action="/users/{{$user->id}}" method="post"> 
                        {{csrf_field()}} 
                        @method('PUT') 
                        <h2>Show Users {{ $user->name }}</h2>
                        <br>
                        <table>
                            <tr><th>Username</th><th>:</th><td>{{ $user->username }}</td></tr>
                            <tr><th>Name</th><th>:</th><td>{{ $user->name }}</td></tr>
                            <tr><th>E-mail</th><th>:</th><td>{{ $user->email }}</td></tr>
                            <tr><th>Created At</th><th>:</th><td>{{ $user->created_at }}</td></tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
