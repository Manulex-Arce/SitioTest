<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Mon Apr 29 2024 16:32:07 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6376fd10962ed779a9233478" data-wf-site="636d9b81f118df183470925c" lang="en-CA">
<head>
  <?php include 'header.php';?>
  <title>FormTest | Express Cash</title>
  <meta content="Help with loan application or have questions about our services? Our friendly customer service is here to assist you. Reach us by online form at any time." name="description">
  <meta content="Contact | Express Cash" property="og:title">
  <meta content="Help with loan application or have questions about our services? Our friendly customer service is here to assist you. Reach us by online form at any time." property="og:description">
  <meta content="Contact | Express Cash" property="twitter:title">
  <meta content="Help with loan application or have questions about our services? Our friendly customer service is here to assist you. Reach us by online form at any time." property="twitter:description">
  <meta property="og:type" content="website">
  <meta content="summary_large_image" name="twitter:card">
  <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/44fffaf979f3b1c8c0a68d29/script.js"></script> <!--  End cookieyes banner  -->
  <style>
        .form-step {
            display: none;
        }
        .form-step.active {
            display: block;
        }
        .progress {
            height: 20px;
            margin-bottom: 30px;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .error-message {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
    </style>
</head>
<body><!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MW6TMQVV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav">
    <div class="navigation-container">
      <div class="navigation-wrapper">
        <a href="https://www.expresscash.ca/" class="logo-link-large w-inline-block"><img src="images/Logo-Project-new.png" loading="lazy" width="192" sizes="(max-width: 479px) 73vw, (max-width: 991px) 192px, 19vw" alt="Express Cash" srcset="images/Logo-Project-new-p-500.png 500w, images/Logo-Project-new-p-800.png 800w, images/Logo-Project-new-p-1080.png 1080w, images/Logo-Project-new-p-1600.png 1600w, images/Logo-Project-new-p-2000.png 2000w, images/Logo-Project-new.png 2695w"></a>
        <nav role="navigation" class="navigation-menu w-nav-menu">
          <a href="https://www.expresscash.ca/" class="navigation-link w-nav-link">Home</a>
          <a href="https://www.expresscash.ca/#loan-example" class="navigation-link w-nav-link">Loan Example</a>
          <a href="https://applications.expresscash.ca/EN" class="navigation-link w-nav-link">Renew A Loan</a>
          <a href="https://www.expresscash.ca/contact" aria-current="page" class="navigation-link w-nav-link">Contact Us</a>
          <a href="Formtest.php" class="navigation-link w-nav-link  w--current">FormTest</a>
          <a href="multi-step-application.php" class="navigation-link w-nav-link">multistepForm-Test</a>
          <a data-w-id="b8bd90a7-6458-5981-5f7d-df7f112275f2" href="https://applications.expresscash.ca/EN" class="button-2 w-button">Apply Now</a>
        </nav>
      </div>
      <div class="div-block-2">
        <a data-w-id="b8bd90a7-6458-5981-5f7d-df7f112275f7" href="https://applications.expresscash.ca/EN" class="button w-button">APPLY NOW</a>
        <a href="https://www.expresscash.ca/contact-fr" class="link">FR</a>
      </div>
    </div>
  </div>
  <div class="form-section">
  <div class="form-container">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <form id="multiStepForm" action="process-application.php" method="POST">
            <!-- Step 1: Personal Information -->
            <div class="form-step active" id="step1">
                <h2>Personal Information</h2>
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name *</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                    <div class="error-message" id="firstNameError"></div>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name *</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                    <div class="error-message" id="lastNameError"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="error-message" id="emailError"></div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                    <div class="error-message" id="phoneError"></div>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next</button>
            </div>

            <!-- Step 2: Employment Information -->
            <div class="form-step" id="step2">
                <h2>Employment Information</h2>
                <div class="mb-3">
                    <label for="employmentStatus" class="form-label">Employment Status *</label>
                    <select class="form-select" id="employmentStatus" name="employmentStatus" required>
                        <option value="">Select Status</option>
                        <option value="employed">Employed</option>
                        <option value="self-employed">Self-Employed</option>
                        <option value="unemployed">Unemployed</option>
                        <option value="retired">Retired</option>
                    </select>
                    <div class="error-message" id="employmentStatusError"></div>
                </div>
                <div class="mb-3">
                    <label for="monthlyIncome" class="form-label">Monthly Income *</label>
                    <input type="number" class="form-control" id="monthlyIncome" name="monthlyIncome" required>
                    <div class="error-message" id="monthlyIncomeError"></div>
                </div>
                <div class="mb-3">
                    <label for="employerName" class="form-label">Employer Name</label>
                    <input type="text" class="form-control" id="employerName" name="employerName">
                </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Previous</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
            </div>

            <!-- Step 3: Loan Details -->
            <div class="form-step" id="step3">
                <h2>Loan Details</h2>
                <div class="mb-3">
                    <label for="loanAmount" class="form-label">Loan Amount *</label>
                    <input type="number" class="form-control" id="loanAmount" name="loanAmount" required>
                    <div class="error-message" id="loanAmountError"></div>
                </div>
                <div class="mb-3">
                    <label for="loanPurpose" class="form-label">Loan Purpose *</label>
                    <select class="form-select" id="loanPurpose" name="loanPurpose" required>
                        <option value="">Select Purpose</option>
                        <option value="debt_consolidation">Debt Consolidation</option>
                        <option value="home_improvement">Home Improvement</option>
                        <option value="emergency">Emergency</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="error-message" id="loanPurposeError"></div>
                </div>
                <div class="mb-3">
                    <label for="repaymentTerm" class="form-label">Preferred Repayment Term *</label>
                    <select class="form-select" id="repaymentTerm" name="repaymentTerm" required>
                        <option value="">Select Term</option>
                        <option value="3">3 Months</option>
                        <option value="6">6 Months</option>
                        <option value="12">12 Months</option>
                    </select>
                    <div class="error-message" id="repaymentTermError"></div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Previous</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
            </div>

            <!-- Step 4: Review and Submit -->
            <div class="form-step" id="step4">
                <h2>Review Your Information</h2>
                <div id="reviewContent"></div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                        <label class="form-check-label" for="termsAgreement">
                            I agree to the terms and conditions *
                        </label>
                        <div class="error-message" id="termsError"></div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Previous</button>
                <button type="submit" class="btn btn-success">Submit Application</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentStep = 1;
        const totalSteps = 4;

        function updateProgress() {
            const progress = (currentStep / totalSteps) * 100;
            document.querySelector('.progress-bar').style.width = `${progress}%`;
            document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);
        }

        function validateStep(step) {
            let isValid = true;
            const stepElement = document.getElementById(`step${step}`);
            const inputs = stepElement.querySelectorAll('input[required], select[required]');
            
            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    const errorId = `${input.id}Error`;
                    const errorElement = document.getElementById(errorId);
                    if (errorElement) {
                        errorElement.textContent = 'This field is required';
                    }
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
                const errorElement = document.getElementById(`${this.id}Error`);
                if (errorElement) {
                    errorElement.textContent = '';
                }
            });
        });

        // Form submission
        document.getElementById('multiStepForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if (!document.getElementById('termsAgreement').checked) {
                document.getElementById('termsError').textContent = 'You must agree to the terms and conditions';
                return;
            }

            // Here you would typically send the form data to your server
            const formData = new FormData(this);
            fetch('process-application.php', {
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