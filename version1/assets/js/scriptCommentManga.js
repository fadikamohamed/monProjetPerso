$(function () {
    $('#buttonComment').click(function () {
        $.post(
                'controllers/controllerManageManga.php',
                {
                    sendedComment: $('#commentText').val()
                },
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
                },
                'text'
                );
    })
});