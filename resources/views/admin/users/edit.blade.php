@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <form action="{{ route('admin.users.update',$user->id) }}" method="POST">
                    @csrf
                    {{ method_field('put') }}
                    <div class="form-group row">

                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Role</label>

                        <div class="col-md-6">
                            @foreach ($roles as $role )
                            <input  type="checkbox" value="{{ $role->id }}" name="roles[]"
                              @if ($user->roles->pluck('id')->contains($role->id)) checked   @endif >
                            <label> {{ $role->name }} </label>
                            <br>
                        @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-6">
                            <button type="submit" class="btn btn-success">Update User</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
</div>
@endsection
