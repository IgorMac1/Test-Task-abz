@extends('layouts.admin')
@section('content')

    <div class="container col-5 ">
        <form class="text-center " action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <div>
                    <label class="" for="photo">Photo</label>
                </div>
                <input type="file" class="form-control  @error('photo') is-invalid @enderror " id="photo"
                       aria-describedby="photo" name="photo" value="{{ ('photo') }}">
                <div id="photoHelp" class="form-text">File format jpg,png up 5MB,the minimum size of 300 x 300px</div>
            </div>

            <div class=" mb-3" id="letter-count">
                <label for="fullName" class="form-label ">Full Name</label>
                <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="fullName"
                       aria-describedby="fullName" name="full_name" value="{{ old('full_name') }}">
                <p><span id="typeChars">0</span> / 256

                <div id="fullNameHelp" class="form-text">2 up to 256 symbols</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control art-stranger @error('phone') is-invalid @enderror" id="phone"
                       aria-describedby="phone" name="phone" value="{{ old('phone') }}">
                <div id="phoneHelp" class="form-text">Required format +38(xxx)XXX XX XX</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       name="email" value="{{ old('email') }}">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="profession">Profession</label>
                <select id="profession" class="form-control @error('profession_id') is-invalid @enderror"
                        name="profession_id">
                    <option selected disabled>Choose...</option>
                    @foreach($professions as $profession)
                        <option value="{{$profession->id}}">{{$profession->profession}}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary"
                       aria-describedby="salary" name="salary" value="{{ old('salary') }}">
                <div id="salaryHelp" class="form-text">Max 500,000.00</div>
            </div>
            <div class="mb-3 container-box">
                <label for="manager" class="form-label">Manager</label>
                <input type="text" class="form-control  @error('manager_id') is-invalid @enderror" id="manager_id"
                       aria-describedby="manager" name="manager_id" value="{{ old('manager_id') }}">
                <div  ><ul class="dropdown-menu" style="display:block;position:relative;width:100%;" id="managerList" hidden></ul></div>
            </div>
            <div class="mb-3">
                <label for="employment_date" class="form-label">Employment date</label>
                <input type="date" class="form-control @error('employment_date') is-invalid @enderror"
                       id="employment_date"
                       aria-describedby="phone" name="employment_date" value="{{ old('employment_date') }}">
            </div>
            <button type="submit" class="btn btn-primary" id="submit-btn">Add</button>
            <button type="reset" class="btn btn-primary" id="reset-btn">Reset</button>
        </form>
    </div>
@endsection
