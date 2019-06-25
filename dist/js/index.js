$(document).ready(function(){
    $.get("dist/php/recup.php",function(data){
        if(data.gonz.length != 0)
        {
            $("#placeholder_gonz").fadeOut(200);
            $.each(data.gonz,function(index){
                $("#gonz_group").append('<li class="list-group-item d-flex justify-content-between gonz" data-id='+this.id_gonz+'><span class="info" data-type="nom" data-value="'+this.nom+'">Nom : '+this.nom+'</span><span class="info" data-type="prenom" data-value="'+this.prenom+'">prenom : '+this.prenom+'</span><span class="info" data-type="note" data-form="number" data-value="'+this.note_tchoin+'">note : '+this.note_tchoin+'</span><span><button class="btn btn-primary btn_modif mr-3"> Modifier</button><button class="btn btn-primary btn_suppr"> Supprimer</button></span></li>');
            });
        }
    });

    $("body").on("click",".btn_add",function(){
        $.each($("input"),function(index){
            if($(this).val() == "")
            {
                $(this).addClass("is-invalid");
            }
            else
            {
                $(this).removeClass("is-invalid");
            }
        });

        if($(".is-invalid").length == 0)
        {
            
            $.post("./dist/php/ajout.php",{nom : $("#input_nom").val(),prenom : $("#input_prenom").val(),note : $("#input_note").val()},function(data){
                $("input").val("");
                $.get("dist/php/recup.php?id="+data.id,function(data){
                    if(data.gonz.length != 0)
                    {
                        $("#placeholder_gonz").fadeOut(200);
                        $.each(data.gonz,function(index){
                            $("#gonz_group").append('<li class="list-group-item d-flex justify-content-between gonz" data-id='+this.id_gonz+'><span class="info" data-type="nom" data-value="'+this.nom+'">Nom : '+this.nom+'</span><span class="info" data-type="prenom" data-value="'+this.prenom+'">prenom : '+this.prenom+'</span><span class="info" data-type="note" data-form="number" data-value="'+this.note_tchoin+'">note : '+this.note_tchoin+'</span><span><button class="btn btn-primary btn_modif mr-3"> Modifier</button><button class="btn btn-primary btn_suppr"> Supprimer</button></span></li>');
                        });
                    }
                });
            });



        }
    });

    $("body").on("click",".btn_suppr",function(){
        $.post("dist/php/suppression.php",{id : $(this).closest(".gonz").attr("data-id")},function(data){
            if($(".gonz").length == 1)
            {
                $("#placeholder_gonz").fadeIn(200);
            }
            $('[data-id="'+data.gonz+'"]').fadeOut("200",function(){
                $(this).remove();
            });
        });
    });

    $("body").on("click",".btn_modif",function(){
        var parent = $(this).closest(".gonz");
        $.each($(parent).find(".info"),function(index){
            var val = $(this).attr("data-value");
            var type = 'type="text"';
            if($(this).attr("data-form") != undefined)
            {
                type = 'type="number" min="0" max="10"';
            }
            $(this).replaceWith('<input class="form-control col-3" '+type+' data-value="'+$(this).attr("data-type")+'" value="'+val+'">');
        });
        $(this).toggleClass("btn_modif btn_save").text("Sauvegarder");
    });

    $("body").on("click",".btn_save",function(){
        var parent = $(this).closest(".gonz");
        var id = $(parent).attr("data-id");
        $.each($(parent).find(".form-control"),function(index){
            if($(this).val() == "")
            {
                $(this).addClass("is-invalid");
            }
        })
        if($(".is-invalid").length == 0)
        {
            var actu_object = $(this);
            $.post("dist/php/modif.php",{nom : $(parent).find('[data-value="nom"]').val(),prenom : $(parent).find('[data-value="prenom"]').val(),note : $(parent).find('[data-value="note"]').val(),id : id},function(data){
                $.each($(parent).find(".form-control"),function(index){
                    var val = $(this).val();
                    var type = '';
                    if($(this).attr("type") == "number")
                    {
                        type = 'data-form="number"';
                    }
                    $(this).replaceWith('<span class="info" '+type+' data-value="'+val+'" data-type="'+$(this).attr("data-value")+'">'+$(this).attr("data-value")+' : '+val+'</span>');
                });
                $(actu_object).toggleClass("btn_modif btn_save").text("Modifier");
            })
        }
    });
});