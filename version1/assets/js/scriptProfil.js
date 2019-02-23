$(function () {
    $('#boxShowHide').click(function () {
        if ($('#showHide').hasClass('hide')) {
            $('#showHide').removeClass('hide');
        } else {
            $('#showHide').addClass('hide');
        }
    });
    //Au clic sur le bouton qui possede d'id profilModifButton
    $('#profilModifButton').click(function () {
        //Si des éléments possédant la classe showHideProfil possedent également la classe hide
        if ($('.showHideProfil').hasClass('hide')) {
            //Leur retirer la classe hide
            $('.showHideProfil').removeClass('hide');
        }
    });
    //Au clic sur le bouton qui possede d'id profilModifButton
    $('#profilModifButton').click(function () {
        //Ouvrir les éléments qui possedent la class showHideProfil dans une boite de dialogue
        $('.showHideProfil').dialog({
            position: {
                my: 'center center',
                at: 'center top',
                of: window
            }});
    });
    //Au clic sur le bouton qui possede d'id profilModifSubmit
    $('#profilModifSubmit').click(function () {
        //Lancer la méthode AJAX post
        $.post(
                'controllers/controllerProfilUser.php',
                {
                    login: $('#login').val(),
                    birthdate: $('#birthdate').val(),
                    mail: $('#mail').val(),
                    gender: $('#gender').val(),
                    country: $('#country').val(),
                    profilModifSubmit: $('#profilModifSubmit').attr('name')
                },
                //Déclaration de la fonction result qui prend en argument la réponse de la méthode AJAX
                        function result(response) {
                            //Fermer la boite de dialogue
                            $('.showHideProfil').dialog('close');
                            //Ouvrire une autre boite de dilogue avec l'élément qui possede l'id reponse
                            $('#response').dialog({
                                position: {
                                    my: 'center center',
                                    at: 'center top',
                                    of: window
                                },
                                width: 350,
                                height: 350,
                                //Afficher un bouton Ok
                                buttons: [
                                    {
                                        text: 'ok',
                                        icon: 'ui-icon-circle-close',
                                        //Au clic sur le bouton ok 
                                        click: function () {
                                            //Fermer la boite de dialogue
                                            $(this).dialog('close');
                                            //Et recharger la page
                                            location.reload();
                                        }
                                    }
                                ]
                            });
                            //Afficher la réponse de la méthode dans l'élement qui possede l'id response
                            $('#response').append(response);
                        },
                        'text'
                        );
            });
    //Au clic sur le bouton qui possede d'id passwordModifButton
    $('#passwordModifButton').click(function () {
        //Sur l'éléments possédant l'id passwordModifysupprimer la classe hide
        $('#passwordModify').removeClass('hide');
        //Ouvrir l'éléments possédant l'id passwordModify dans une boite de dialogue
        $('#passwordModify').dialog({
            position: {
                my: 'center center',
                at: 'center top',
                of: window
            },
            //Afficher un bouton 'Valider'
            buttons: [{
                    text: 'Valider',
                    //Au clic sur le bouton
                    click: function () {
                        //Fermer la boite de dialogue
                        $('#passwordModify').dialog('close');
                        //Lancer la méthode AJAX post
                        $.post(
                                'controllers/controllerProfilUser.php',
                                {
                                    password: $('#password').val(),
                                    newPassword: $('#newPassword').val(),
                                    newPasswordConfirm: $('#newPasswordConfirmation').val(),
                                },
                                //Déclaration de la fonction result qui prend en argument la réponse de la méthode AJAX 
                                        function result(response) {
                                            //Ouvrire une boite de dialogue avec l'élément qui possede l'id response
                                            $('#response').dialog({
                                                //A la fermeture
                                                close: function () {
                                                    //Recharger la page
                                                    location.reload();
                                                },
                                                //Afficher un bouton 'Fermer'
                                                buttons: [{
                                                        text: 'Fermer',
                                                        //Au clic sur le bouton
                                                        click: function () {
                                                            //Fermer la boite de dialogue
                                                            $('#response').dialog('close');
                                                        }
                                                    }]
                                            });
                                            //Afficher la réponse de la méthode dans l'élement qui possede l'id response
                                            $('#response').append(response);
                                        },
                                        'text'
                                        );
                            }
                }]
        });
    });
});