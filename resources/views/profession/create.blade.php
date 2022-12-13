@extends('layouts.admin')
@section('content')
    <div class="container col-5 ">
        <form class="text-center " action="{{route('profession.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="profession" class="form-label">Profession</label>
                <input type="text" class="form-control" id="fullName" aria-describedby="profession" name="profession">
                <p><span id="typeChars">0</span> / 256
                <div id="professionHelp" class="form-text">2 up to 256 symbols</div>
            </div>
            <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
            <button type="reset" class="btn btn-primary" id="reset-btn">Reset</button>
        </form>
    </div>
@endsection
