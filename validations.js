
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
    if (new_password_change_value == old_password_change_value) {
        new_password_change.classList.add('is-invalid');
        help_change.classList.remove('d-none');
        instruction_change.innerHTML = String("Новата парола съответства на старата парола!");
        return;
    }
    else {
        new_password_change.classList.remove('is-invalid');
        help_change.classList.add('d-none');
        instruction_change.innerHTML = null;
    }

    //Confirm Password 
    if (new_password_change_value !== confirm_password_change_value) {
        confirm_password_change.classList.add('is-invalid');
        help_change.classList.remove('d-none');
        instruction_change.innerHTML = String("Въведените пароли не съответстват!");
        return;
    }
    else {
        confirm_password_change.classList.remove('is-invalid');
        help_change.classList.add('d-none');
        instruction_change.innerHTML = null;
        console.log("Праща се е-мейл via PHP...");
        //Изписаните данни ще се изпращат към API след потвържедние
        console.log(new_password_change_value);
    }
    document.getElementById('form-change-password').reset();
}

var step = 1;
function forgottenPassword() {
    //Трябва да имам отделна променлива за имейл, за да знам на кой имейл сменям паролата

    if (step == 1) { //Попълване на имейл и изпращане на код
        let email_forgotten_value = document.getElementById('email-forgotten').value;
        let email_forgotten = document.getElementById('email-forgotten');
        if (!true) {  //сравнява с e-mails от api            
            email_forgotten.classList.add('is-invalid');
            document.getElementById('help-email-forgotten').classList.remove('d-none');
            document.getElementById('instruction-email-forgotten').innerHTML = String("Акаунт с такъв e-mail НЕ съществува!");
            return;
        }
        else {
            email_forgotten.classList.remove('is-invalid');
            document.getElementById('help-email-forgotten').classList.add('d-none');
            document.getElementById('instruction-email-forgotten').innerHTML = null;

            document.getElementById('form-email-forgotten').classList.add('d-none');
            document.getElementById('form-code-forgotten').classList.remove('d-none');
            step++;
        }
    }
    else if (step == 2) { //Сравнение на код
        let code_forgotten_value = document.getElementById('code-forgotten').value;
        let code_forgotten = document.getElementById('code-forgotten');
        if (!true) { //сравнява код
            code_forgotten.classList.add('is-invalid');
            document.getElementById('help-code-forgotten').classList.remove('d-none');
            document.getElementById('instruction-code-forgotten').innerHTML = String("Кодът не съответства на пратения код!");
            return;
        }
        else {
            code_forgotten.classList.remove('is-invalid');
            document.getElementById('help-code-forgotten').classList.add('d-none');
            document.getElementById('instruction-code-forgotten').innerHTML = null;

            document.getElementById('form-code-forgotten').classList.add('d-none');
            document.getElementById('form-pass-forgotten').classList.remove('d-none');
            step++;
            /*how to add data-bs-dismiss="modal"*/
        }
        document.getElementById('ok-btn-forgotten').setAttribute("data-bs-dismiss", "modal");
    }

    else if (step == 3) { //Въвеждане на новата парола и потвърждаване
        let new_password_forgotten_value = document.getElementById('new-password-forgotten').value;
        let new_password_forgotten = document.getElementById('new-password-forgotten');

        let confirm_password_forgotten_value = document.getElementById('confirm-password-forgotten').value;
        let confirm_password_forgotten = document.getElementById('confirm-password-forgotten');

        let help_pass_forgotten = document.getElementById('help-pass-forgotten');
        let instruction_pass_forgotten = document.getElementById('instruction-pass-forgotten');

        if (new_password_forgotten_value.length < 8) {
            new_password_forgotten.classList.add('is-invalid');
            help_pass_forgotten.classList.remove('d-none');
            instruction_pass_forgotten.innerHTML = String("Новата паролата трябва да е поне 8 символа.");
            return;
        }
        else {
            //Продължава
            new_password_forgotten.classList.remove('is-invalid');
            help_pass_forgotten.classList.add('d-none');
            instruction_pass_forgotten.innerHTML = null;
        }

        //Confirm Password 
        if (new_password_forgotten_value !== confirm_password_forgotten_value) {
            confirm_password_forgotten.classList.add('is-invalid');
            help_pass_forgotten.classList.remove('d-none');
            instruction_pass_forgotten.innerHTML = String("Въведените пароли не съответстват!");
            return;
        }
        else {
            confirm_password_forgotten.classList.remove('is-invalid');
            help_pass_forgotten.classList.add('d-none');
            instruction_pass_forgotten.innerHTML = null;

            //Изписаните данни ще се изпращат към API
            console.log(new_password_forgotten_value);
        }
        alert("Успешно сменихте паролата си!");

        document.getElementById('form-email-forgotten').reset();
        document.getElementById('form-code-forgotten').reset();
        document.getElementById('form-pass-forgotten').reset();

        document.getElementById('form-pass-forgotten').classList.add('d-none');
        document.getElementById('form-email-forgotten').classList.remove('d-none');
        step = 1;

    }

}