<!-- banner-section start -->
@extends('layout')
@section('content')
<style>
    @media (max-width: 998px) {
        .section-header {
            margin-top: 40px !important;
            margin-bottom: 40px;
        }
    }

    .scores {
        color: white;
    }

    /* Add this CSS */
    body.overlay-shown {
        overflow: hidden;
    }

    body.overlay-shown>*:not(#overlay) {
        display: none;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        text-align: center;
    }

    .highlighted {
        background-color: #56be78;
        color: black !important;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 0 auto;
        margin-top: 20%;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        display: inline-block;
    }

    @media (max-width: 998px) {
        .modal-content {

            margin-top: 50%;

        }
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Overlay styles */
    .overlaid {
        display: none;
        position: fixed;
        z-index: 200;
        width: 100%;
        height: 100%;
        background: red;
        top: 0;
        left: 0;
        z-index: 100;
        background-color: rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    /* Countdown styles */
    .countdown {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 24px;
    }

    #tournaments-section .single-item .title-bottom {
        border-bottom: 1px solid #32286D;
        margin-top: 10px;
        padding-bottom: 15px;
    }

    .radio-button {
        display: inline-block;
        padding: 10px 20px;
        width: 100%;
        border: none;
        background-color: #acd038;
        color: white;
        border: 1px solid #acd038;
        cursor: pointer;
        text-align: center margin-right: 10px;
    }

    .radio-button:hover {
        background-color: #111;
    }

    .countdown-circle {
        display: inline-block;
        width: 50px;
        /* Adjust size as needed */
        height: 50px;
        /* Adjust size as needed */
        background-color: #56be78;
        color: white;
        border-radius: 50%;
        font-size: 20px;
        line-height: 50px;
        /* Center text vertically */
        text-align: center;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --progress-bar-width: 100px;
        --progress-bar-height: 100px;
        --font-size: 2rem;
    }


    .circular-progress {
        width: var(--progress-bar-width);
        height: var(--progress-bar-height);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .inner-circle {
        position: absolute;
        width: calc(var(--progress-bar-width) - 30px);
        height: calc(var(--progress-bar-height) - 30px);
        border-radius: 50%;
        background-color: lightgrey;
    }

    .percentage {
        position: relative;
        font-size: var(--font-size);
        color: rgb(0, 0, 0, 0.8);
    }

    @media screen and (max-width: 800px) {
        :root {
            --progress-bar-width: 150px;
            --progress-bar-height: 150px;
            --font-size: 1.3rem;
        }
    }

    @media screen and (max-width: 500px) {
        :root {
            --progress-bar-width: 120px;
            --progress-bar-height: 120px;
            --font-size: 1rem;
        }
    }



    #question2-container,
    #question3-container {
        display: none;
        /* Hide additional questions initially */
    }
</style>

<!-- Modal -->



<!-- Browse Tournaments start -->
<section id="tournaments-section">
    <!-- Overlay with countdown timer -->




    <div class="overlay pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-header">
                        <h2 class="title">LEADERS BOARD</h2>
                        <div class="row justify-content-end">
                            <div class="col-lg-4 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" style="float:left" class="form-control" id="searchInput"
                                        placeholder="Enter Your Username">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="row">
                    <table class="table table-striped">
                        <thead style="background:black">
                            <tr>
                                <th scope="col" class="scores">Player Rank</th>
                                <th scope="col" class="scores">Username</th>
                                <th scope="col" class="scores">Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $leaders = DB::table('scores')->where('status', "1")->orderBy('score', 'desc')->get();

                            @endphp
           @foreach($leaders as $leader)

            <tr>
                <th scope="row" class="scores">{{ $loop->iteration }}</th>
                <td class="scores name">{{ $leader->name }}</td>
                <td class="scores score">{{ $leader->score }}</td>
            </tr>

            <tr style="border-bottom: 1px solid #ccc;">
                <td colspan="3"></td>
            </tr>
        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>
</section>
<!-- Browse Tournaments end -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function () {
            const searchText = searchInput.value.trim().toLowerCase();
            const matchedRows = [];

            // Separate matched and unmatched rows
            rows.forEach(row => {
                const nameElement = row.querySelector('.name');
                const scoreElement = row.querySelector('.score');
                if (nameElement && scoreElement) { // Check if elements exist
                    const name = nameElement.textContent.trim().toLowerCase();
                    const score = scoreElement.textContent.trim().toLowerCase();
                    if (name.includes(searchText) || score.includes(searchText)) {
                        row.classList.add('highlighted'); // Add highlighted class
                        matchedRows.push(row);
                    } else {
                        row.classList.remove('highlighted'); // Remove highlighted class
                    }
                }
            });

            // Reorder rows in table
            const tbody = document.querySelector('tbody');
            tbody.innerHTML = ''; // Clear existing rows
            matchedRows.forEach(row => tbody.appendChild(row));
        });
    });
</script>




@include('footer')
@endsection