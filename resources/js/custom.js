window.bootstrap = require('bootstrap');

$(document).ready(() => {
    lazyload();

    const pillElements = document.querySelectorAll('a[data-bs-toggle="pill"]')

    pillElements.forEach((element) => {
        element.addEventListener('shown.bs.tab', function (event) {
            localStorage.setItem('lastItem', '#' + event.target.getAttribute('id'));
        });
    });

    showLastProfileTab();
});

const token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

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

window.itemCartUp = function (element, price, event_id) {
    let result = handleCartItemUpDown(element, price, event_id, true);
    result = new Intl.NumberFormat('cs-CZ').format(result);
    document.getElementById('total-price').textContent = result.toString();

    axios.post('/cart/update', {
        event_id: event_id,
        increase: 1
    })
        .then(response => console.log(response.data))
        .catch(response => console.log(response.data));
}

window.itemCartDown = function (element, price, event_id) {
    let result = handleCartItemUpDown(element, price, false);
    result = new Intl.NumberFormat('cs-CZ').format(result);
    document.getElementById('total-price').textContent = result.toString();

    axios.post('/cart/update', {
        event_id: event_id,
        increase: 0
    })
        .then(response => console.log(response.data))
        .catch(response => console.log(response.data));
}

window.handleCartItemUpDown = (element, price, up) => {
    const inputEl = up ? element.previousElementSibling : element.nextElementSibling;
    const attributeName = up ? 'max' : 'min';
    let totalString = document.getElementById('total-price').textContent;
    const replaceStrings = [' ', '\s', "\u00A0", ','];
    replaceStrings.forEach(value => {
        const replaceValue = value === ',' ? '.' : '';
        totalString = totalString.replaceAll(value, replaceValue);
    });
    const totalBefore = parseFloat(totalString);
    const valueBefore = parseInt(inputEl.getAttribute('value'));
    const attribute = parseInt(inputEl.getAttribute(attributeName));
    up ? inputEl.stepUp(1) : inputEl.stepDown(1);
    if (valueBefore !== attribute) {
        up
            ? inputEl.setAttribute('value', (valueBefore + 1).toString())
            : inputEl.setAttribute('value', (valueBefore - 1).toString());
    }

    return valueBefore === attribute
        ? totalBefore
        : (up ? totalBefore + price : totalBefore - price);
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

window.changeSortOrder = () => {
    const element = document.getElementById('sort-order-icon');
    if (element.classList.contains('fa-sort-amount-up')) {
        element.classList.remove('fa-sort-amount-up');
        element.classList.add('fa-sort-amount-down');
    } else {
        element.classList.remove('fa-sort-amount-down');
        element.classList.add('fa-sort-amount-up');
    }
}

window.favoriteSport = (sport_id) => {
    const element = document.getElementById(sport_id.toString());

    if (element.classList.contains('fa-thumbs-up')) {
        element.classList.remove('fa-thumbs-up');
        element.classList.add('fa-thumbs-down');
    } else {
        element.classList.remove('fa-thumbs-down');
        element.classList.add('fa-thumbs-up');
    }

    axios.post('/sports/' + sport_id + '/favorite')
        .then(response => this.isFavorited = true)
        .catch(response => console.log(response.data));
}

window.showLastProfileTab = () => {
    const lastItem = localStorage.getItem('lastItem')

    if (lastItem) {
        const pillElement = document.querySelector(lastItem);
        const tab = new bootstrap.Tab(pillElement);
        tab.show();
    }
}
