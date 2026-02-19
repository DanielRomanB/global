// function toastr(type = "info", message = "") {
//     const toastr = Swal.mixin({
//         toastr: true,
//         position: 'top-end', // esquina superior derecha
//         showConfirmButton: false,
//         timer: 3500,
//         timerProgressBar: true,
//         didOpen: (toastr) => {
//             toastr.addEventListener('mouseenter', Swal.stopTimer);
//             toastr.addEventListener('mouseleave', Swal.resumeTimer);
//         }
//     });

//     toastr.fire({
//         icon: type,   // success | error | warning | info | question
//         title: message
//     });
// }

const handleFormSubmit = (event) => {
    event.preventDefault();
    let loginButton = document.getElementById('loginButton');
    loginButton.disabled = true;
    try {

        let ruc = document.getElementById('rucRequest').value
        let email = document.getElementById('emailRequest').value
        let password = document.getElementById('passwordRequest').value
        let go = true;
        if (ruc == '') {
            toastr.warning('Ingrese ruc por favor.');
            go = false;
        } else if (email == '') {
            toastr.warning('Ingrese email por favor.');
            go = false;
        } else if (password == '') {
            toastr.warning('Ingrese contraseña por favor.');
            go = false;
        }

        if (go) {
            LoginUrl = loginButton.dataset.url;   //Sistema global = 8000
            console.log(LoginUrl)
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
                        toastr.success(data.message);
                        // console.log(data.url);
                        window.location.href = data.url;
                    } else {
                        //mostrar error
                        toastr.error(data.message);
                    }
                })
                .catch((error) => console.error("Error:", error));
        }

        setTimeout(() => {
            loginButton.disabled = false;
        }, 4500);
    } catch (error) {
        toastr.error("Ha ocurrido un error inesperado");
        setTimeout(() => {
            toastr.info(error)
        }, 10);
        setTimeout(() => {
            loginButton.disabled = false;
        }, 4500);
    }
}