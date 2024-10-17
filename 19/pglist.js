const PGList = (function () {
    function show(response) {
        const data = JSON.parse(response).data;
        document.body.innerHTML = '';
        let h1 = document.createElement('h1');
        h1.textContent = 'Фотогалерея';
        document.body.appendChild(h1);
        let section = document.createElement('section');
        section.id = 'photogallery';
        let a, img;
        data.forEach((el) => {
            a = document.createElement('a');
            a.href = '#get=' + el.id
            img = document.createElement('img');
            img.src = el.path;
            a.appendChild(img);
            section.appendChild(a);
        });
        document.body.appendChild(section);
        document.title = 'Фотогалерея';
    }
    function PGList() {
        this.ajax = new AJAXLoader();
        this.ajax.load('get.php', show);
    }
    return PGList;
})();
