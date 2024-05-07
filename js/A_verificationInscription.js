$("#loadSignUp,#loadLogin,#login").hide();
$("#nom").focus();
$("#nom").on("keydown",(e)=>{
    if ((e.keyCode<60 || e.keyCode>90) && e.keyCode!=8)
        e.preventDefault();
})

$("#iTel").on("keydown",(e)=>{
    // console.log(!(isNaN(e.key)));
    if ((isNaN(e.key) && e.keyCode!=8))
        e.preventDefault();
})

$("#nom").on("blur",function(){
    var input=$(this).val();
    if (input.length==0)
        $(this).focus();
})

$("#iTel").on("blur",function(){
    var input=$(this).val();
    if (input.length!=10)
        $(this).focus();
})

setInterval(() => {
    if($("#nom").val()=="" || $("#iEmail").val()=="" || $("#iMdp").val()=="" || $("#iTel").val().length!=10){
        $('#btnSubmit').css("opacity","0.5");
        $('#btnSubmit').prop("disabled",true);
    }
    else{
        $('#btnSubmit').css("opacity","1");
        $('#btnSubmit').prop("disabled",false); 
    }
}, 300);

$("#switchSignUp,#switchLogin").on("click",()=>{
    $("#login,#signUp").toggle();
})

$("#btnSubmitLogin").on("click",(e)=>{
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./php/R_connexionUser.php",
        data: {
            mdp:$("#mdp").val(),
            email:$("#email").val()
        },
        dataType: "json",
        beforeSend:()=>{
            $("#loadLogin,#valueBtnSubmitLogin").toggle();
        },
        success: function (data) {
            var msg=data.data.message;
            if (msg=="Connexion effectué")
                $('#btnSubmitLogin').closest('form').submit();
            else
                alert(msg);
        },
        error: function(e){
            alert("erreur de connexion");
            console.log(e.responseText);
        },
        complete:()=>{
            $("#loadLogin,#valueBtnSubmitLogin").toggle();

        }
    });
})

$('#btnSubmit').on("click", (e)=>{
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./php/R_user.php",
        data: {
            nom:$("#nom").val(),
            iEmail:$("#iEmail").val(),
            iMdp:$("#iMdp").val(),
            iTel:$("#iTel").val()
        },
        dataType: "json",
        beforeSend:()=>{
            $("#loadSignUp,#valueBtnSubmit").toggle();
        },
        success: function (data) {
            console.log(data.data.message);
            var message=data.data.message;
            // alert(message);
            if (message=="Inscription effectuer")
                $('#btnSubmit').closest('form').submit();
            else
                alert(message);

        },
        error: function(e){
            alert("erreur de connexion");
            console.log(e.responseText);
        },
        complete:()=>{
            $("#loadSignUp,#valueBtnSubmit").toggle();
        }
    });
    
});