/**
 * Created by David Yell on 11/11/14.
 */
$(function () {

// Add another buttons on the score card
    $('a.add[data-action=add-bowler]').click(function (f) {
        f.preventDefault();
        var bowlerDiv = $('fieldset.bowling div.bowler').last().clone();

        $(bowlerDiv).find('input:hidden').remove();
        $(bowlerDiv).find('select option:selected').removeAttr('selected');

        $(bowlerDiv).find('div.form-group.number').append('<input class="form-control" type="number" name="innings[1][bowlers][12][overs]" id="innings-1-bowlers-12-overs" value="15">');

        $(this).before(bowlerDiv);
    });

});