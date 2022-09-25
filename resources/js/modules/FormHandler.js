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

    handleFormSubmit(form, event){
        event.preventDefault();

        //TODO отправлять форму через fetch и показывать ошибки
        console.log(form);
    }

    flushErrorBag(errorBag) {
        errorBag.innerHTML = '';
    }

    placeErrorsToBag(errorBag, errors){
        let HTML = '';

        errors.forEach(errorMessage => {
            HTML += '<li>' + errorMessage + '</li>';
        });

        errorBag.innerHTML = HTML;
    }

}
