
    //datepicker
    $('.datepicker').datepicker({'dateFormat':'yy-m-d'});


    //Insert event button
    $('#insert-button').click(function(){
        $('#insert-form').toggle();
    });

    //Click nos botões de delete
    $('.delete-link').click(function(e){
        var resposta = confirm('Deseja apagar este artigo?');
        if( !resposta ){
            e.preventDefault();
        }
    });
