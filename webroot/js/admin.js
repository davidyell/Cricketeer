/**
 * Created by David Yell on 11/11/14.
 */
$(function () {

// Global ajax loading
    $(document).ajaxStart(function () {
        $('#loading').show();
    });
    $(document).ajaxStop(function () {
        $('#loading').hide();
    });

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

            var num;

            if ($(e).html().match(/innings-[0-9]+-[a-z]+-([0-9]+)/) != null) {
                num = $(e).html().match(/innings-[0-9]+-[a-z]+-([0-9]+)/)[1];
            } else {
                num = $(e).html().match(/innings-[a-z]+-([0-9]+)/)[1];
            }

            var cnt = parseInt(num) + 1,
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
        var offset = 2607;

        if ($('div.innings.one[data-inningnum=' + i + '] fieldset.batting div.batsman.eleven').length > 0) {
            offset = $('div.innings.one[data-inningnum=' + i + '] fieldset.batting div.batsman.eleven').offset().top + 50;
        }

        $('#running-total-' + i).scrollToFixed({
            limit: offset,
            unfixed: function () {
                $(this).removeAttr('style');
            }
        });
    }

// Add batting
    $('.batting-figures').on('click', 'a.add-batting-figures', function (e) {
        e.preventDefault();

        var div = $(this).parent('div.batting-figures'),
            batting,
            inningNum = $(div).parents('div.innings').data('inningnum'),
            i = $(div).parents('div.batsman').data('batsman');

        $.get('/mustache/batting.mustache', function (template) {
            batting = Mustache.render(template, {
                'inningNum': inningNum,
                'i': i,
                'runs': 0,
                'balls': 0,
                'fours': 0,
                'sixes': 0,
                'batsmanId': null,
                'dynamicBatting': true
            });
            $(div).html(batting);
        });
    });

// Add a wicket
    $('div.wicket').on('click', 'a[href=#add-wicket]', function (e) {
        e.preventDefault();

        var inningNum = $(this).parents('div.innings').data('inningnum'),
            i = parseInt($(this).parents('div.batsman').data('batsman')) - 1,
            wicket,
            lostWicketPlayerId = $('#innings-' + inningNum + '-batsmen-' + i + '-player-id').val(),
            div = $(this);

        $.getJSON('/admin/teams/opposition.json', {
                team: $('#innings-' + inningNum + '-team-id').val()
            },
            function (opposition, status) {
                if (status == 'success') {
                    $.getJSON('/admin/dismissals/get_list.json', function (dismissals, status) {

                        $.get('/mustache/wicket.mustache', function (template) {
                            wicket = Mustache.render(template, {
                                'wicketId': null,
                                'inningNum': inningNum,
                                'i': i,
                                'lostWicketPlayerId': lostWicketPlayerId,
                                'fallOfWicket': null,
                                'bowler': opposition.opposition.squads,
                                'wicketTaker': opposition.opposition.squads,
                                'dismissals': dismissals.dismissals,
                                'dismissalValue': null,
                                'dynamicWicket': true
                            });
                            $(div).parent('div.wicket').html(wicket);
                        });

                    });
                } else {
                    alert(status);
                }
            }
        );
    });

// Deleting batsman and wickets
    $('form .batsman').on('click', 'a.dnb', function (e) {
        e.preventDefault();

        if ($(this).attr('href') == '#dnb') {
            $(this).parent('div.batting-figures').html('<a href="#batting-figures" class="btn btn-primary add-batting-figures">Add batting figures</a>').siblings('div.wicket').empty();
        } else {
            // TODO
            alert('Should ajax off to delete batsman record and related wicket if there is one.');
        }
    });

    $('form .batsman').on('click', 'a.not-out', function (e) {
        e.preventDefault();
        var div = $(this);

        if ($(this).attr('href') == '#not-out') {
            $(this).parent('div.wicket').html('<a href="#add-wicket" class="btn btn-primary">Add wicket</a>');
        } else {
            $.post($(this).attr('href') + '.json', function (data, status) {
                if (status == 'success') {
                    if (data.result == true) {
                        $(div).parent('div.wicket').html('<a href="#add-wicket" class="btn btn-primary">Add wicket</a>');
                    } else {
                        alert('Could not delete wicket');
                    }
                } else if ('message' in data) {
                    alert(data.message);
                }
            });
        }
    });
});