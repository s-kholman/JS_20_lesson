const PGList2 = (function () {
    let __section;
    function newFile(evt) {
        const el = JSON.parse(evt.data);
        const a = document.createElement('a');
        a.href = '#get=' + el.id;
        const img = document.createElement('img');
        img.src = el.path;
        a.appendChild(img);
        __section.appendChild(a);
    }
    function end(evt) {
        evt.target.close();
    }
    function PGList2() {
        document.body.innerHTML = '';
        let h1 = document.createElement('h1');
        h1.textContent = 'Фотогалерея';
        document.body.appendChild(h1);
        let p = document.createElement('p');
        let a = document.createElement('a');
        a.href = '#add';
        a.textContent = 'Добавить изображение';
        p.appendChild(a);
        document.body.appendChild(p);
        __section = document.createElement('section');
        __section.id = 'photogallery';
        document.body.appendChild(__section);
        document.title = 'Фотогалерея';
        window.scrollTo(0, 0);
        this.es = new EventSource('get2.php');
        this.es.addEventListener('newfile', newFile);
        this.es.addEventListener('end', end);
    }
    return PGList2;
})();
