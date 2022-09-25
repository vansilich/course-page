export const phoneLiveValidator = (event, input) => {

    //allow only digits in phone input
    const isInputCorrect = /\d/.test(event.data);

    if (!isInputCorrect) {
        event.preventDefault();

        input.value = input.value.replace(/\D+/g, '');
    }
}
