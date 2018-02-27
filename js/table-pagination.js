$(document).ready(function () {
    var table = '#recording';
    var totalRows = $(table + ' tbody tr').length;
    var rows = $(table + ' tr:gt(0)');
    var trnum = 0;

    if (totalRows > 5) {
        showPagination(totalRows);
        showTable(table);
        rows.each(function () {
            trnum++;
            if (trnum > 5) {
                $(this).hide();
            }
            if (trnum <= 5) {
                $(this).show();
            }
        });
    }

    function showPagination(value) {
        var pagenum = Math.ceil(value / 5);
        var pag = $('.pagination');

        for (var i = 1; i <= pagenum; i++) {
            if (i === 1) {
                pag.append('<li class="page-item active" data-page="' + i + '"><span class="page-link">' + i + '</span></li>').show();
            }
            else {
                pag.append('<li class="page-item" data-page="' + i + '"><span class="page-link">' + i + '</span></li>').show();
            }
        }


        $('.pagination .page-item span').on('click', function () {
            pag.find('li.active').removeClass('active');
            $(this).parent('li').addClass('active');
        });
    };

    function showTable(value) {
        $('.pagination li').on('click', function () {
            var pagenum = $(this).attr('data-page');
            var trIndex = 0;
            $(table + ' tr:gt(0)').each(function () {
                trIndex++;
                if (trIndex > (5 * pagenum) || trIndex <= ((5 * pagenum) - 5)) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    };
});