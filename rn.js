const but = document.getElementById("but")

but.addEventListener('click', () => {
    const inptag = document.getElementsByTagName("input")
    const username = inptag[0].value
    const password = inptag[1].value
    console.log(username)
    console.log(password)
    fetch("http://localhost/cdm/test.php",{
        method: 'POST',
        body: JSON.stringify({"id": 1}),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8'
        }
    }).then((res)=>{
        console.log(res)
    }).then((resp)=>{
        console.log(resp)
    })
})