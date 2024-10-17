const PGAdd = (function () {
    let __ajax, __file, __description;
    function redirect() {
        location.hash = '';
    }
    function sendData(evt) {
        const fd = new FormData();
        fd.append('file', __file.files[0], __file.files[0].name);
        if (__description.value)
            fd.append('description', __description.value);
        __ajax = new AJAXLoader();
        __ajax.loadPOST('add.php', fd, redirect);
        evt.preventDefault();
    }
    function PGAdd() {
        document.body.innerHTML = '';
        let h1 = document.createElement('h1');
        h1.textContent = 'Добавление изображения';
        document.body.appendChild(h1);
        let form = document.createElement('form');
        let p = document.createElement('p');
        let txt = document.createTextNode('Изображение');
        p.appendChild(txt);
        let br = document.createElement('br');
        p.appendChild(br);
        __file = document.createElement('input');
        __file.type = 'file';
        __file.id = 'file';
        __file.accept = '.jpg';
        __file.required = true;
        p.appendChild( __file);
        form.appendChild(p);
        p = document.createElement('p');
        txt = document.createTextNode('Описание');
        p.appendChild(txt);
        br = document.createElement('br');
        p.appendChild(br);
        __description = document.createElement('textarea');
        __description.id = 'description';
        p.appendChild(__description);
        form.appendChild(p);
        p = document.createElement('p');
        let input = document.createElement('input');
        input.type = 'submit';
        input.value = 'Добавить';
        p.appendChild(input);
        form.appendChild(p);
        document.body.appendChild(form);
        form.addEventListener('submit', sendData);
        p = document.createElement('p');
        let a = document.createElement('a');
        a.href = '';
        a.textContent = 'Назад';
        p.appendChild(a);
        document.body.appendChild(p);
        document.title = 'Добавление изображения';
        window.scrollTo(0, 0);
    }
    return PGAdd;
})();