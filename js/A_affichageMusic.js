import * as reaction from "./A_reaction.js";
var icoMusic="./icone/audio.svg";
var icoLike="./icone/adore.svg";
var icoDislike="./icone/adore1.svg";
var audio =new Audio();
var srcValue="";
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
        $.each(dataSansReaction, (index,item)=> { 
            /*
                creation de liste music
            */
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
            if ($.inArray(item.id_ch,idChReact)!==-1){
                //affichage music liker
                imgDislike.show();
                imgLike.hide();

            }
            else{
                imgDislike.hide();
                imgLike.show();
            }
            divBtn.append(imgLike,imgDislike);
            divCardBody.append(divCardTitle,divBtn);
            divCard.append(imgMusic,divCardBody);
            divCol.append(divCard);
            //affichage music
            $("#affichageChansons").append(divCol).show();
            var divColClone=divCol.clone();
            // affiche l'element adorer
            divColClone.toggle($(".like:eq("+index+")").is(":hidden"));
            $("#affichageMusicAdorer").append(divColClone);
            /*
                Liste Music
            */
            var rbButton=$("<input>").attr({
                "type":"radio",
                "class":"list-group-item-check pe-none music",
                "name":"gpMusic",
                "id":item.id_ch,
                "value":item.titre
                // "name":
            });
            var lbGpMusic=$("<label>").attr({
                "class":"list-group-item rounded-3 py-3",
                "for":item.id_ch
            });
            lbGpMusic.text(item.titre);
            var spanSousTitre=$("<span>").attr({
                "class":"d-block small opacity-50"
            });
            // spanSousTitre.text();
            lbGpMusic.append(spanSousTitre);
            $("#listeMusic").append(rbButton,lbGpMusic);
                   
        });
        //music selectionné
        audio.src="null"
        $(".music").each((index, item)=> {
            $(item).on("click",()=>{
                $("#titreMusicLecture").text($(item).val());
                var musicTitre="%20"+$(".music").eq(index).val().replace(" ","%20")+".mp3";
                srcValue="./audio/"+musicTitre;
                // cette tableau me permet de determiner si musicTitre est deja present dans l'url
                var musicEnLecture=audio.src.split('/');
                if (musicEnLecture.includes(musicTitre)){
                    console.log("present");
                    //fait pause/play s'il est deja present
                    (audio.paused)? audio.play():audio.pause();
                }
                else{
                    //maj du source d'audio
                    console.log("pas present")
                    audio.src=srcValue;
                    audio.play();
                }
            })            
        });
        //filtrage
        //Reaction
        $.each($(".like"), (index, item) => { 
            $(item).on("click",()=>{
                var id=$(".col:eq("+index+")").attr("for");
                reaction.like(id,index);
            })
        });
        $.each($(".dislike"), (index, item) => { 
            $(item).on("click",()=>{
                var id=$(".col:eq("+index+")").attr("for");
                reaction.dislike(id,index);
            })
        });
    }
});