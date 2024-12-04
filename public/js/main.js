const parametro = new URLSearchParams(window.location.search)
const tipoMensagem = parametro.get("mensagem")
const notificacao = document.createElement("div")

if (tipoMensagem === "sucesso"){
    notificacao.innerHTML = "Operação realizada com sucesso!"
    notificacao.className = "notificacao sucesso"
}else if(tipoMensagem === "erro"){
    notificacao.innerHTML = "Erro ao realizar operação!"
    notificacao.className = "notificacao erro"
}
document.body.appendChild(notificacao)
setTimeout(function () {
    notificacao.remove()
    }, 2000)

const urlSemParametro = window.location.pathname
window.history.replaceState(null, "", urlSemParametro)