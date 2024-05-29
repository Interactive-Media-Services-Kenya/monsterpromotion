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
                                            <th> Question</th>
                                            <th> Time Allocated</th>
                                            <th> Status</th>
                                            <th> Correct Attempts</th>
                                            <th> Failed Attempts</th>
                                            <th> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </td>

                                                <td> {{ $question->question }} </td>
                                                <td> {{ $question->allocated_time }}s </td>
                                                <td>
                                                    <div class="badge badge-outline-success">Active</div>
                                                </td>
                                                <td> 0</td>
                                                <td> 0</td>
                                                <td>
                                                    <a href="disable-question?id={{ encrypt($question->id) }}"
                                                        class="badge badge-outline-danger"
                                                        style="text-decoration:none">Delete</a>
                                                    &nbsp;&nbsp;<a href="update-question?id={{ encrypt($question->id) }}"
                                                        class="badge badge-outline-primary"
                                                        style="text-decoration:none">Update</a>
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
