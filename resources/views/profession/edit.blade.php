@extends('layouts.admin')
@section('content')
    <div class="container col-5 ">
        <form class="text-center " action="{{route('profession.update',$profession->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="profession" class="form-label">Profession</label>
                <input type="text" class="form-control" id="fullName" aria-describedby="profession" name="profession" value="{{$profession->profession}}">
                <p><span id="typeChars">0</span> / 256
                <div id="professionHelp" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary" id="submit-btn">Update</button>
            <button type="reset" class="btn btn-primary reset-btn">Reset</button>
        </form>
        <div class="container-fluid d-flex align-items-center justify-content-center mt-3">
            <div class="text-center mt-3 mr-3">
                <p>Created at : {{$profession->created_at->format('d.m.Y ')}}</p>
                <p>Updated at : {{$profession->updated_at->format('d.m.Y ')}}</p>
            </div>
            <div class="text-center mt-3 ml-3">
                <p>Created at : {{$profession->admin_created_id}}</p>
                <p>Updated at : {{$profession->uadmin_updated_id ?? 'no one'}}</p>
            </div>
        </div>
    </div>
@endsection
