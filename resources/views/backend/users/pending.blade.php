@extends('backend/layout')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">Manage Questions</h4>
                           
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="check-all">
                                                    </label>
                                                </div>
                                            </th>
                                            <th> Image</th>
                                            <th>Phone No</th>
                                            <th> Registered at</th>
                                            <th> Status</th>
                                           
                                            <th> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </td>
                                              <td> <img src="{{ asset(str_replace('public', 'storage', $user->photo)) }}" /> </td>

                                                <td> {{ $user->phone }} </td>
                                                <td> {{ $user->created_at }} </td>
                                                @if($user->status==0)
                                                <td>
                                                    <div class="badge badge-outline-primary">Pending</div>
                                                </td>
                                                @else
                                                <td>
                                                    <div class="badge badge-outline-danger">Rejected</div>
                                                </td>
                                               @endif
                                                <td>
                                                    <a href="update-user?id={{ ($user->id) }}&s=1"
                                                        class="badge badge-outline-success"
                                                        style="text-decoration:none">Approve</a>
                                                    &nbsp;&nbsp;<a href="update-user?id={{ ($user->id) }}&s=2"
                                                        class="badge badge-outline-danger"
                                                        style="text-decoration:none">Reject</a>
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
        </div>

        @include('backend/footer');
    @endsection
