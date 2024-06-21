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


    <section id="tournaments-section" style="background:#171717;margin-top:30px !important;">
        <!-- Overlay with countdown timer -->
        <div id="overlay" class="overlaid">
            <div class="countdown">
                <h2>Trivia starts in <span id="countdown" style="font-size:25px !important">10</span> seconds</h2>
            </div>
        </div>
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-header">
                            <h2 class="title">
                                <h4>TERMS AND CONDITIONS</h4>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class=" single-item" style="background:black">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 d-flex align-items-center">
                            <div class="mid-area">

                                <div class="">


                                    <h5 style="color:#acd038">TERMS AND CONDITIONS FOR "MONSTER WIN A TICKET TO AN EXCLUSIVE
                                        PARTY’ PROMOTION"</h5>
                                    <br />
                                    <p>The following terms and conditions (“Terms and Conditions”) apply to the "MONSTER WIN
                                        A TICKET TO AN EXCLUSIVE PARTY’ PROMOTION” (“the Promotion") and by participating in
                                        the same you are deemed to have read, understood, and accepted the same.</p>
                                    <br />
                                    <h5 style="color:#acd038">Organization, Duration, Eligibility and Entry</h5>

                                    <p>
                                        1. The Promotion is organized by Coca Cola Beverages Kenya (“Sponsor”) and
                                        Participation will be Restricted to NAIROBI COUNTY ONLY.</br>
                                        2. All employees, contractors, and immediate family (spouse, parents, siblings,
                                        children, and household members) the Organizers. Interactive Media Services (IMS)
                                        and Betting Control and Licensing Board including their respective parent companies,
                                        subsidiaries, affiliates, agents and any other supplier or third party involved in
                                        the development, facilitation or execution of this Promotion and their immediate
                                        families and dependants shall not be eligible to participate in this Promotion.</br>
                                        3. By participation in the Promotion, the entrant fully and unconditionally agrees
                                        to and accepts these Terms and Conditions and the decisions of the Organizers which
                                        are final and binding in all matters related to the Promotion.</br>
                                        4. The Promotion will run from 15th June 2024 up to 30th July 2024 and the
                                        Redemption to done 31st July 2024.</br>
                                        5. To be eligible for participation in the Promotion, participants must have
                                        attained the age of eighteen (18) years or older at the time of entry and must be a
                                        Resident of Nairobi County or be able to avail themselves in Nairobi at point of
                                        Redemption.</br>
                                        6. To Enter the Promotion, participants must:
                                    <ul>
                                        <li>Scan the QR Code available in POS in-store and access the Consumer Journey for a
                                            chance to win a ticket for two to the exclusive party.</br>
                                    </ul>
                                    </p>
                                    <h5 style="color:#acd038">Prizes</h5>

                                    <p>
                                        Participants in the draw stand a chance to win the following prizes:</br>
                                        1. One out of the 30 Tickets for the Exclusive Concert for Khaligraph and Femi One
                                        (one ticket admits two)</br>
                                        2. One out of the 8 Monster Boom boxes</br>
                                    </p>

                                    <h5 style="color:#acd038">Identification of winners and prize disbursement</h5>
                                    <p>
                                        1. The Grand Prize will be awarded at the end of the Promotion through Ranking of
                                        the winners and merited on Points by picking the Top 30 Winners will be allowed to
                                        attend the Party.</br>
                                        - The winner(s) will need to provide their national ID linked to the
                                        winning cell number for verification.</br>
                                        2. The prizes in this Promotion are non-assignable, non-transferable, not
                                        exchangeable and are redeemable only within NAIROBI.</br>
                                        3. In the event that there are any taxes applicable to the Prizes, the Organizers
                                        will deduct the tax and remit it to the relevant authority as is required by
                                        law.</br>
                                        4. Entry and participation in the Promotion constitutes entrant’s consent for the
                                        Organizers and their designees to use entrant’s name, image, prize information,
                                        likeness, and county of residence in the marketing activities related to the
                                        Promotion in any media without further consideration for the duration of the
                                        campaign and 3 months after conclusion of the same.<br />
                                        -The Organisers may further
                                        require that any of the winners be appear on radio and television or in any other
                                        media or event as determined by the Organizers in relation to the receipt of the
                                        prizes for the duration of the campaign and 3 months after conclusion of the same.
                                    </p>
                                    <h5 style="color:#acd038"> General rules of the promotion</h5>
                                    <p>
                                        1. All Prizes must be claimed within the period of the Promotion, subject to
                                        clause 4 of these Terms and Conditions.<br/>
                                        -The Organizers in consultation with the
                                        Betting Control and Licensing Board maintain the discretion to select an alternate
                                        participant from the draw if a winner fails to claim their prize or is otherwise
                                        unable to claim the prize.<br/>
                                        2. The Organizers in consultation with the Betting Control and Licensing Board
                                        may nullify any prize to any participant in the event of fraud, dishonesty or
                                        non-eligibility under these Terms and Conditions.<br/>
                                        3. The Organizers in consultation with the Betting Control and Licensing Board
                                        reserve the right to amend and adjust the Promotion format and timings as they deem
                                        fit and shall communicate the same as necessary.<br/>
                                        4. Although the Organizers have used reasonable efforts to ensure that all
                                        information and materials relating to the Promotion are accurate, they shall not be
                                        liable for any inaccuracy or errors in such information and/or material. The
                                        Organizers, their agents and sub-contractors will also not bear responsibility for
                                        any loss or damage to a participant, whether caused by self or any third party,
                                        arising from matters outside the control of the Organizers, their agents and
                                        sub-contractors including but not limited to force majeure events such as acts of
                                        God, computer viruses, power outages; lockdowns, epidemics/pandemics etc.<br/>
                                        5. In case of any queries or concerns on the Promotion, participants should call
                                        the Customer Care numbers +254 727-093-444<br/>
                                        6. By entering the Promotion, all participants and winners agree to be bound by
                                        these Terms and Conditions which will be subject to interpretation by the Organizers
                                        and the Betting Control and Licensing Board, whose interpretation shall be final and
                                        binding.<br/>
                                       7. The Organizers reserve the right to amend, modify or change these rules at
                                        any time during the Promotion and/or to terminate the Promotion entirely, which
                                        amendment, modification, termination or change of these rules or of the Promotion
                                        shall be subject to consultation with the Betting Control and Licensing Board.<br/>
                                        8. Data Protection: In order to facilitate the Promotion and for marketing
                                        communications, the Organizers may process personal information relating to
                                        identified or identifiable natural persons, i.e. personal data, who participate in
                                        the Promotion. The Organizers will process this personal data in accordance with
                                        data protection requirements under the Kenyan Data Protection Act, Act No. 24 of
                                        2019.<br/>
                                        9. All participants further warrant and represent that they have read and
                                        understood these terms and conditions and agree to be bound thereby.<br/>
                                        10. The Promotion is conducted subject to the Laws of the Republic of Kenya. The
                                        Promotion remains subject to the provisions of the Betting Lotteries and Gaming Act,
                                        Chapter 131 of the Laws of Kenya (the Act) and any disputes arising shall be
                                        resolved in accordance with the provision of the Act.<br/>
                                        11. If any provision of these Terms and Conditions is held by any court or other
                                        competent authority to be void or unenforceable in whole or in part, the other
                                        provisions of these Terms and Conditions and the remainder of the affected
                                        provisions shall continue to be valid.<br/>
                                       - CAUTION: The Organizers do not require participants to send cash, airtime credit or
                                        other consideration to receive any of the prizes and will not be responsible for any
                                        loss or damage incurred by any person who fails to pay heed to this notification.
                                    </p>



                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Browse Tournaments end -->




    @include('footer')
@endsection
