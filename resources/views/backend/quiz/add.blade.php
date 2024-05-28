@extends('backend/layout')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center"> <!-- Add this line to center the form -->
                <div class="col-md-12 grid-margin stretch-card"> <!-- Adjust the width of the form if needed -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Questions</h4>
                            <p class="card-description"> Add Questions Here </p>
                            <form class="forms-sample" action="{{ route('admin/save-answer') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    {{-- <label for="exampleInputUsername1">Question</label> --}}
                                    <textarea class="form-control" name="question" style="height:100px" id="exampleInputUsername1"
                                        placeholder="Enter Question"></textarea>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="exampleInputEmail1">Time</label> --}}
                                    <input type="number" name="allocated_time" class="form-control" id="exampleInputEmail1"
                                        placeholder="Time Allocated">
                                </div>
                                <div class="form-group" id="answers">

                                    <div class="answer-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" class="form-control answer" required name="A"
                                                    placeholder="Choice A">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group" id="answers">

                                    <div class="answer-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" class="form-control answer" required name="B"
                                                    placeholder="Choice B">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group" id="answers">

                                    <div class="answer-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" class="form-control answer" required name="C"
                                                    placeholder="Choice C">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group" id="answers">

                                    <div class="answer-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" class="form-control answer" required name="D"
                                                    placeholder="Choice D">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group" id="answers">

                                    <div class="answer-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <select class="form-control answer" name="correct_answer">
                                                    <option value="">Select Correct Answer</option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend/footer');
@endsection

<script>
    function addRow() {
        console.log("Add answer button clicked");
        var choiceCount = $('.answer-group').length + 1; // Calculate the choice count
        var answerField = '<div class="answer-group">' +
            'Choice ' + choiceCount + '</br>' +
            '<div class="row">' +
            '<div class="col-10">' +
            '<input type="text" class="form-control answer" placeholder="Answer">' +
            '</div>' +
            '<div class="col-2" style="float:right">' +
            '<button style="visibility:hidden" type="button" class="btn btn-success btn-sm add-answer" onclick="addRow()">+</button>' +
            '<button type="button" class="btn btn-danger btn-sm remove-answer" onclick="removeRow(this)">-</button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#answers').append(answerField);
    }


    function removeRow(btn) {
        console.log("Remove answer button clicked");
        $(btn).closest('.answer-group').remove();
    };
</script>
