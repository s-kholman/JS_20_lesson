const AJAXLoader = (function () {
    function dataLoaded() {
        if (this.readyState == 4)
            if (this.status == 200)
                this.success(this.responseText);
            else
                this.error(this.statusText);
    }
    function AJAXLoader() {
        this.ajax = new XMLHttpRequest();
        this.ajax.addEventListener('readystatechange', dataLoaded);
    }

    AJAXLoader.prototype.showAlert = function(errorText) {
        window.alert(errorText);
    }



    Object.defineProperty(AJAXLoader, 'GET', {value: 'GET', writable: false});
    Object.defineProperty(AJAXLoader, 'POST', {value: 'POST', writable: false});

    AJAXLoader.prototype.load = function (url, success, statusGet) {
        this.ajax.success = success
        this.ajax.error = statusGet || this.showAlert
        this.ajax.open(AJAXLoader.GET, url, true)
        this.ajax.send()
    }

    AJAXLoader.loadHTML = function (url, el) {
        if (typeof el == 'string')
            el = document.getElementById(el);
        const ajax = new AJAXLoader();
        ajax.load(url, (html) => {
            el.innerHTML = html;
        });
    };

    return AJAXLoader
})()