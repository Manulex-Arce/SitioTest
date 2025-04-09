<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php';?>
    <title>Loan Application | Express Cash</title>
    <meta content="Get a quick personalized loan quote. Just answer a few simple questions and we'll suggest a solution that meets your borrowing needs." name="description">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #edeff1;
            padding-top: 100px;
            padding-bottom: 20px;
        }
        .form-step {
            display: none;
            margin-bottom: 40px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-step.active {
            display: block;
        }
        .form-step h2 {
            color: #191c21;
            margin-bottom: 25px;
            font-size: 20px;
        }
        .progress {
            display: none;
        }
        .steps-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            padding: 0;
            list-style: none;
        }
        .step-item {
            flex: 1;
            text-align: center;
            position: relative;
        }
        .step-item:not(:last-child):after {
            content: '';
            position: absolute;
            top: 20px;
            left: 50%;
            width: 100%;
            height: 2px;
            background-color: #dee2e6;
            z-index: 1;
        }
        .step-circle {
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #dee2e6;
            color: #6c757d;
            margin: 0 auto 10px;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }
        .step-title {
            font-size: 14px;
            color: #6c757d;
            margin-top: 5px;
        }
        .step-item.active .step-circle {
            background-color: #191c21;
            border-color: #191c21;
            color: #fff;
        }
        .step-item.active .step-title {
            color: #191c21;
            font-weight: 600;
        }
        .step-item.completed .step-circle {
            background-color: #191c21;
            border-color: #191c21;
            color: #fff;
        }
        .step-item.completed:after {
            background-color: #191c21;
        }
        .form-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 10px;
            color: #495057;
        }
        .form-control {
            margin-bottom: 15px;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 6px;
        }
        .btn {
            padding: 12px 25px;
            margin: 5px;
            font-size: 16px;
            border-radius: 6px;
        }
        .btn-primary {
            background-color: #191c21;
            border-color: #191c21;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
        }
        .requirement-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 6px;
        }
        .requirement-icon {
            margin-right: 15px;
            color: #191c21;
            font-size: 20px;
        }
        .intro-section {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .intro-section h1 {
            color: #007bff;
            margin-bottom: 20px;
            font-size: 32px;
        }
        .intro-section p {
            font-size: 1.2em;
            color: #495057;
            margin-bottom: 30px;
        }
        .social-connect {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 1px solid #dee2e6;
        }
        .amount-options {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        .amount-option {
            padding: 15px;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
        }
        .amount-option:hover {
            border-color: #191c21;
            background-color: #f8f9fa;
        }
        .amount-option.selected {
            background-color: #191c21;
            color: white;
            border-color: #191c21;
        }
        .mb-3 {
            margin-bottom: 25px !important;
        }
        .form-check {
            margin-bottom: 15px;
        }
        #reviewContent {
            margin-bottom: 30px;
        }
        #reviewContent .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        #reviewContent .card-body {
            padding: 25px;
        }
        #reviewContent p {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        #reviewContent strong {
            color: #495057;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="navigation-full-wrapper">
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav">
      <div class="navigation-container">
        <div class="navigation-wrapper">
          <a href="https://www.expresscash.ca/" aria-current="page" class="logo-link-large w-inline-block w--current"><img src="images/Logo-Project-new.png" loading="lazy" width="192" sizes="(max-width: 479px) 73vw, (max-width: 991px) 192px, 19vw" alt="Express Cash.ca" srcset="images/Logo-Project-new-p-500.png 500w, images/Logo-Project-new-p-800.png 800w, images/Logo-Project-new-p-1080.png 1080w, images/Logo-Project-new-p-1600.png 1600w, images/Logo-Project-new-p-2000.png 2000w, images/Logo-Project-new.png 2695w"></a>
          <nav role="navigation" class="navigation-menu w-nav-menu">
            <a href="https://www.expresscash.ca/" aria-current="page" class="navigation-link w-nav-link w--current">Home</a>
            <a href="https://www.expresscash.ca/#loan-example" class="navigation-link w-nav-link">Loan Example</a>
            <a href="https://applications.expresscash.ca/EN" class="navigation-link w-nav-link">Renew A Loan</a>
            <a href="contact" class="navigation-link w-nav-link">Contact Us</a>
            <a data-w-id="b8bd90a7-6458-5981-5f7d-df7f112275f2" href="multi-step-application.php" class="button-2 w-button">Apply Now</a>
          </nav>
        </div>
        <div class="div-block-2">
          <a data-w-id="b8bd90a7-6458-5981-5f7d-df7f112275f7" href="multi-step-application.php" class="button w-button">APPLY NOW</a>
          <a href="multi-step-application-fr.php" class="link">FR</a>
        </div>
      </div>
    </div>
  </div>
    <div class="form-section">
        <div class="form-container">
            <div class="intro-section">
                <h1>Loan request in just <br>2 minutes.</h1>
                <p>Before starting your application, you must meet the following criteria.</p>
                
                <div class="requirements-section">
                    <div class="requirement-item">
                        <i class="fas fa-user-check requirement-icon"></i>
                        <span>You must be 18 years or older</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-map-marker-alt requirement-icon"></i>
                        <span>You must be a Canadian resident</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-dollar-sign requirement-icon"></i>
                        <span>You must have a stable income</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-ban requirement-icon"></i>
                        <span>You must not be bankrupt</span>
                    </div>
                </div>
            </div>

            <ul class="steps-indicator">
                <li class="step-item active">
                    <div class="step-circle">1</div>
                    <div class="step-title">Start</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">2</div>
                    <div class="step-title">Connect</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">3</div>
                    <div class="step-title">Personal</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">4</div>
                    <div class="step-title">Address</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">5</div>
                    <div class="step-title">Financial</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">6</div>
                    <div class="step-title">Employment</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">7</div>
                    <div class="step-title">Review</div>
                </li>
            </ul>

            <form id="multiStepForm"  method="POST">
                <!-- Step 1: Previous Borrowing -->
                <div class="form-step active" id="step1">
                    <h2>Have you ever borrowed with us?</h2>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="previousBorrowing" id="previousBorrowingYes" value="yes" required>
                            <label class="form-check-label" for="previousBorrowingYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="previousBorrowing" id="previousBorrowingNo" value="no" required>
                            <label class="form-check-label" for="previousBorrowingNo">No</label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next</button>
                </div>

                <!-- Step 2: Social Connect -->
                <div class="form-step" id="step2">
                    <div class="social-connect">
                        <h2>Please leave us your email so that we can contact you</h2>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="socialEmail" name="socialEmail" placeholder="Enter your email">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextStep(2)">Start Now ></button>
                </div>

                <!-- Step 3: Personal Information -->
                <div class="form-step" id="step3">
                    <h2>Tell us about yourself</h2>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name *</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name *</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Date of Birth *</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                    </div>
                    <div class="mb-3">
                        <label for="language" class="form-label">Your Language *</label>
                        <select class="form-select" id="language" name="language" required>
                            <option value="">Select Language</option>
                            <option value="en">English</option>
                            <option value="fr">French</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">How much do you need? *</label>
                        <div class="amount-options">
                            <?php
                            $amounts = [250, 300, 400, 500, 600, 700, 800, 900, 1000, 1250, 1500];
                            foreach ($amounts as $amount) {
                                echo "<div class='amount-option' onclick='selectAmount($amount)'>$$amount</div>";
                            }
                            ?>
                        </div>
                        <input type="hidden" id="loanAmount" name="loanAmount" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Previous</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
                </div>

                <!-- Step 4: Address Information -->
                <div class="form-step" id="step4">
                    <h2>What is your address?</h2>
                    <div class="mb-3">
                        <label for="streetNumber" class="form-label">Street Number *</label>
                        <input type="text" class="form-control" id="streetNumber" name="streetNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Street *</label>
                        <input type="text" class="form-control" id="street" name="street" required>
                    </div>
                    <div class="mb-3">
                        <label for="apt" class="form-label">Apartment</label>
                        <input type="text" class="form-control" id="apt" name="apt">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City *</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Province *</label>
                        <select class="form-select" id="province" name="province" required>
                            <option value="QC">Quebec</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="postalCode" class="form-label">Postal Code *</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                    </div>
                    <div class="mb-3">
                        <label for="moveInDate" class="form-label">Move-in Date *</label>
                        <input type="date" class="form-control" id="moveInDate" name="moveInDate" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Previous</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(4)">Next</button>
                </div>

                <!-- Step 5: Financial Information -->
                <div class="form-step" id="step5">
                    <h2>Now, let's talk seriously</h2>
                    <div class="mb-3">
                        <label for="residenceStatus" class="form-label">Your status at? *</label>
                        <select class="form-select" id="residenceStatus" name="residenceStatus" required>
                            <option value="">Select Status</option>
                            <option value="tenant">Tenant</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="grossSalary" class="form-label">Gross Salary *</label>
                        <input type="number" class="form-control" id="grossSalary" name="grossSalary" required>
                    </div>
                    <div class="mb-3">
                        <label for="rentCost" class="form-label">Cost of your rent *</label>
                        <input type="number" class="form-control" id="rentCost" name="rentCost" required>
                    </div>
                    <div class="mb-3">
                        <label for="utilitiesCost" class="form-label">Heating and electricity cost *</label>
                        <input type="number" class="form-control" id="utilitiesCost" name="utilitiesCost" required>
                    </div>
                    <div class="mb-3">
                        <label for="carLoan" class="form-label">Car loan</label>
                        <input type="number" class="form-control" id="carLoan" name="carLoan">
                    </div>
                    <div class="mb-3">
                        <label for="otherLoans" class="form-label">Loan for furniture or other</label>
                        <input type="number" class="form-control" id="otherLoans" name="otherLoans">
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(5)">Previous</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(5)">Next</button>
                </div>

                <!-- Step 6: Employment Information -->
                <div class="form-step" id="step6">
                    <h2>Your source of income</h2>
                    <div class="mb-3">
                        <label for="occupation" class="form-label">Occupation *</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" required>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company name *</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="mb-3">
                        <label for="supervisorName" class="form-label">Supervisor's name *</label>
                        <input type="text" class="form-control" id="supervisorName" name="supervisorName" required>
                    </div>
                    <div class="mb-3">
                        <label for="supervisorPhone" class="form-label">Supervisor's phone *</label>
                        <input type="tel" class="form-control" id="supervisorPhone" name="supervisorPhone" required>
                    </div>
                    <div class="mb-3">
                        <label for="supervisorExtension" class="form-label">Extension</label>
                        <input type="text" class="form-control" id="supervisorExtension" name="supervisorExtension">
                    </div>
                    <div class="mb-3">
                        <label for="payrollFrequency" class="form-label">Payroll frequency *</label>
                        <select class="form-select" id="payrollFrequency" name="payrollFrequency" required>
                            <option value="">Select Frequency</option>
                            <option value="weekly">Every week</option>
                            <option value="biweekly">Every two weeks</option>
                            <option value="semimonthly">Twice a month</option>
                            <option value="monthly">Every month</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hireDate" class="form-label">Date hired (approximate) *</label>
                        <input type="date" class="form-control" id="hireDate" name="hireDate" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(6)">Previous</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(6)">Next</button>
                </div>

                <!-- Step 7: Review and Submit -->
                <div class="form-step" id="step7">
                    <h2>Review Your Information</h2>
                    <div id="reviewContent"></div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                            <label class="form-check-label" for="termsAgreement">
                                I agree to the terms and conditions *
                            </label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(7)">Previous</button>
                    <button type="submit" class="btn btn-success">Submit Application</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentStep = 1;
        const totalSteps = 7;

        function updateProgress() {
            document.querySelectorAll('.step-item').forEach((item, index) => {
                if (index + 1 < currentStep) {
                    item.classList.add('completed');
                    item.classList.remove('active');
                } else if (index + 1 === currentStep) {
                    item.classList.add('active');
                    item.classList.remove('completed');
                } else {
                    item.classList.remove('completed', 'active');
                }
            });
        }

        function selectAmount(amount) {
            document.getElementById('loanAmount').value = amount;
            document.querySelectorAll('.amount-option').forEach(option => {
                option.classList.remove('selected');
                if (option.textContent === `$${amount}`) {
                    option.classList.add('selected');
                }
            });
        }

        function validateStep(step) {
            let isValid = true;
            const stepElement = document.getElementById(`step${step}`);
            const inputs = stepElement.querySelectorAll('input[required], select[required]');
            
            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            return isValid;
        }

        function nextStep(current) {
            if (!validateStep(current)) return;
            
            document.getElementById(`step${current}`).classList.remove('active');
            currentStep = current + 1;
            document.getElementById(`step${currentStep}`).classList.add('active');
            updateProgress();

            if (currentStep === totalSteps) {
                updateReviewContent();
            }
        }

        function prevStep(current) {
            document.getElementById(`step${current}`).classList.remove('active');
            currentStep = current - 1;
            document.getElementById(`step${currentStep}`).classList.add('active');
            updateProgress();
        }

        function updateReviewContent() {
            const reviewContent = document.getElementById('reviewContent');
            const formData = new FormData(document.getElementById('multiStepForm'));
            let html = '<div class="card"><div class="card-body">';
            
            for (let [key, value] of formData.entries()) {
                if (value) {
                    html += `<p><strong>${key}:</strong> ${value}</p>`;
                }
            }
            
            html += '</div></div>';
            reviewContent.innerHTML = html;
        }

        // Real-time validation
        document.querySelectorAll('input, select').forEach(element => {
            element.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        });

        // Form submission
        document.getElementById('multiStepForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if (!document.getElementById('termsAgreement').checked) {
                alert('You must agree to the terms and conditions');
                return;
            }

            const formData = new FormData(this);
            fetch('process-multi-step-form.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'thank-you.php';
                } else {
                    alert('There was an error submitting your application. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error submitting your application. Please try again.');
            });
        });
    </script>

    <?php include 'footer-en.php';?>
</body>
</html>