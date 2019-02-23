$(function () {
//Lors du clic sur le bouton
    $('#deleteManga').click(function () {
//Si l'id deleteMangaDialog a la class hide
        if ($('#deleteMangaDialog').hasClass('hide')) {
//Supprimer la class hide
            $('#deleteMangaDialog').removeClass('hide');
            //Ouvrir la div dans une boite de dialogue
            $('#deleteMangaDialog').dialog({
                position: {
                    my: 'center center',
                    at: 'center top',
                    of: window
                },
                width: 500,
                //Intégrer un bouton "supprimer"
                buttons: [
                    {
                        text: 'Supprimer',
                        //Au clic sur le bouton lancer une fonction Ajax de suppression du manga
                        click: function () {
                            $.post(
                                    'controllers/controllerManageManga.php',
                                    {
                                        deleteMangaPassword: $('#passwordForDeleteManga').val()
                                    },
                                    function result(response) {
                                        $('#deleteMangaDialog').dialog('close');
                                        $('#sortable').dialog({
                                            close: function () {
                                                window.location.href = 'profil-utilisateur.html';
                                            }
                                        });
                                        $('#sortable').append(response);
                                    },
                                    'text'
                                    );
                        }
                    }
                ]
            });
        }
    });
//    Au clic sur l'un des éléments contenant la classe chapter
    $('.chapter').click(function () {
//        Ouvrir une un nouvel onglet a l'adresse read.php en passant l'id de l'élément dans l'URL a travers une variable $_GET
        window.open('read.php?chapterId=' + $(this).attr('id'));
    });
//    Au clic sur un un élément contenant la classe mangaLiked 
    $('.mangaLiked').click(function () {
//        Si l'élément contient la classe noLiked
        if ($('.mangaLiked').hasClass('noLiked')) {
            $.post(
                    'controllers/controllerFicheSerie.php',
                    {
                        addMangaLiked: $(this).attr('id')
                    },
                    function result(response) {
                        if (response) {
                            $('.mangaLiked').addClass('liked');
                            $('.mangaLiked').removeClass('noLiked');
                            location.reload();
                            $('#content').append(response);
                        }
                    },
                    'text'
                    );
        } else {
            $.post(
                    'controllers/controllerFicheSerie.php',
                    {
                        removeMangaLiked: $(this).attr('id')
                    },
                    function result(response) {
                        if (response) {
                            $('.mangaLiked').addClass('noLiked');
                            $('.mangaLiked').removeClass('liked');
                            location.reload();
                            $('#content').append(response);
                        }
                    },
                    'text'
                    );

        }
    });
}
);