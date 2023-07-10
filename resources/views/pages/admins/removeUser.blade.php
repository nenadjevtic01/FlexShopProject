@extends('layouts.admin')
@section('title')
    Flex Shop - Remove user
@endsection
@section('description')
    Remove user
@endsection
@section('content')
    <div id="content" >
    @include('fixed.admins.navbar')
        <div class="container-fluid p-5">
            <form action="/removeuser" method="POST" class="d-flex flex-column align-items-center">
                @csrf
                <label for="userSelect">Select user:</label>
                <select name="user" id="userSelect" class="custom-select w-25 m-2">
                    @foreach($data['users'] as $d)
                        <option value="{{$d->user_id}}">{{$d->first_name.' '.$d->last_name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-info m-5">Remove user</button>
                @if(session('success-msg'))
                    <div class="alert alert-success col-md-12 w-50 rounded-lg">
                        <p>
                            @if (session('success-msg'))
                                {{session('success-msg')}}
                            @endif
                        </p>
                    </div>
                @endif
                @if($errors->any() || session('error-msg'))
                    <div class="alert alert-danger col-md-12 w-50 rounded-lg">
                        <ul>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                            @if (session('error-msg'))
                                <li>{{session('error-msg')}}</li>
                            @endif
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
