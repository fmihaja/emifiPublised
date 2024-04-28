var icoMusic="./icone/audio.svg";
var icoLike="./icone/adore.svg";
$.ajax({
    type: "get",
    url: "./php/R_chanson.php",
    dataType: "json",
    success: function (data) {
        console.log(data.data);
        $.each(data.data, (index,item)=> { 
            // $("#affichageChansons").append(item.titre,item.id_ch);
            // var divCol=$("<col>").attr({
            //     "class":"col",
            //     "id":item.id_ch
            // })
            // var divCardBody=$("<div>").attr({
            //     "class":"card-body"
            // })
            // var divCardTitle=$("<div>")
            var divCol=$('<div>').attr({
                "class":"col",
                "id":item.id_ch
            });
            var imgLike=$("<img>").attr({
                "src":icoLike,
                "class":"tailleReaction"
            })
            var imgMusic=$("<img>").attr({
                "src":icoMusic,
                "width":"100%",
                "height":"180",
                "class":"bd-placeholder-img card-img-top posMargIcoMusic"
            })
            var divCardBody=$('<div>').attr("class","card-body");
            var divCardTitle=$('<h5>').attr("class","card-title titreMusic");
            divCardTitle.text(item.titre);
            var divBtn=$("<div>").attr("class","btn btn-primary btnLiker");
            var divCard=$("<div>").attr("class","card");
            divBtn.append(imgLike);
            divCardBody.append(divCardTitle,divBtn);
            divCard.append(imgMusic,divCardBody);
            divCol.append(divCard);
            $("#affichageChansons").append(divCol);
            // var imgMusic=$("<img>").attr({
            //     "src":$icoMusic,
            //     "class":"bd-placeholder-img card-img-top posMargIcoMusic",
            //     "width":"100%",
            //     "height":"180"
            // });
            // var divCardBody=$('<img>').addClass("card-body");
            // var h5CardTitle=$('<h5>').addClass("card-title");
            // var btnReaction=$('<div>').addClass("btn btn-primary btnLikerDisliker");
            // var imgLike=$('<img>').attr({
            //     "src":$icoLike,
            // })
            // btnReaction.append(imgLike);
            // divCardBody.append(h5CardTitle,btnReaction);
            // divCard.append(imgMusic,divCardBody);
            // divCol.append(divCard);
            // $("#affichageChansons").append(divCol);
        });
    }
});