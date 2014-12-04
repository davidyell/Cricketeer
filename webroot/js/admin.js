/**
 * Created by David Yell on 11/11/14.
 */
$(function () {

// Add another buttons on the score card
    $('a.add[data-action=add-bowler]').click(function (f) {
        f.preventDefault();

        var div = $(this).siblings('div').last().clone();

        $(div).find('input[type=hidden]').remove();
        $(div).find('select option:selected').removeAttr('selected');

        if ($(div).find('span.glyphicon.glyphicon-trash').length == 0) {
            $(div).find('div.clearfix').before('<span class="glyphicon glyphicon-trash"></span>');
        }

        $(div).find('div.form-group').each(function (i, e) {
            $(e).find('input').removeAttr('value').val(null);

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

// Count up the runs
    $('div.innings').each(function (i, e) {
        var inningNum = $(this).data('inningnum'),
            inningDiv = $(this),
            inputs = $(inningDiv).find('div.runs-input input'),
            currentTotal = 0;

        // Set the default
        $(inputs).each(function (i, e) {
            currentTotal = currentTotal + parseInt($(e).val() || 0);
        });
        $('#running-total-' + inningNum + ' span.total').html(currentTotal);

        // Do the count
        $(inputs).blur(function () {
            var total = 0;

            $(inputs).each(function (i, e) {
                total = total + parseInt($(e).val() || 0);
            });

            $('#running-total-' + inningNum + ' span.total').html(total);
        });
    });

// Scroll to fixed for running total
    for (i = 1; i <= 4; i++) {
        var offset = 0;

        if ($('div.innings.one[data-inningnum=' + i + ']').length > 0) {
            offset = $('div.innings.one[data-inningnum=' + i + '] fieldset.batting div.batsman.eleven').offset().top + 50;
        }

        $('#running-total-' + i).scrollToFixed({
            limit: offset
        });
    }

});