
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

var forgotten_pass;
function validateChangePassword() {
    let email_change_value = document.getElementById('email-change').value; //сравнява се с отговор от api
    let email_change = document.getElementById('email-change');

    let old_password_change_value = document.getElementById('old-password-change').value; //изпраща се на api
    let old_password_change = document.getElementById('old-password-change');

    let new_password_change_value = document.getElementById('new-password-change').value; //изпраща се на api
    let new_password_change = document.getElementById('new-password-change');

    let confirm_password_change_value = document.getElementById('confirm-password-change').value;
    let confirm_password_change = document.getElementById('confirm-password-change');

    let help_change = document.getElementById('help-change');
    let instruction_change = document.getElementById('instruction-change');

    if (!true) { //сравнява с e-mails от api
        email_change.classList.add('is-invalid');
        help_change.classList.remove('d-none');
        instruction_change.innerHTML = String("Акаунт с такъв e-mail НЕ съществува!");
        return;
    }
    else {
        email_change.classList.remove('is-invalid');
        help_change.classList.add('d-none');
        instruction_change.innerHTML = null;
        //Продължава
    }

    if (!forgotten_pass) {
        if (!true) { //сравнява с password от api
            old_password_change.classList.add('is-invalid');
            help_change.classList.remove('d-none');
            instruction_change.innerHTML = String("Грешна парола!");
            return;
        }
        else {
            old_password_change.classList.remove('is-invalid');
            help_change.classList.add('d-none');
            instruction_change.innerHTML = null;
            //Продължава
        }
    }


    //Validate Password
    if (new_password_change_value.length < 8) {
        new_password_change.classList.add('is-invalid');
        help_change.classList.remove('d-none');
        instruction_change.innerHTML = String("Новата паролата трябва да е поне 8 символа.");
        return;
    }
    else {
        //Продължава
        new_password_change.classList.remove('is-invalid');
        help_change.classList.add('d-none');
    }

    if (!forgotten_pass) {
        if (new_password_change_value == old_password_change_value) {
            new_password_change.classList.add('is-invalid');
            help_change.classList.remove('d-none');
            instruction_change.innerHTML = String("Старата парола съответства на новата парола!");
            return;
        }
        else {
            new_password_change.classList.remove('is-invalid');
            help_change.classList.add('d-none');
            instruction_change.innerHTML = null;
        }
    }

    //Confirm Password 
    if (new_password_change_value !== confirm_password_change_value) {
        confirm_password_change.classList.add('is-invalid');
        help_change.classList.remove('d-none');
        instruction_change.innerHTML = String("Въведените пароли не съответстват!");
    }
    else {
        confirm_password_change.classList.remove('is-invalid');
        help_change.classList.add('d-none');
        instruction_change.innerHTML = null;
        console.log("Праща се е-мейл via PHP...");
        //Изписаните данни ще се изпращат към API след потвържедние
        console.log(new_password_change_value);
    }
}

function forgottenPassword(forgotten) {
    let old_password_change_container = document.getElementById('old-password-change-container');
    if (forgotten) {
        old_password_change_container.classList.add('d-none');
    }
    else {
        old_password_change_container.classList.remove('d-none');
    }
    return forgotten_pass = forgotten;
}