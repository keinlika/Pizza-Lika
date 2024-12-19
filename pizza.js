// pizza.js
function computeTotal() {
    document.getElementById("errorTotal").innerHTML = "Cleared any previous errors. Please review your selections.";

    let sum = 0;
    const menu = document.getElementsByClassName("pizzas");
    for (let i = 0; i < menu.length; i++) {
        if (menu[i].checked) {
            const parts = menu[i].value.split("-");
            sum += parseFloat(parts[1]);
        }
    }
    document.getElementById("total").value = '$' + sum.toFixed(2);
}

function checkPhone() {
    const phone = document.getElementById("phone").value;
    const isValid = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/.test(phone);

    document.getElementById("errorPhone").innerHTML = isValid ? "" : "Please enter phone number in the format xxx-xxx-xxxx";
    return isValid;
}

function checkCardNumber() {
    const ccnr = document.getElementById("cc-nr").value;
    const isValid = /^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/.test(ccnr);

    document.getElementById("errorCardNumber").innerHTML = isValid ? "" : "Please enter credit card number in the format xxxx-xxxx-xxxx-xxxx";
    return isValid;
}

function checkDate() {
  const date = document.getElementById("expiration").value;
  const isValidFormat = /^[0-9]{2}\/[0-9]{4}$/.test(date); // Ensure two slashes

  document.getElementById("errorExpiration").innerHTML = isValidFormat ? "" : "Please enter expiration date in the format MM/YYYY";
  return isValidFormat && checkDateFormat(date);
}

function checkDateFormat(date) {
    const [month, year] = date.split("/").map(Number);
    const isDateValid = month > 0 && month <= 12 && year > new Date().getFullYear();

    document.getElementById("errorExpiration").innerHTML = isDateValid ? "" : "Month must be 1-12 and year must be greater than the current year";
    return isDateValid;
}

function validateForm() {
    return checkPhone() && checkCardNumber() && checkDate() && checkPurchase() && checkTextInput();
}

function checkTextInput() {
    const textInputs = document.getElementsByClassName("textInput");
    for (const input of textInputs) {
        if (input.value.trim() === "") {
            return false;
        }
    }
    return true;
}

function checkPurchase() {
    const purchases = document.getElementsByClassName("pizzas");
    for (const purchase of purchases) {
        if (purchase.checked) {
            return true;
        }
    }
    document.getElementById("errorTotal").innerHTML = "Please select an item to buy!";
    return false;
}

function clearForm() {
    const errorSpans = document.getElementsByTagName("span");
    for (const span of errorSpans) {
        span.innerHTML = "";
    }
}

function setSelect(name) {
    document.getElementById(name).select();
}

function clearCCTypeError() {
    document.getElementById("errorCardType").innerHTML = "";
}

