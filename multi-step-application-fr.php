<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'header.php';?>
    <title>Demande de Prêt | Express Cash</title>
    <meta content="Obtenez une estimation rapide et personnalisée de votre prêt. Répondez à quelques questions simples et nous vous suggérerons une solution adaptée à vos besoins." name="description">
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
            border-color: #007bff;
            background-color: #f8f9fa;
        }
        .amount-option.selected {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
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
<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav">
      <div class="navigation-container">
        <div class="navigation-wrapper">
          <a href="https://www.expresscash.ca/home-fr" aria-current="page" class="logo-link-large w-inline-block w--current"><img src="images/Logo-Project-new.png" loading="lazy" width="192" sizes="(max-width: 479px) 73vw, (max-width: 767px) 38vw, (max-width: 991px) 192px, 9vw" alt="Express Cash.ca" srcset="images/Logo-Project-new-p-500.png 500w, images/Logo-Project-new-p-800.png 800w, images/Logo-Project-new-p-1080.png 1080w, images/Logo-Project-new-p-1600.png 1600w, images/Logo-Project-new-p-2000.png 2000w, images/Logo-Project-new.png 2695w"></a>
          <nav role="navigation" class="navigation-menu w-nav-menu">
            <a href="https://www.expresscash.ca/home-fr" aria-current="page" class="navigation-link w-nav-link w--current">Accueil</a>
            <a href="https://www.expresscash.ca/home-fr#loan-example" class="navigation-link w-nav-link">Exemple De Prêt</a>
            <a href="https://applications.expresscash.ca/" class="navigation-link w-nav-link">Renouvellement</a>
            <a href="https://www.expresscash.ca/contact-fr" class="navigation-link w-nav-link">Contactez-Nous</a>
            <a href="multi-step-application-fr.php" class="button-2 w-button">Apply Now</a>
          </nav>
        </div>
        <div class="div-block-3">
          <a data-w-id="958dbba7-459e-24f8-7885-3309522aac41" href="multi-step-application-fr.php" class="button w-button">Appliquer Maintenant</a>
          <a href="multi-step-application.php" class="link">EN</a>
        </div>
      </div>
    </div>
  </div>

    <div class="form-section">
        <div class="form-container">
            <div class="intro-section">
                <h1>Demande de prêt en seulement <br> 2 minutes.</h1>
                <p>Avant de commencer votre demande, vous devez répondre aux critères suivants.</p>
                
                <div class="requirements-section">
                    <div class="requirement-item">
                        <i class="fas fa-user-check requirement-icon"></i>
                        <span>Vous devez avoir 18 ans ou plus</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-map-marker-alt requirement-icon"></i>
                        <span>Vous devez être résident canadien</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-dollar-sign requirement-icon"></i>
                        <span>Vous devez avoir un revenu stable</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-ban requirement-icon"></i>
                        <span>Vous ne devez pas être en faillite</span>
                    </div>
                </div>
            </div>

            <ul class="steps-indicator">
                <li class="step-item active">
                    <div class="step-circle">1</div>
                    <div class="step-title">Début</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">2</div>
                    <div class="step-title">Personnel</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">3</div>
                    <div class="step-title">Adresse</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">4</div>
                    <div class="step-title">Finance</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">5</div>
                    <div class="step-title">Emploi</div>
                </li>
                <li class="step-item">
                    <div class="step-circle">6</div>
                    <div class="step-title">Révision</div>
                </li>
            </ul>

            <form id="multiStepForm" action="process-multi-step-form-fr.php" method="POST">
                <!-- Step 1: Email Collection -->
                <div class="form-step active" id="step1">
                    <div class="social-connect">
                        <h2>Veuillez nous laisser votre email afin que nous puissions vous contacter</h2>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="socialEmail" name="socialEmail" placeholder="Entrez votre courriel">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextStep(1)">Commencer ></button>
                </div>

                <!-- Step 2: Personal Information -->
                <div class="form-step" id="step2">
                    <h2>Parlez-nous de vous</h2>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Prénom *</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Nom *</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Date de naissance *</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                    </div>
                    <div class="mb-3">
                        <label for="language" class="form-label">Votre langue *</label>
                        <select class="form-select" id="language" name="language" required>
                            <option value="">Sélectionnez une langue</option>
                            <option value="en">Anglais</option>
                            <option value="fr">Français</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Courriel *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">De quel montant avez-vous besoin? *</label>
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
                    <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Précédent</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(2)">Suivant</button>
                </div>

                <!-- Step 3: Address Information -->
                <div class="form-step" id="step3">
                    <h2>Quelle est votre adresse?</h2>
                    <div class="mb-3">
                        <label for="streetNumber" class="form-label">Numéro de rue *</label>
                        <input type="text" class="form-control" id="streetNumber" name="streetNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Rue *</label>
                        <input type="text" class="form-control" id="street" name="street" required>
                    </div>
                    <div class="mb-3">
                        <label for="apt" class="form-label">Appartement</label>
                        <input type="text" class="form-control" id="apt" name="apt">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Ville *</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Province *</label>
                        <select class="form-select" id="province" name="province" required>
                            <option value="QC">Québec</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="postalCode" class="form-label">Code postal *</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                    </div>
                    <div class="mb-3">
                        <label for="moveInDate" class="form-label">Date d'emménagement *</label>
                        <input type="date" class="form-control" id="moveInDate" name="moveInDate" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Précédent</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(3)">Suivant</button>
                </div>

                <!-- Step 4: Financial Information -->
                <div class="form-step" id="step4">
                    <h2>Maintenant, parlons sérieusement</h2>
                    <div class="mb-3">
                        <label for="residenceStatus" class="form-label">Votre statut d'habitation *</label>
                        <select class="form-select" id="residenceStatus" name="residenceStatus" required>
                            <option value="">Sélectionnez un statut</option>
                            <option value="tenant">Locataire</option>
                            <option value="owner">Propriétaire</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="grossSalary" class="form-label">Salaire brut *</label>
                        <input type="number" class="form-control" id="grossSalary" name="grossSalary" required>
                    </div>
                    <div class="mb-3">
                        <label for="rentCost" class="form-label">Coût de votre loyer *</label>
                        <input type="number" class="form-control" id="rentCost" name="rentCost" required>
                    </div>
                    <div class="mb-3">
                        <label for="utilitiesCost" class="form-label">Coût du chauffage et de l'électricité *</label>
                        <input type="number" class="form-control" id="utilitiesCost" name="utilitiesCost" required>
                    </div>
                    <div class="mb-3">
                        <label for="carLoan" class="form-label">Prêt auto</label>
                        <input type="number" class="form-control" id="carLoan" name="carLoan">
                    </div>
                    <div class="mb-3">
                        <label for="otherLoans" class="form-label">Prêt pour meubles ou autre</label>
                        <input type="number" class="form-control" id="otherLoans" name="otherLoans">
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Précédent</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(4)">Suivant</button>
                </div>

                <!-- Step 5: Employment Information -->
                <div class="form-step" id="step5">
                    <h2>Votre source de revenus</h2>
                    <div class="mb-3">
                        <label for="occupation" class="form-label">Profession *</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" required>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Nom de l'entreprise *</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="mb-3">
                        <label for="supervisorName" class="form-label">Nom du superviseur *</label>
                        <input type="text" class="form-control" id="supervisorName" name="supervisorName" required>
                    </div>
                    <div class="mb-3">
                        <label for="supervisorPhone" class="form-label">Téléphone du superviseur *</label>
                        <input type="tel" class="form-control" id="supervisorPhone" name="supervisorPhone" required>
                    </div>
                    <div class="mb-3">
                        <label for="supervisorExtension" class="form-label">Poste</label>
                        <input type="text" class="form-control" id="supervisorExtension" name="supervisorExtension">
                    </div>
                    <div class="mb-3">
                        <label for="payrollFrequency" class="form-label">Fréquence de paie *</label>
                        <select class="form-select" id="payrollFrequency" name="payrollFrequency" required>
                            <option value="">Sélectionnez une fréquence</option>
                            <option value="weekly">Chaque semaine</option>
                            <option value="biweekly">Aux deux semaines</option>
                            <option value="semimonthly">Deux fois par mois</option>
                            <option value="monthly">Chaque mois</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hireDate" class="form-label">Date d'embauche (approximative) *</label>
                        <input type="date" class="form-control" id="hireDate" name="hireDate" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(5)">Précédent</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep(5)">Suivant</button>
                </div>

                <!-- Step 6: Review and Submit -->
                <div class="form-step" id="step6">
                    <h2>Vérifiez vos informations</h2>
                    <div id="reviewContent"></div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                            <label class="form-check-label" for="termsAgreement">
                                J'accepte les termes et conditions *
                            </label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="prevStep(6)">Précédent</button>
                    <button type="submit" class="btn btn-success">Soumettre la demande</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentStep = 1;
        const totalSteps = 6;

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
                    // Validate age if this is the date of birth field
                    if (input.id === 'dateOfBirth') {
                        const dob = new Date(input.value);
                        const today = new Date();
                        const age = today.getFullYear() - dob.getFullYear();
                        const monthDiff = today.getMonth() - dob.getMonth();
                        
                        // If birthday hasn't occurred this year, subtract a year
                        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                            age--;
                        }
                        
                        if (age < 18) {
                            isValid = false;
                            input.classList.add('is-invalid');
                            if (!input.nextElementSibling || !input.nextElementSibling.classList.contains('invalid-feedback')) {
                                const feedback = document.createElement('div');
                                feedback.className = 'invalid-feedback';
                                feedback.textContent = 'Vous devez avoir au moins 18 ans';
                                input.parentNode.insertBefore(feedback, input.nextSibling);
                            }
                        }
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

            // Hide intro section after step 1
            if (current === 1) {
                document.querySelector('.intro-section').style.display = 'none';
            }

            if (currentStep === totalSteps) {
                updateReviewContent();
            }
        }

        function prevStep(current) {
            document.getElementById(`step${current}`).classList.remove('active');
            currentStep = current - 1;
            document.getElementById(`step${currentStep}`).classList.add('active');
            updateProgress();

            // Show intro section when going back to step 1
            if (currentStep === 1) {
                document.querySelector('.intro-section').style.display = 'block';
            }
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
            if (!document.getElementById('termsAgreement').checked) {
                e.preventDefault();
                alert('Vous devez accepter les termes et conditions');
                return false;
            }
            return true;
        });

        // Add event listener for date of birth field
        document.getElementById('dateOfBirth').addEventListener('change', function() {
            this.classList.remove('is-invalid');
            const feedback = this.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.remove();
            }
            
            if (this.value) {
                const dob = new Date(this.value);
                const today = new Date();
                const age = today.getFullYear() - dob.getFullYear();
                const monthDiff = today.getMonth() - dob.getMonth();
                
                // If birthday hasn't occurred this year, subtract a year
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                
                if (age < 18) {
                    this.classList.add('is-invalid');
                    const feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    feedback.textContent = 'Vous devez avoir au moins 18 ans';
                    this.parentNode.insertBefore(feedback, this.nextSibling);
                }
            }
        });

        // Add max date restriction to dateOfBirth input
        document.addEventListener('DOMContentLoaded', function() {
            const dateOfBirth = document.getElementById('dateOfBirth');
            const today = new Date();
            const minDate = new Date();
            const maxDate = new Date();
            
            // Set minimum date (must be at least 18 years old)
            minDate.setFullYear(today.getFullYear() - 100); // Reasonable minimum age
            // Set maximum date (must not be in the future and must be at least 18 years old)
            maxDate.setFullYear(today.getFullYear() - 18);
            
            dateOfBirth.setAttribute('min', minDate.toISOString().split('T')[0]);
            dateOfBirth.setAttribute('max', maxDate.toISOString().split('T')[0]);
        });
    </script>

    <?php include 'footer-fr.php';?>
</body>
</html> 