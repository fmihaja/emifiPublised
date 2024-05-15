import * as reaction from "./A_reaction.js";
var icoMusic="./icone/audio.svg";
var icoLike="./icone/adore.svg";
var icoDislike="./icone/adore1.svg";

var idChReact=[];
var audio =new Audio();
var progressionMusic=$("#progressionMusic");
var srcValue="";
var  interval;
var inputAnnuler;
var nom=$("#nom").val();
var tel=$("#numeroTel").val();
$("#mettrePlay").show();
$("#mettrePause,#btnAutreFichier").hide();
$.ajax({
    type: "get",
    url: "./php/R_chanson.php",
    dataType: "json",
    success: function (data) {
        var dataSansReaction=data.sansReaction;
        var dataAvecReaction=data.avecReaction;
        
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
                Affichage Liste Music
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
                "class":"list-group-item rounded-3 py-3 lbGpMusic",
                "for":item.id_ch
            });
            var divColListeTitre=$("<div>").attr("class","col");
            //atao 30 caractèere max alaina
            divColListeTitre.text(item.titre.slice(0,30));
            var spanSousTitre=$("<span>").attr({
                "class":"d-block small opacity-50"
            });
            // spanSousTitre.text();
            var listeLike=imgLike.clone().addClass("placementReactionListe");
            var listeDislike=imgDislike.clone().addClass("placementReactionListe");
            //mametraka btn reaction
            lbGpMusic.append(divColListeTitre,listeLike,listeDislike);
            $("#listeMusic").append(rbButton,lbGpMusic);
            /* 
                Affichage Music admin
            */
           //icone
            var icoModif=$("<i>").addClass("fas fa-pen-square");
            var icoSupp=$("<i>").addClass("far fa-trash-alt suppMusic");
            var icoConfModif=$("<i>").addClass("far fa-check-circle confModif");
            var icoAnnulModif=$("<i>").addClass("far fa-times-circle annulerModif");
            //declaration element
            var rbAdmin=$("<input>").attr({
                "type":"radio",
                "class":"list-group-item-check pe-none rbAdmin",
                "name":"rbMusicAdmin" ,
                "id":"audio"+item.id_ch
            });
            var lbRbAdmin=$("<label>").attr({
                "class":"list-group-item rounded-3 py-3 lbRbAdmin",
                "for":"audio"+item.id_ch
            });       
            var containerXl=$("<div>").addClass("container-xl");
            var row=$("<div>").addClass("row");
            var colInputMusic=$("<div>").addClass("col-md-9");
            var inputMusic=$("<input>").attr({
                "class":"form-control listeMusicAdmin",
                "value":item.titre,
                "id":"input"+item.id_ch
            });
            inputMusic.prop("disabled",true);
            icoAnnulModif.css("margin-left","5px");
            var colModifier=$("<label>").attr({
                "class":"col-md-1 h3 btnModif",
                "for":"input"+item.id_ch
            });
            var colSuppression=$("<div>").addClass("col-md-1 h3 btnSupp");
            var colOptionModif=$("<div>").addClass("col-md-3 h3 optModif");
            //insertion des elements admin
            colInputMusic.append(inputMusic);
            colModifier.append(icoModif);
            colSuppression.append(icoSupp);
            colOptionModif.append(icoConfModif,icoAnnulModif);
            colOptionModif.hide();
            row.append(colInputMusic,colModifier,colSuppression,colOptionModif);
            containerXl.append(row);
            lbRbAdmin.append(containerXl);
            $("#gererMusic").append(rbAdmin,lbRbAdmin);
        });
        //music selectionné
        audio.src="null"
        $(".music").each((index, item)=> {
            $(item).on("click",()=>{
                $("#titreMusicLecture").text($(item).val());
                var musicTitre=$(".music").eq(index).val().replaceAll(" ","%20")+".mp3";
                srcValue="./audio/"+musicTitre;
                // cette tableau me permet de determiner si musicTitre est deja present dans l'url
                var musicEnLecture=audio.src.split('/');
                if (musicEnLecture.includes(musicTitre)){
                    // console.log("present");
                    //fait pause/play s'il est deja present
                    (audio.paused)? audio.play():audio.pause();
                    $("#mettrePlay,#mettrePause").toggle();
                }
                else{
                    //maj du source d'audio et play
                    // console.log("pas present")
                    // console.log(musicEnLecture);
                    // console.log(musicTitre);
                    audio.src=srcValue;
                    audio.play();
                    var next=(index+1<($(".music").length))? index+1:0;
                    var preview=(index-1>=0)? index-1:$(".music").length-1;
                    //tonga de show play d mande hira à chaque nouveau lien
                    $("#mettrePlay").hide();
                    $("#mettrePause").show();
                    //miova for label en fonction hira selectionné
                    $("#preview").attr("for",$(".music").eq(preview).attr("id"));
                    $("#next").attr("for",$(".music").eq(next).attr("id"));
                }
            })            
        });
        //progression de input range
        audio.addEventListener("timeupdate", function() {
            var longueurTemps=audio.duration;
            var actuelTemps=audio.currentTime;
            var pourcentageProgression=(actuelTemps*100)/longueurTemps;
            progressionMusic.val(pourcentageProgression);
            
        });
        //fin audio
        audio.addEventListener("ended",function(){
            var posChecked=$(".music:checked").index();
            console.log($(".music:checked").index());
            var next=(posChecked+1<$(".music").length)? posChecked+1:0;
            $(".music").eq(next).prop("checked",true);
            console.log($(".music:checked").index());
            $(".music:eq("+next+")").trigger("click")
        })
        //mettre pause/play
        $("#mettrePlay").on("click",()=>{
            audio.play();
            $("#mettrePlay,#mettrePause").toggle();
        })
        $("#mettrePause").on("click",()=>{
            audio.pause();
            $("#mettrePlay,#mettrePause").toggle();
        })
        //progression lors du click
        progressionMusic.on("click",(item)=>{
            //conversion de pourcentage en valeur réelle
            var pourcentageProgression=progressionMusic.val();
            var dureeMusic=audio.duration;
            audio.pause();
            audio.currentTime=(pourcentageProgression*dureeMusic)/100;
            audio.play();
        })
        //filtrage
        $("#recherche").on("input", function () {
            $("#typeFiltre").text("Filtrage");
            $.each($(".music"), function (index, item) {
                $(".lbGpMusic:eq("+index+")").toggle(($("#recherche").val().toUpperCase()===$(item).val().slice(0,$("#recherche").val().length).toUpperCase())) ;
                console.log($(item).is(":hidden"));
            });
        });
        $("#filtreAdorer").on("click",()=>{
            $.each($(".music"), function (index, item) {
                $(".lbGpMusic:eq("+index+")").toggle(!$("#affichageMusicAdorer>.col:eq("+index+")").is(":hidden")) ;
                console.log($(item).is(":hidden"));
            });
            $("#typeFiltre").text($("#filtreAdorer").text());
        })
        $("#filtreAucun").on("click",()=>{
            $(".lbGpMusic").show();
            $("#typeFiltre").text($("#filtreAucun").text());
        })
        //Reaction
        $.each($(".like"), (index, item) => { 
            $(item).on("click",()=>{
                // console.log($(".col").eq(index).attr("for"));
                //laps de temps @zay ef checked le input vo mandeha
                setTimeout(() => {
                    var id=$(".music:checked").attr("id");
                    console.log(id);
                    reaction.like(id,index);  
                }, 1);
                
            })
        });
        $.each($(".dislike"), (index, item) => { 
            $(item).on("click",()=>{
                // laps de temps @zay ef checked le input vo mandeha
                setTimeout(() => {
                    var id=$(".music:checked").attr("id");
                    console.log(id);
                    reaction.dislike(id,index);
                }, 100);
                // var id=$(".music:checked").attr("id");
            })
        });
        //modif admin
        $.each($(".btnModif"), (index,item)=> { 
            $(item).on("click",()=>{
                inputAnnuler=$(".listeMusicAdmin").eq(index).val();
                $(".listeMusicAdmin").prop("disabled",true);
                $(".listeMusicAdmin").eq(index).prop("disabled",false);
                $(".optModif,.btnModif:eq("+index+"),.btnSupp:eq("+index+")").hide();
                $(".confModif").eq(index).show();
                $(".optModif").eq(index).show();
                $(".rbAdmin").eq(index).prop("checked",true);
            })
        });
        $.each($(".btnSupp"),(index, item)=> { 
            $(item).on("click",()=>{
                var music=$(".listeMusicAdmin").eq(index);
                var confirmSuppression=confirm("Voulez vous vraiment supprimez "+music.val().slice(0,20)+" ?");
                if (confirmSuppression){
                    $.ajax({
                        type: "delete",
                        url: "./php/R_chanson.php",
                        data: JSON.stringify({
                            idCh:music.attr("id").slice(5),
                            titre:music.val()
                        }),
                        dataType: "json",
                        success: function (data) {
                            var msg=data.data.message;
                            alert(msg);
                            if (msg=="suppression effectué"){
                                $(item).hide();
                                $(".lbRbAdmin").eq(index).hide();
                                $("[for="+music.attr("id").slice(5)+"]").hide();
                            }
                        }
                    });
                }
            })
        });
        $.each($(".listeMusicAdmin"), (index, item)=> { 
            $(item).on("input",()=>{
                $(".confModif").eq(index).toggle($(item).val().trim()!="")                    
            })
        });
        $.each($(".annulerModif"), (index, item)=> { 
            $(item).on("click",()=>{
                $(".optModif").hide();
                $(".btnModif:eq("+index+"),.btnSupp:eq("+index+")").show();
                $(".listeMusicAdmin").eq(index).prop("disabled",true);
                $(".listeMusicAdmin").eq(index).val(inputAnnuler);
            })
        });
        $.each($(".confModif"), (index, item)=> { 
            $(item).on("click",()=>{
                var music=$(".listeMusicAdmin").eq(index);
                $.ajax({
                    type: "put",
                    url: "./php/R_chanson.php",
                    data: JSON.stringify({
                        titre:music.val(),
                        idCh:music.attr("id").slice(5)
                    }),
                    dataType: "json",
                    success: function (data) {
                        var msg=data.data.message;
                        alert(msg);
                        // if (msg=="Mise à jour effectuer"){
                        //     // $(".lab[for="+music.attr("id").slice(5)+"]").find(".card").find(".card-body").find("h5").text(music.val());
                        // }
                    }
                });
            })
        });
    }
});
//Modification User
$("#btnModifProfile").on("click",()=>{
    interval=setInterval(() => {
        if ($("#nom").val()=="" || $("#numeroTel").val().length!=10 || $("#mdp").val()==""){
            $("#modificationProfile").css("opacity","0.5");
            $("#modificationProfile").prop("disabled",true);
        }
        else{
            $("#modificationProfile").css("opacity","1");
            $("#modificationProfile").prop("disabled",false);
        }
    }, 100);
    
    $("#nom").on("keydown",(e)=>{
        if ((e.keyCode<60 || e.keyCode>90) && e.keyCode!=8 && e.keyCode!=37 && e.keyCode!=39)
            e.preventDefault();
    })
    
    $("#numeroTel").on("keydown",(e)=>{
        if ((isNaN(e.key) && e.keyCode!=8 && e.keyCode!=37 && e.keyCode!=39))
            e.preventDefault();
    })
})
$("#btnModifProfile").on("blur",()=>{
    clearInterval(interval);
})
$("#modificationProfile").on("click",function(e){
    e.preventDefault();
    $.ajax({
        type: "put",
        // data:"",
        url: "./php/R_user.php",
        // contentType: "application/json",
        data:JSON.stringify({
            nom:$("#nom").val(),
            numeroTel:$("#numeroTel").val(),
            mdp:$("#mdp").val(),
            nvMdp:$("#nvMdp").val()
        }),
        dataType: "json",
        success: function (data) {
            var msg=data.data.message
            if (msg=="mise à jour executé")
                $("#modificationProfile").closest('form').submit();
            else{
                $("#nom").val(nom);
                $("#numeroTel").val(tel);
            }
            alert(msg);

        },
        error:(e)=>{
            alert("Vous êtes actuelment hors ligne")
            console.log(e.responseText);
        }
    });
})
$("#btnConfSuppression").on("click",function(e){
    e.preventDefault();
    $.ajax({
        type: "DELETE",
        url: "./php/R_user.php",
        dataType: "json",
        success: function (data) {
            var msg=data.data.message;
            alert(msg);
            if (msg=="suppression effectué")
                $("#btnConfSuppression").closest('form').submit();
        }
    });
})
//ajout music
$("#envoieMusic").on("change",()=>{
    var nomFichier=$("#envoieMusic")[0].files[0].name;
    var extensionFichier=nomFichier.split(".").pop();
    $("#nomFichier").text(nomFichier);
    if (extensionFichier!="mp3"){
        $("#confEnvoieMusic").text("Veuillez choisir un fichier avec un format mp3");
        $("#btnAutreFichier").show();
        $("#btnAjoutMusic").hide();
    }
    else{
        $("#confEnvoieMusic").text("Voulez-vous ajouter cette chanson ?");
        $("#btnAutreFichier").hide();
        $("#btnAjoutMusic").show();
    }
})
$("#lbEnvoieMusic").on("click",()=>{
    $("#confEnvoieMusic").text("Voulez-vous ajouter cette chanson ?");
})
$("#btnAjoutMusic").on("click",(e)=>{
    e.preventDefault();
    var formData=new FormData();
    var fichier=$("#envoieMusic")[0].files[0];
    formData.append("music",fichier);
    $.ajax({
        type: "post",
        url: "./php/R_chanson.php",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        beforeSend:function(){
            $("*").css("cursor","progress");
            $("#btnAjoutMusic").css("opacity","0.5");
            $("#btnAjoutMusic").prop("disabled",true);
            
        },
        success: function (data) {
            var msg=data.data.message;
            $("*").css("cursor","default");
            if (msg=="Insertion réussi"){
                setTimeout(() => {
                    alert(msg);
                }, 1);
                $("#confEnvoieMusic").text("Voulez-vous ajouter une autre chanson?");
                $("#nomFichier").text("");
            }
            else{
                $("#nomFichier").text("Désolé,"+msg);
            }
            $("#btnAutreFichier").show();
            $("#btnAjoutMusic").hide();
        },
        complete:function(){
            $("*").css("cursor","default");
            $("#btnAjoutMusic").css("opacity","1");
            $("#btnAjoutMusic").prop("disabled",false);
        }
    });
})
//charger le fichier notification
$.get("./notification/notif.txt",function (data) {
    var lignes=data.split(".");
    lignes.forEach(item => {
        var contenuNotif=$("<li>").addClass("list-group-item list-group-item-action contenuNotif");
        contenuNotif.text(item);
        $("#listeNotif").append(contenuNotif);
    });
});
$.get("./notification/feedBack.txt",function (data) {
    var lignes=data.split(".");
    lignes.forEach(item => {
        var contenuFeedBack=$("<li>").addClass("list-group-item list-group-item-action contenuFeedBack");
        contenuFeedBack.text(item);
        $("#listeFeedBack").append(contenuFeedBack);
    });
});