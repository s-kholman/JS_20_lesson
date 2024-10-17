const PGItem = (function () {
    function show(response) {
        const data = JSON.parse(response).data;
        const desc = data.description || 'Изображение';
        document.body.innerHTML = '';
        let h1 = document.createElement('h1');
        h1.textContent = desc;
        document.body.appendChild(h1);
        let section = document.createElement('section');
        section.id = 'photo';
        let img = document.createElement('img');
        img.src = data.path;
        section.appendChild(img);
        document.body.appendChild(section);
        let p = document.createElement('p');
        let a = document.createElement('a');
        a.href = '';
        a.textContent = 'Назад';
        p.appendChild(a);
        document.body.appendChild(p);
        document.title = desc;
        window.scrollTo(0, 0);
    }
    function PGItem(id) {
        this.ajax = new AJAXLoader();
        this.ajax.load('get.php?image=' + id, show);
    }
    return PGItem;
})();
