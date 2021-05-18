require('./bootstrap');

window.showLoginForm = function() {
    hideRegisterForm();
    document.getElementById('login-sidebar').style.width = '40%';
}

window.hideLoginForm = function () {
    document.getElementById('login-sidebar').style.width = "0";
}

window.showRegisterForm = function () {
    hideLoginForm();
    document.getElementById('register-sidebar').style.width = '40%';
}

window.hideRegisterForm = function () {
    document.getElementById('register-sidebar').style.width = "0";
}

window.itemCartUp = function (element, price) {
    const inputEl = element.previousElementSibling;
    let totalString = document.getElementById('total-price').textContent;
    totalString = totalString.replaceAll(' ', '');
    totalString = totalString.replaceAll("\u00A0", '');
    totalString = totalString.replace(',', '.');
    const totalBefore = parseFloat(totalString);
    const valueBefore = parseInt(inputEl.getAttribute('value'));
    const max = parseInt(inputEl.getAttribute('max'));

    inputEl.stepUp(1);
    if (valueBefore !== max) {
        inputEl.setAttribute('value', (valueBefore + 1).toString());
    }
    let result = valueBefore === max ? totalBefore : totalBefore + price;
    result = new Intl.NumberFormat('cs-CZ').format(result);
    document.getElementById('total-price').textContent = result.toString();
}

window.itemCartDown = function (element, price) {
    const inputEl = element.nextElementSibling;
    let totalString = document.getElementById('total-price').textContent;
    totalString = totalString.replaceAll(' ', '');
    totalString = totalString.replaceAll('\s', '');
    totalString = totalString.replaceAll("\u00A0", '');
    totalString = totalString.replace(',', '.');
    const totalBefore = parseFloat(totalString);
    const valueBefore = parseInt(inputEl.getAttribute('value'));
    const min = parseInt(inputEl.getAttribute('min'));
    inputEl.stepDown(1);
    if (valueBefore !== min) {
        inputEl.setAttribute('value', (valueBefore - 1).toString());
    }
    let result = valueBefore === min ? totalBefore : totalBefore - price;
    result = new Intl.NumberFormat('cs-CZ').format(result);
    document.getElementById('total-price').textContent = result.toString();
}

topButton = document.getElementById("top-button");

window.onscroll = function() {
    scrollFunction()
};

window.scrollFunction = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        topButton.style.display = "flex";
    } else {
        topButton.style.display = "none";
    }
}

window.topFunction = function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
