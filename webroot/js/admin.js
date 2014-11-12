/**
 * Created by David Yell on 11/11/14.
 */
$(function () {

// Add another buttons on the score card
    $('a.add[data-action=add-bowler], a.add[data-action=add-wicket]').click(function (f) {
        f.preventDefault();
        if ($(this).data('action') == 'add-bowler') {
            var div = $('fieldset.bowling div.bowler').last().clone();
        } else {
            var div = $('fieldset.wickets div.wicket').last().clone();
        }

        $(div).find('input[type=hidden]').remove();
        $(div).find('select option:selected').removeAttr('selected');

        if ($(div).find('span.glyphicon.glyphicon-trash').length == 0) {
            $(div).find('div.clearfix').before('<span class="glyphicon glyphicon-trash"></span>');
        }

        $(div).find('div.form-group').each(function (i, e) {
            $(e).find('input').removeAttr('value');

            var num = $(e).html().match(/innings-[0-9]+-[a-z]+-([0-9]+)/)[1],
                cnt = parseInt(num) + 1,
                regex = new RegExp(num, 'gi'),
                newName = $(e).children('input, select').attr('name').replace(regex, cnt),
                newId = $(e).children('input, select').attr('id').replace(regex, cnt);

            $(e).children('input, select').attr('name', newName);
            $(e).children('input, select').attr('id', newId);
        });

        $(this).before(div);
    });

// Remove added bowlers
    $('fieldset.bowling, fieldset.wickets').on('click', 'span.glyphicon.glyphicon-trash', function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
    });

});