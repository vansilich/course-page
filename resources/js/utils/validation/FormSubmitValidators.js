export const emailSubmitValidator = (inputValue, inputName) => {

    if (typeof notEmptySubmitValidator(inputValue, inputName) === "string"){
        return notEmptySubmitValidator(inputValue,inputName);
    }

    if (!/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-\d]+\.)+[a-zA-Z]{2,}))$/.test(inputValue)){
        return `Поле '${inputName}' должно быть корректным имейл адресом`
    }
};

export const phoneSubmitValidator = (inputValue, inputName) => {

    if (typeof notEmptySubmitValidator(inputValue, inputName) === "string"){
        return notEmptySubmitValidator(inputValue, inputName);
    }

    if (!/\d/.test(inputValue)){
        return `Поле '${inputName}' должно содежражть только цифры`
    }

};

export const notEmptySubmitValidator = (inputValue, inputName) => {

    if (inputValue === null || inputValue.length < 1){
        return `Поле '${inputName}' не должно быть пустым`;
    }
};
