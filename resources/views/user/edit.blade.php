@extends('layouts.admin')
@section('content')

    <div class="container col-5 ">
        <form class="text-center " action="{{route('user.update',$user->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('patch')
            <img src="{{asset($user->photo)}}" width="150" height="150" alt="photo" class="mb-3">
            <div class="mb-3">
                <input type="file" class="form-control  @error('photo') is-invalid @enderror" id="photo"
                       aria-describedby="photo" name="photo" value="{{ $user->photo }}">
                <div id="photoHelp" class="form-text"></div>
            </div>
            <div class=" mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="fullName"
                       aria-describedby="fullName" name="full_name" value="{{$user->full_name}}">
                <p><span id="typeChars">0</span> / 256

                <div id="fullNameHelp" class="form-text">2 up to 256 symbols</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control art-stranger @error('phone') is-invalid @enderror" id="phone"
                       aria-describedby="phone" name="phone" value="{{$user->phone}}">
                <div id="phoneHelp" class="form-text">Required format +38(xxx)XXX XX XX</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1"
                       aria-describedby="emailHelp" name="email" value="{{$user->email}}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="profession">Profession</label>
                <select id="profession" class="form-control @error('profession_id') is-invalid @enderror"
                        name="profession_id">
                    @foreach($professions as $profession)
                        <option value="{{$profession->id}}" selected>{{$profession->profession}}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary"
                       aria-describedby="salary" name="salary" value="{{$user->salary}}">
                <div id="salaryHelp" class="form-text"></div>
                <div class="mb-3 container-box">
                    <label for="manager" class="form-label">Manager</label>
                    <input type="text" class="form-control  @error('manager_id') is-invalid @enderror" id="manager_id"
                           aria-describedby="manager" name="manager_id" value="{{$user->employee->full_name ?? 'None'}}">
                    <div id="managerList" ></div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Employment date</label>
                    <input type="date" class="form-control @error('employment_date') is-invalid @enderror" id="phone"
                           aria-describedby="phone" name="employment_date" value="{{$user->employment_date}}">
                </div>

            </div>

            <button type="submit" class="btn btn-primary" id="submit-btn">Update</button>
            <button type="reset" class="btn btn-primary" id="reset-btn">Reset</button>
        </form>
        <div class="container-fluid d-flex align-items-center justify-content-center mt-3">
            <div class="text-center mt-3 mr-3">
                <p>Created at : {{$user->created_at->format('d.m.Y ')}}</p>
                <p>Updated at : {{$user->updated_at->format('d.m.Y ')}}</p>
            </div>
            <div class="text-center mt-3 ml-3">
                <p>Created at : {{$user->admin_created_id}}</p>
                <p>Updated at : {{$user->uadmin_updated_id ?? 'no one'}}</p>
            </div>
        </div>

@endsection
