<?php
require_once('header1.php');


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Red App FAQ Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1>
                <p style="color:#FF0000" ;>Red App</p> <img src="RedApp.jpeg" alt="RedApp" width="120" height="80"> <small> Frequently Asked Questions</small>
            </h1>
        </div>

        <!-- Bootstrap FAQ - START -->
        <div class="container">
            <br />
            <br />
            <br />

            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                This section contains a wealth of information, related to <strong>
                    <Style="color:#FF0000";>Red App
                </strong> and its Functionality. If you cannot find an answer to your question,
                Please contact us for further assistance.
            </div>

            <br />

            <div class="panel-group" id="accordion">
                <div class="faqHeader">General Questions</div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">How do I recover my password?</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            To recover or set a new password in <strong>Red App</strong> one must contact to the admin.
                            This ensures a valid communication channel for all parties involved in any transactions.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Can I Create multiple accounts on the application?</a>
                        </h4>
                    </div>
                    <div id="collapseTen" class="panel-collapse collapse">
                        <div class="panel-body">
                            Unfortunately for security reasons only oone account per person is allowed.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">How do I pay for the services rendered?</a>
                        </h4>
                    </div>
                    <div id="collapseEleven" class="panel-collapse collapse">
                        <div class="panel-body">
                            Payments can be made directly to the health practitioner's bank account or paid cash to the practititoner directly.
                        </div>
                    </div>
                </div>

                <div class="faqHeader">Patients</div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Is my personal information kept confidential?</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            Inofmration privacy is inforced by law and sharing of any confidentail information with out the patients consent is a crimanal offence.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">How do I book and appointment? - what are the steps?</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            The steps involved in this process are really simple. All you need to do is:
                            <ul>
                                <li>Register an account</li>
                                <li>Activate your account</li>
                                <li>Go to the <strong>Consultation</strong> tab and book your appointment</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">What if I want a second opinion?</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            Here, in <strong>Red App</strong>, we have many consulting doctors available, if you are not satisfied with the consultation you may request an opinion from other health practitioners available in the app.
                            <br />
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">How do I get the medication once the consultation is over?</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            A presription will be provided to you once the consultation is over you will have a number of choices by which you may aquire your medication.
                            <li> You may either go to your nearest pharmacy.</li>
                            <li> or, you may go to your nearest hospital and get your medication.</li><strong>These services are paid services</strong>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What do I do if questions about bill?</a>
                        </h4>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse">
                        <div class="panel-body">
                            Please forward all bill related questions to the consulting health practitioner.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                        </h4>
                    </div>
                    <div id="collapseNine" class="panel-collapse collapse">
                        <div class="panel-body">
                            Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account.
                            The minimum amount of your balance should be at least 70 USD.
                        </div>
                    </div>
                </div>

                <div class="faqHeader">Health Practitioners</div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Can I discuss the patient condition with other health practitioners? </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            Keeping patient confidentiality in mind. It is advised that if a health pratiitoner would like to disccus or consult other health practitioners, permission should be granted by the patient to do so.

                            <br />
                            Once the transaction is complete, you gain full access to the purchased product.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">what if the patient refuses to pay for consultation?</a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse">
                        <div class="panel-body">
                            In this case the patient will be listed as a defaulter and patient account will be blocked for future use.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <strong>
            <center>
                <font size="+2">Contact Us</font>
        </strong></center>

        <center>
            <img src="telephone.jpg" alt="telephone" width="100" height="80"> <strong>
                011 5554455</strong> </center>




        <style>
            .faqHeader {
                font-size: 27px;
                margin: 20px;
            }

            .panel-heading [data-toggle="collapse"]:after {
                font-family: 'Glyphicons Halflings';
                content: "\e072";
                /* "play" icon */
                float: right;
                color: #F58723;
                font-size: 18px;
                line-height: 22px;
                /* rotate "play" icon from > (right arrow) to down arrow */
                -webkit-transform: rotate(-90deg);
                -moz-transform: rotate(-90deg);
                -ms-transform: rotate(-90deg);
                -o-transform: rotate(-90deg);
                transform: rotate(-90deg);
            }

            .panel-heading [data-toggle="collapse"].collapsed:after {
                /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
                -webkit-transform: rotate(90deg);
                -moz-transform: rotate(90deg);
                -ms-transform: rotate(90deg);
                -o-transform: rotate(90deg);
                transform: rotate(90deg);
                color: #454444;
            }
        </style>

        <!-- Red App FAQ - END -->

    </div>

</body>

</html>