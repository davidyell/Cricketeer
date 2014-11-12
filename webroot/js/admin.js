/**
 * Created by David Yell on 11/11/14.
 */
$(function () {

// Add another buttons on the score card
    $('a.add[data-action=add-bowler]').click(function (f) {
        f.preventDefault();
        var bowlerDiv = $('fieldset.bowling div.bowler').last().clone();

        $(bowlerDiv).find('input[type=hidden]').remove();
        $(bowlerDiv).find('select option:selected').removeAttr('selected');

        if ($(bowlerDiv).find('span.glyphicon.glyphicon-trash').length == 0) {
            $(bowlerDiv).find('div.clearfix').before('<span class="glyphicon glyphicon-trash"></span>');
        }

        $(bowlerDiv).find('div.form-group').each(function (i, e) {
            $(e).find('input[type=number]').removeAttr('value');

            var num = $(e).html().match(/innings-[0-9]+-bowlers-([0-9]+)/)[1],
                cnt = parseInt(num) + 1,
                regex = new RegExp(num, 'gi'),
                newName = $(e).children('input, select').attr('name').replace(regex, cnt),
                newId = $(e).children('input, select').attr('id').replace(regex, cnt);

            $(e).children('input, select').attr('name', newName);
            $(e).children('input, select').attr('id', newId);
        });

        $(this).before(bowlerDiv);
    });

// Remove added bowlers
    $('fieldset.bowling').on('click', 'span.glyphicon.glyphicon-trash', function (e) {
        e.preventDefault();
        $(this).parents('.bowler').remove();
    });

});