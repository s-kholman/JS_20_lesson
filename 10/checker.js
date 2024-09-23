const rex = /^[0-9]+(px|pt|%|cm|in|pc|em|vw|vh)|(thin|medium|thick)$/i
const rex2 = /^[0-9]+(px|pt|%|cm|in|pc|em|vw|vh)$/i
function checkWidth() {
    if (this.value)
        if (rex.test(this.value))
            this.setCustomValidity('');
        else
            this.setCustomValidity('Укажите единицу измерения');
}

function checkRadius() {
    if (this.value)
        if (rex2.test(this.value))
            this.setCustomValidity('');
        else
            this.setCustomValidity('Укажите единицу измерения радиуса');
}

function prepareCheckWidth(page) {
    page.addEventListener('change', checkWidth);
}

function prepareCheckRadius(page) {
    page.addEventListener('change', checkRadius);
}