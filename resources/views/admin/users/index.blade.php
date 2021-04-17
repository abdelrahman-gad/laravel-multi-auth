@extends('layouts.app')

@section('content')
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
                             <th scope="col">role</th>
                             <th scope="col">actions</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user )
                         <tr scope="row border">
                             <td> {{ $user->id }} </td>
                             <td > {{ $user->name }} </td>
                             <td class="border-1"> {{ $user->email }} </td>
                             <td> {{ implode(',',$user->roles()->get()->pluck('name')->toArray())}} </td>

                             <td> 
                                 @can('edit-users')
                                   <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary pull-left">Edit</a>
                                 @endcan
                                 @can('delete-users')
                             
                                 <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger pull-left">Delete<button>
                                   </form>
                                 @endcan
                              </td>
                         </tr>
                        
                        @endforeach
                     </tbody>
                 </table>
                 
                </div>
            </div>
      </div>
</div>
@endsection
