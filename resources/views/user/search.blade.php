 <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">All Users</h3>
                                    </div>
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead >
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Profession</th>
                                                <th>Employment date</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Salary</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)

                                                <tr>
                                                    <td><img src="{{asset($user->photo)}}" width="70" height="70" alt="photo"></td>
                                                    <td>{{$user->full_name}}</td>
                                                    <td>{{$user->profession->profession}}</td>
                                                    <td>{{$user->employment_date}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->salary}}</td>
                                                    <td>
                                                        <div class="">
                                                            <div>
                                                        <a href="{{route('user.edit',$user->id)}}">
                                                            <button type="button" class="btn btn-outline-secondary" title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                                     class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                                </svg>
                                                            </button>
                                                        </a>
                                                            </div>
                                                        <button type="submit" class="btn btn-outline-secondary delete-btn" title="Delete" data-toggle="modal" data-target="#exampleModal-{{$user->id}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                                 class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                            </svg>
                                                        </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Remote</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete {{$user->full_name}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{route('user.delete',$user->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Profession</th>
                                                <th>Employment date</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Salary</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        {{ $users->onEachSide(1)->links() }}
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </section>
