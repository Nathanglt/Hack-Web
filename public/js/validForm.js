window.onload=function(){
var monLien=document.getElementsByName("register[lienportfolio]")
console.log(monLien)
monLien[0].addEventListener('input',function(event){
    var laSaisie = event.target.value
    console.log(monLien)
    var regex = new RegExp(/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/);
    var monErreur = document.getElementById("erreur")
    var monBtn = document.getElementById('btnSubmit')
    if (regex.test(laSaisie))
    {
        monErreur.textContent = ""
        document.getElementById("btnSubmit").disabled = false;
    }
    else{
        monErreur.textContent = "Non correct"
        monBtn.setAttribute("disabled",true)
    }
})
}
