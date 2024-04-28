export function like(idChClicker,index){
    $.ajax({
        type: "post",
        url: "./php/R_reaction.php",
        data: {
            idCh:idChClicker
        },
        dataType: "json",
        success: function (data) {
            alert(data.data.message);
            $(".like:eq("+index+"),.dislike:eq("+index+")").toggle();
            $("#affichageMusicAdorer").append($(".col:eq("+index+")").clone());
        
        }
    });
}
export function dislike(idChClicker,index){
}