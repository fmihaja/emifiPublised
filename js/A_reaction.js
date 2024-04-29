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
            $(".like:eq("+index+"),.dislike:eq("+index+")").toggle();
            $("#affichageMusicAdorer > .dislike").eq(index).show()
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
                $(".like:eq("+index+"),.dislike:eq("+index+")").toggle();
                $("#affichageMusicAdorer > .col[for="+idChClicker+"]").toggle();
                
            }
            alert(msg);
        },
        error:(e)=>{
            console.log(e.responseText);
        }
    });
}