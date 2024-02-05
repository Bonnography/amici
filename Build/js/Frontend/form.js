class Recaptcha {
    currentForm = null;

    constructor() {
        this.initializeEvents();
        this.registerCallback();
    }

    initializeEvents() {
        // used with visible recaptcha
        [...document.querySelectorAll('[data-recaptcha-form-submit]')].map(button => {
            button.addEventListener('click', event => this.visibleRecaptchaButtonClicked(event));
        });

        // used with invisible recaptcha
        [...document.querySelectorAll('[data-callback="onRecaptchaSubmit"]')].map(button => {
            button.addEventListener('click', event => this.invisibleRecaptchaButtonClicked(event));
        });
    }

    visibleRecaptchaButtonClicked(event) {
        this.currentForm = event.target.closest('form');
        if (!this.currentForm.checkValidity()) {
            let list = this.currentForm.querySelectorAll(':invalid');
            for (let item of list) {
                item.parentElement.classList.add("invalid")
            }
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.target.closest('form').submit();
        }
        this.currentForm.classList.add('was-validated');

    }

    invisibleRecaptchaButtonClicked(event) {
        if (this.currentForm === null) {
            this.currentForm = event.target.closest('form');
        }
    }

    registerCallback() {
        window.onRecaptchaSubmit = this.submitCurrentForm.bind(this);
        window.onRecaptchaCallback = this.recaptchaConfirmed.bind(this);
        window.onRecaptchaExpired = this.recaptchaExpired.bind(this);
        window.onRecaptchaError = this.recaptchaError.bind(this);
    }

    submitCurrentForm(recaptchaResponse) {


        if (this.currentForm.checkValidity()) {
            this.currentForm.querySelector('[data-recaptcha-form-field]').value = recaptchaResponse;
            this.currentForm.submit();
            this.currentForm = null;
        } else {
            event.preventDefault()
            event.stopPropagation()
            this.currentForm.classList.add('was-validated')
            this.currentForm = null;
        }



        //this.currentForm.submit();

    }


    recaptchaConfirmed(recaptchaResponse) {
        document.querySelector('[data-recaptcha-form-field]').value = recaptchaResponse;
    }

    recaptchaExpired() {
        document.querySelector('[data-recaptcha-form-field]').value = '';
    }

    recaptchaError() {
        document.querySelector('[data-recaptcha-form-field]').value = '';
    }
}
new Recaptcha();
