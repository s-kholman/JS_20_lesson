this.addEventListener('message', (evt) =>{
    let flag, sqr
    for (let i = evt.data.min; i <= evt.data.max; ++i)
    {
        if (i % 2 != 0){
            flag = true
            sqr = Math.floor(Math.sqrt(i))
            for (let j = 3; j <= sqr; j += 2)
                if (i % j == 0) {
                    flag = false
                    break;
                }
                if (flag)
                    this.postMessage(i)
        }
    }
    this.postMessage('stop')
})