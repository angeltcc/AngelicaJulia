const loginForm = document.getElementById("login-usuario-form");
const msgAlertErroLogin = document.getElementById("msgAlertErroLogin");

loginForm.addEventListener("submit", async, (e) =>{
    e.preventDefaut();

    if(document.getElementById("email").value === ""){
        msgAlertErroLogin.innerHTML = "Erro: Necessário preencher o campo usuário!";
    }
});