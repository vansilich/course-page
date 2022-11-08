export default class FormHandler{

    constructor(
        form_selector,
        inputs_and_rules,
        input_error_class,
        error_bag_selector,
        success_alert_selector,
    ){
        this.forms = document.querySelectorAll(form_selector);
        this.inputs_and_rules = inputs_and_rules;
        this.input_error_class = input_error_class;
        this.error_bag_selector = error_bag_selector;
        this.success_alert_selector = success_alert_selector;

        this.assignInputsHandlers();
    }

    assignInputsHandlers() {

        this.forms.forEach(form => {
            this.setupLiveValidators(form);

            form.addEventListener('submit', event => {

                event.preventDefault();
                
                const formErrorBag = form.querySelector(this.error_bag_selector);
                const formSuccessBag = form.querySelector(this.success_alert_selector);
                this.flushAlerts(formErrorBag, formSuccessBag);

                const errors = [];

                for (const querySelector in this.inputs_and_rules){
                    const input = form.querySelector(querySelector);
                    const inputParams = this.inputs_and_rules[querySelector];

                    // Arrays is objects too
                    if (typeof inputParams.submitValidators === 'object'){
                        inputParams.submitValidators.forEach(validator => {

                            const error_message = validator(input.value, inputParams.inputName);

                            if (error_message !== undefined){
                                input.classList.add(this.input_error_class);

                                errors.push(error_message);
                            }
                        })
                    }
                }

                if (errors.length !== 0){
                    event.preventDefault();

                    this.placeErrorsToBag(formErrorBag, errors);
                    return;
                }

                this.handleFormSubmit(form, event, formErrorBag, formSuccessBag);
            })
        })
    }

    setupLiveValidators(form){

        for (const querySelector in this.inputs_and_rules){

            const input = form.querySelector(querySelector);
            const inputParams = this.inputs_and_rules[querySelector];

            input.addEventListener('input', event => {

                input.classList.remove(this.input_error_class);

                if (typeof inputParams.liveValidator === "function") {
                    inputParams.liveValidator(event, input);
                }
            });
        }
    }

    async handleFormSubmit(form, event, formErrorBag, formSuccessBag) {

        event.preventDefault();
        const requestUrl = form.getAttribute('action');

        let token = document.head.querySelector("meta[name='_token']").content;

        const response = await fetch(requestUrl, {
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            credentials: "same-origin",
            method:'post', 
            body: new FormData(form),
        })
            
        if (response.status == 422) {
            this.placeErrorsToBag(formErrorBag, ["Введённые Вами данные не прошли валидацию в системе"]);
            return;
        }
        const responseJSON = await response.json();

        try {
            if (response.status == 200) {
                switch(responseJSON['method']) {
                    case 'success':
                        
                        this.placeSuccessMessagesToBag(formSuccessBag, [responseJSON['message']]);

                        let btns = form.getElementsByClassName('popup-apply-form__submit');
                        for (var i = 0; i < btns.length; i++) {
                            btns[i].style.display = 'none';
                        }
                        form.getElementsByClassName('popup-apply-form-close')[0].style.display = 'block';
                        break;

                    case 'error':
                        placeErrorsToBag(formErrorBag, [responseJSON['message']])
                        break;
                }
            }
        } catch(err) {
            // let container = document.createElement('li');
            // container.innerHTML = err;
            // error.appendChild(container);
        }
        
    }

    flushAlerts(errorBag, successBag) {
        errorBag.innerHTML = '';
        successBag.innerHTML = '';
    }

    placeErrorsToBag(errorBag, errors){
        let HTML = '';

        errors.forEach(errorMessage => {
            HTML += '<li>' + errorMessage + '</li>';
        });

        errorBag.innerHTML = HTML;
    }

    placeSuccessMessagesToBag(successBag, messages){
        let HTML = '';

        messages.forEach(message => {
            HTML += '<li>' + message + '</li>';
        });

        successBag.innerHTML = HTML;
    }

}
