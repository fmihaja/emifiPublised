export function like(idChClicker,index){
    $.ajax({
        type: "post",
        url: "./php/R_reaction.php",
        data: {
            idCh:idChClicker
        },
        dataType: "json",
        success: (data)=> {
            alert(data.data.message);
            $(".col[for="+idChClicker+"]").find(".card>.card-body>.btnLiker").find(".like,.dislike").toggle();
            $("#affichageMusicAdorer > .col").eq(index).show();
        
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
                // $(".like:eq("+index+"),.dislike:eq("+index+")").toggle();
                $("#affichageMusicAdorer > .col[for="+idChClicker+"]").toggle();
                
            }
            alert(msg);
        },
        error:(e)=>{
            console.log(e.responseText);
        }
    });
}