@extends('layouts.admin')
@section('header','Author')

    
@section('content')
<div class="row">
        <div class="col-md-9">
            <div class="card">
               
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Phone_Number</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Total Books</th>
                            <th class="text-center">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $key => $author )
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td class="text-center">{{ $author->gender }}</td>
                            <td class="text-center">{{ $author->phone_number }}</td>
                            <td class="text-center">{{ $author->address }}</td>
                            <td class="text-center">{{ $author->email }}</td>
                            <td class="text-center">{{ count($author->books) }}</td>
                            <td class="text-center" >{{date('H:i:s - d M Y', strtotime($author->created_at))}}</td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>
@endsection