import * as reaction from "./A_reaction.js";
var icoMusic="./icone/audio.svg";
var icoLike="./icone/adore.svg";
var icoDislike="./icone/adore1.svg";
$.ajax({
    type: "get",
    url: "./php/R_chanson.php",
    dataType: "json",
    success: function (data) {
        var dataSansReaction=data.sansReaction;
        var dataAvecReaction=data.avecReaction;
        var idChReact=[];
        //on met dans un tableau tout les music deja liker
        $.each(dataAvecReaction, (index,item)=> { 
             idChReact.push(item);
        });
        //creation de liste music 
        $.each(dataSansReaction, (index,item)=> { 
            var divCol=$('<label>').attr({
                "class":"col",
                "for":item.id_ch
            });
            var imgLike=$("<img>").attr({
                "src":icoLike,
                "class":"tailleReaction like"
            });
            var imgDislike=$("<img>").attr({
                "src":icoDislike,
                "class":"tailleReaction dislike"
            });
            var imgMusic=$("<img>").attr({
                "src":icoMusic,
                "width":"100%",
                "height":"180",
                "class":"bd-placeholder-img card-img-top posMargIcoMusic"
            });
            var divCardBody=$('<div>').attr("class","card-body");
            var divCardTitle=$('<h5>').attr("class","card-title titreMusic");
            divCardTitle.text(item.titre);
            var divBtn=$("<div>").attr("class","btn btn-primary btnLiker");
            var divCard=$("<div>").attr("class","card");
            divBtn.append(imgLike,imgDislike);
            divCardBody.append(divCardTitle,divBtn);
            divCard.append(imgMusic,divCardBody);
            divCol.append(divCard);
            if ($.inArray(item.id_ch,idChReact)!==-1){
                //affichage music liker
                imgDislike.show();
                imgLike.hide();
                $("#affichageMusicAdorer").append(divCol.clone()); 
            }
            else{
                imgDislike.hide();
                imgLike.show();
            }
            //affichage music
            $("#affichageChansons").append(divCol);
        });
        $.each($(".like"), (index, item) => { 
            $(item).on("click",()=>{
                var id=$(".col:eq("+index+")").attr("for");
                reaction.like(id,index);
            })
        });
    }
});