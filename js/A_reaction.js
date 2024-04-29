export function like(idChClicker,index){
    $.ajax({
        type: "post",
        url: "./php/R_reaction.php",
        data: {
            idCh:idChClicker
        },
        dataType: "json",
        success: (data)=> {
            // alert(data.data.message);
            var msg=data.data.message;
            if (msg=="reaction executé"){
                $(".col[for="+idChClicker+"]").find(".card>.card-body>.btnLiker").find(".like,.dislike").toggle();
                $("#affichageMusicAdorer > .col").eq(index).show();
            }
            else
                alert(data.data.message);
        },
        error:(e)=>{
            alert("Vous êtes actuelment hors ligne")
            console.log(e.responseText);
        }
    });
}
export function dislike(idChClicker,index){
    $.ajax({
        type: "DELETE",
        url: "./php/R_reaction.php",
        contentType: "application/json",
        data: JSON.stringify({idCh:idChClicker}),
        dataType: "json",
        success: (data)=> {
            var msg=data.data.message;
            if (msg=="dislike executé"){
                $(".col[for="+idChClicker+"]").find(".card>.card-body>.btnLiker").find(".like,.dislike").toggle();
                $("#affichageMusicAdorer > .col[for="+idChClicker+"]").toggle(); 
            }
            else
                alert(data.data.message);
            // alert(msg);
        },
        error:(e)=>{
            alert("Vous êtes actuelment hors ligne")
            console.log(e.responseText);
        }
    });
}