$("#loadSignUp").hide();
$('#btnSubmit').on("click", (e)=>{
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./php/R_user.php",
        data: {
            nom:$("#nom").val(),
            iEmail:$("#iEmail").val(),
            iMdp:$("#iMdp").val()
        },
        dataType: "json",
        beforeSend:()=>{
            $("#loadSignUp,#valueBtnSubmit").toggle();
        },
        success: function (data) {
            console.log(data.data.message);
            var message=data.data.message;
            alert(message)
            if (message=="Inscription effectuer")
                $('#btnSubmit').closest('form').submit();
        },
        error: function(e){
            alert("erreur de connexion");
        },
        complete:()=>{
            $("#loadSignUp,#valueBtnSubmit").toggle();
        }
    });
    
});