const handleFormSubmit = (event) => {
    event.preventDefault();
    let loginButton = document.getElementById('loginButton');
    loginButton.disabled = true;
    try{

        let ruc = document.getElementById('rucRequest').value
        let email = document.getElementById('emailRequest').value
        let password = document.getElementById('passwordRequest').value
        let go = true;
        if (ruc == '') {
            showAlert('warning', 'Ingrese ruc por favor.');
            go = false;
        } else if (email == '') {
            showAlert('warning', 'Ingrese email por favor.');
            go = false;
        } else if (password == '') {
            showAlert('warning', 'Ingrese contraseña por favor.');
            go = false;
        }
    
        if (go) {
            LoginUrl = "http://127.0.0.1:8000/api/login"    //Sistema global = 8000
    
            fetch(LoginUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    ruc: ruc,
                    email: email,
                    password: password
                }),
            })
                .then((resp) => resp.json())
                .then((data) => {
                    if (data.status == '200') {
                        showAlert("success", data.message);
                        // console.log(data.url);
                        window.location.href = data.url;
                    } else {
                        //mostrar error
                        showAlert("error", data.message);
                    }
                })
                .catch((error) => console.error("Error:", error));
        }
    
        setTimeout(() => {
            loginButton.disabled = false;
        }, 4500);
    } catch(error){
        showAlert("error", "Ha ocurrido un error inesperado");
        setTimeout(() => {
            showAlert("info", error)
        }, 10);
        setTimeout(() => {
            loginButton.disabled = false;
        }, 4500);
    }
}