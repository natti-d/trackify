
function validateRegistration() {
    let name_registration_value = document.getElementById('name-registration').value; //изпраща се на api

    let email_registration_value = document.getElementById('email-registration').value; //изпраща се на api
    let email_registration = document.getElementById('email-registration');

    let account_type_registration = document.getElementById('account-type-registration').value; //изпраща се на api //1 - ученик; 2- служител; 3 - личен
    let organization_registration_value = document.getElementById('organization-registration-value').value; //изпраща се на api

    let password_registration_value = document.getElementById('password-registration').value; //изпраща се на api
    let password_registration = document.getElementById('password-registration');

    let confirm_password_registration_value = document.getElementById('confirm-password-registration').value;
    let confirm_password_registration = document.getElementById('confirm-password-registration');

    let help_registration = document.getElementById('help-registration');
    let instruction_registration = document.getElementById('instruction-registration');

    //Validate E-mail
    /*Searches in the API for available (true) e-mail, if not (else), continues... */
    if (!true) {
        email_registration.classList.add('is-invalid');
        help_registration.classList.remove('d-none');
        instruction_registration.innerHTML = String("Акаунт с такъв e-mail вече съществува!");
        return;
    }
    else {
        email_registration.classList.remove('is-invalid');
        help_registration.classList.add('d-none');
        instruction_registration.innerHTML = null;
        //Продължава
    }

    //Validate Password
    if (password_registration_value.length < 8) {
        password_registration.classList.add('is-invalid');
        help_registration.classList.remove('d-none');
        instruction_registration.innerHTML = String("Паролата трябва да е поне 8 символа.");
        return;
    }
    else {
        //Продължава
        password_registration.classList.remove('is-invalid');
        help_registration.classList.add('d-none');
    }

    //Confirm Password 
    if (password_registration_value !== confirm_password_registration_value) {
        confirm_password_registration.classList.add('is-invalid');
        help_registration.classList.remove('d-none');
        instruction_registration.innerHTML = String("Въведените пароли не съответстват!");
    }
    else {
        confirm_password_registration.classList.remove('is-invalid');
        help_registration.classList.add('d-none');
        instruction_registration.innerHTML = null;
        console.log("Праща се е-мейл за потвърждаване via PHP...");
        //Изписаните данни ще се изпращат към API след потвържедние
        console.log(name_registration_value);
        console.log(email_registration_value);
        console.log(account_type_registration);
        console.log(organization_registration_value);
        console.log(password_registration_value);
    }
}