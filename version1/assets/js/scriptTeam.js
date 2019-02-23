$(function () {
    $('#membersResearchSubmit').click(function () {
        $('#table').empty();
        $.post(
                'controllers/controllerTeam.php',
                {
                    membersResearch: $('#membersResearch').val()
                },
                result,
                'text'
                );
        function result(response) {
            $('#membersResearchResult').dialog();
            $('#table').append(response);
        }
    });
    $('#teamMangas').click(function () {
        if ($('#mangasTeam').hasClass('hide')) {
            $('#homeTeam').addClass('hide');
            $('#membersTeam').addClass('hide');
            $('#mangasTeam').removeClass('hide');
        }
    });
    $('#teamHome').click(function () {
        if ($('#homeTeam').hasClass('hide')) {
            $('#membersTeam').addClass('hide');
            $('#mangasTeam').addClass('hide');
            $('#homeTeam').removeClass('hide');
        }
    });
    $('#teamMembers').click(function () {
        if ($('#membersTeam').hasClass('hide')) {
            $('#homeTeam').addClass('hide');
            $('#mangasTeam').addClass('hide');
            $('#membersTeam').removeClass('hide');
        }
    });
});