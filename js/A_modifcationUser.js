export function modificationProfil(nom,numeroTel,mdp){
    setInterval(() => {
        if ($("#nom").val()=="" || $("#numeroTel").val()=="" || $("#mdp").val()==""){
            $("#modificationProfile").css("opacity","0.5");
            $("#modificationProfile").prop("disabled",true);
        }
        else{
            $("#modificationProfile").css("opacity","1");
            $("#modificationProfile").prop("disabled",false);
        }
    }, 100);
    
    $("#nom").on("keydown",(e)=>{
        if ((e.keyCode<60 || e.keyCode>90) && e.keyCode!=8)
            e.preventDefault();
    })
    
    $("#numeroTel").on("keydown",(e)=>{
        if ((isNaN(e.key) && e.keyCode!=8))
            e.preventDefault();
    })
    
}