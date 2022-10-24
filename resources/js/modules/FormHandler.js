export default class FormHandler{

    constructor(
        form_selector,
        inputs_and_rules,
        input_error_class,
        error_bag_selector
    ){
        this.forms = document.querySelectorAll(form_selector);
        this.inputs_and_rules = inputs_and_rules;
        this.input_error_class = input_error_class;
        this.error_bag_selector = error_bag_selector;

        this.assignInputsHandlers();
    }

    assignInputsHandlers() {

        this.forms.forEach(form => {
            this.setupLiveValidators(form);

            form.addEventListener('submit', event => {

                event.preventDefault();

                const formErrorBag = form.querySelector(this.error_bag_selector);
                this.flushErrorBag(formErrorBag);

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

                this.handleFormSubmit(form, event);
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

    handleFormSubmit(form, event) {
        event.preventDefault();
        let success = document.getElementsByClassName('apply-form__success');
        let error = document.getElementsByClassName('apply-form__errors');

        for (var i = 0; i < success.length; i++) {
            success[i].innerHTML = "";
            error[i].innerHTML = "";
        }

        let token = document.head.querySelector("meta[name='_token']").content;

        fetch('send/request', {
            headers: {
                'X-CSRF-TOKEN': token
            },
            credentials: "same-origin",
            method:'post', body: new FormData(form)
        }).then((response) => {
            if (response.status == 422) {
                container.innerHTML = "Введённые Вами данные не прошли валидацию в системе :(";
                error.appendChild(container);
                return;
            }
            response.json().then((data) => {
                if (response.status == 200) {
                    switch(data['method']) {
                        case 'success':
                            for (var i = 0; i < success.length; i++) {
                                success[i].innerHTML = "<li>" + data['message'] + "</li>";
                            }

                            let btns = document.getElementsByClassName('popup-apply-form__submit');
                            for (var i = 0; i < btns.length; i++) {
                                btns[i].style.display = 'none';
                            }
                            document.getElementsByClassName('popup-apply-form-close')[0].style.display = 'block';
                            break;

                        case 'error':
                            for (var i = 0; i < error.length; i++) {
                                error[i].innerHTML = "<li>" + data['message'] + "</li>";
                            }
                            break;
                    }
                }
            }).catch((err) => {
                // let container = document.createElement('li');
                // container.innerHTML = err;
                // error.appendChild(container);
            })
        });

        //TODO отправлять форму через fetch и показывать ошибки
    }

    flushErrorBag(errorBag) {
        errorBag.innerHTML = '';
        let success = document.querySelector('.apply-form__success').innerHTML = '';
    }

    placeErrorsToBag(errorBag, errors){
        let HTML = '';

        errors.forEach(errorMessage => {
            HTML += '<li>' + errorMessage + '</li>';
        });

        errorBag.innerHTML = HTML;
    }

}
