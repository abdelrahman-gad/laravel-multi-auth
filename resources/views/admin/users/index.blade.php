@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                 <table>
                     <thead>
                         <tr>
                             <th scope="col"> #</th>
                             <th scope="col">name</th>
                             <th scope="col">email</th>
                             <th scope="col">actions</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user )
                         <tr scope="row">
                             <td> {{ $user->id }} </td>
                             <td > {{ $user->name }} </td>
                             <td> {{ $user->email }} </td>
                             <td> 
                                  <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-primary">Edit</a>
                                  <a  href="{{ route('admin.users.destroy',$user->id) }}"class="btn btn-danger">Delete</a> 
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
