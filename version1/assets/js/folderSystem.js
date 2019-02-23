$(function () {
    $('#sortable').sortable({containment: '#containment-wrapper', scroll: false, opacity: 0.7, helper: "clone", revert: true});
    $('#sortable').disableSelection();
    $('#containment-wrapper').selectable();
    $('.dossier').selectable();
    $('.chapterFolder').hover(function () {
        location.reload();
    });
    $('#draggable').draggable({
        connectToSortable: '#sortable',
        helper: 'clone',
        revert: 'invalid'
    });
    $('#draggable').click(function () {

    });
    //Afficher le dossier du manga
    $('#bouttonf').click(function () {
        if ($('#containment-wrapper').hasClass('hide')) {
//            $('#containment-wrapper').dialog({
//                close: function () {
//                    location.reload();
//                },
//                position: {
//                    my: 'center top',
//                    at: 'center top',
//                    of: window
//                },
//                width: 870,
//                height: 500
//            });
            $.post(
                    'controllers/foldersAjax.php',
                    'false',
                    result,
                    'text');
            function result(response) {
                $(function () {
                    $('.dossier').remove('.dossier');
                    $('.back').remove('.back');
                    $('#sortable').append(response);
                });
            }
            $('#containment-wrapper').removeClass('hide');
        }
    });
    //Aller dans le dossier selectionné
    $('#sortable').sortable({
        start: function () {
            $(':not(.deletefolder)').click(function (e) {
                $('.dossier').click(function () {
                    if ($('.dossier').remove('.dossier')) {
                        $.post(
                                'controllers/foldersAjax.php',
                                {
                                    idChapter: $(this).attr('id')
                                },
                                result,
                                'text',
                                );
                        function result(response) {
                            $(function () {
                                $('.dossier').remove('.dossier');
                                $('.back').remove('.back');
                                $('#inputFilesChapters').removeClass('hide');
                                $('#sortable').append(response);
                            });
                        }
                    }
                });
                e.stopPropagation();
            });
            //Retour en arriere
            $('#back').click(function () {
                if ($('.chapterFolder').remove('.chapterFolder')) {
                    $.post(
                            'controllers/foldersAjax.php',
                            'false',
                            result,
                            'text');
                    function result(response) {
                        $(function () {
                            $('.dossier').remove('.dossier');
                            $('.back').remove('.back');
                            $('#inputFilesChapters').addClass('hide');
                            $('#sortable').append(response);
                        });
                    }
                }
            });
            //Suppréssion d'une page ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            $('.deleteIcon').click(function () {
                //Inclure l'id dans une variable idFile
                var idFile = $(this).attr('del');
                console.log($(idFile).attr('src'));
                $('#addChapterResult').empty();
                $('#addChapterResult').append('Êtes vous sur de vouloir supprimer cette page ?');
                //Ouvrir une boite de dialogue
                $('#addChapterResult').dialog({
                    position: {
                        my: 'center center',
                        at: 'center top',
                        of: window
                    },
                    buttons: [
                        {
                            text: 'Oui',
                            //Au clic sur le bouton lancer la fonction Ajax
                            click: function () {
                                $.post(
                                        'controllers/foldersAjax.php',
                                        {
                                            srcDeleteFile: $(idFile).attr('src')
                                        },
                                        function result(response) {
                                            $('#addChapterResult').empty();
                                            $('#addChapterResult').dialog('destroy');
                                            $('#addChapterResult').append('Le fichier a été supprimé');
                                            $('#addChapterResult').dialog({
                                                position: {
                                                    my: 'center center',
                                                    at: 'center top',
                                                    of: window
                                                },
                                                buttons: [
                                                    {
                                                        text: 'Ok',
                                                        click: function () {
                                                            $('#addChapterResult').empty();
                                                            $('#addChapterResult').dialog('destroy');
                                                            $(idFile).remove(idFile);
                                                            //Si ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                        }
                                                    }]
                                            });
                                        },
                                        'text'
                                        );

                            }
                        },
                        {
                            text: 'Non',
                            click: function () {
                                $('#addChapterResult').empty();
                                $('#addChapterResult').dialog('close');
                                $('#addChapterResult').dialog('destroy');
                            }
                        }]
                });
            });

            $('.deleteFolder').click(function () {
                var folderId = $(this).attr('id');
                $('#addChapterResult').empty();
                $('#addChapterResult').append('Êtes vous sur de vouloir supprimer ce dossier ?');
                $('#addChapterResult').dialog({
                    position: {
                        my: 'center center',
                        at: 'center top',
                        of: window
                    },
                    buttons: [
                        {
                            text: 'Oui',
                            //Au clic sur le bouton lancer la fonction Ajax
                            click: function () {
                                $.post(
                                        'controllers/foldersAjax.php',
                                        {
                                            srcDeleteFolder: folderId
                                        },
                                        function result(response) {
                                            $('#addChapterResult').empty();
                                            $('#addChapterResult').dialog('destroy');
                                            $('#addChapterResult').append('Le dossier a été supprimé');
                                            $('#addChapterResult').dialog({
                                                position: {
                                                    my: 'center center',
                                                    at: 'center top',
                                                    of: window
                                                },
                                                buttons: [
                                                    {
                                                        text: 'Ok',
                                                        click: function () {
                                                            $('#addChapterResult').empty();
                                                            $('#addChapterResult').dialog('destroy');
                                                            $(folderId).remove(folderId);
                                                            //Si ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                        }
                                                    }]
                                            });
                                        },
                                        'text'
                                        );

                            }
                        },
                        {
                            text: 'Non',
                            click: function () {
                                $('#addChapterResult').empty();
                                $('#addChapterResult').dialog('close');
                                $('#addChapterResult').dialog('destroy');
                            }
                        }]
                });
            });
            //Mise a jour du nom du fichier -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//            $('#updateIcon').click(function () {
//                $.post(
//                        'controllers/foldersAjax.php',
//                        {
//                            idElementUpdate: $(this).attr('id')
//                        },
//                        result,
//                        'text',
//                        );
//            });
        }
    });
    //Ajout d'un nouveau dossier chapitre
    $('#newChapterSubmit').click(function () {
        $.post(
                'controllers/foldersAjax.php',
                {
                    newChapterName: $('#chapterName').val()
                },
                result,
                'text',
                );
        function result(response) {
            $('#addChapterResult').empty();
            $('#addChapterResult').dialog({
                close: function () {
                    location.reload();
                },
                position: {
                    my: 'center center',
                    at: 'center top',
                    of: window
                }
            });
            $('#addChapterResult').append(response);
        }

        if ($('.dossier').remove('.dossier')) {
            $.post(
                    'controllers/foldersAjax.php',
                    'false',
                    result,
                    'text');
            function result(response) {
                $(function () {
                    $('.dossier').remove('.dossier');
                    $('.back').remove('.back');
                    $('#sortable').append(response);
                });
            }
        }
    });
});