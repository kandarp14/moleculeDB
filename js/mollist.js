/**
 * Created by Kandarp on 4/24/2017.
 */
/*for saved data retrive*/
var data = null;
$(document).ready(function () {

    /* apply datatable to table */
    var table = $('#listmol').DataTable({
        stateSave: true,
    });

    /*add text input to each footer cell*/
    $('#listmol tfoot th').each(function () {
        var title = $(this).text();
        if (title != '') {
            $(this).html('<input type="text" size="1" />');
        }
    });

    /* append footer to header*/
    $('#listmol tfoot tr').appendTo('#listmol thead');

    /* Apply the search (to text field)*/
    table.columns([0, 1, 2, 3, 4]).every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });
    /*to drop downs*/
    table.columns([4, 5, 6]).every(function () {
        var column = this;
        var select = $('<select><option value=""></option></select>')
            .appendTo($(column.footer()).empty())
            .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );
                column
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            });
        column.data().unique().sort().each(function (value, j) {
            select.append('<option value="' + value + '">' + value + '</option>')
        });

    });

    // /*special case dropdown*/
    // table.columns([4]).every(function () {
    //     var column = this;
    //     $(column.footer()).empty();
    //     var lj = 5;
    //     var c = 0;
    //     var d = 0;
    //     var q = 0;
    //
    //     var ljD = $('<select><option value=""></option></select> <span>LJ </span> ')
    //         .appendTo($(column.footer()))
    //         .append('<option value="' + lj + '">' + lj + '</option>')
    //         .on('change', function () {
    //             alert('working');
    //             var val = $.fn.dataTable.util.escapeRegex(
    //                 $(this).val()
    //             );
    //             alert(val);
    //             column
    //             if (that.search() !== this.value) {
    //                 that
    //                     .search(this.value)
    //                     .draw();
    //             }
    //         });
    //
    //
    //     var cD = $('<select><option value=""></option></select> <span>C </span>')
    //         .appendTo($(column.footer()));
    //     var dD = $('<select><option value=""></option></select> <span>D </span>')
    //         .appendTo($(column.footer()));
    //     var qD = $('<select><option value=""></option></select> <span>Q </span>')
    //         .appendTo($(column.footer()));
    // });

    /*Restore state in column filters*/
    var state = table.state.loaded();
    if (state) {
        table.columns().eq(0).each(function (colIdx) {
            var colSearch = state.columns[colIdx].search;
            if (colSearch.search) {
                //retrive input
                $('input', table.column(colIdx).footer()).val(colSearch.search);
                //retrive select
                $('select option', table.column(colIdx).footer())
                    .each(function () {
                        var str = colSearch.search;
                        str = str.replace("^", "");
                        str = str.replace("$", "");
                        str = str.replace(/\\/g, '');
                        this.selected = (this.text == str);
                    });

            }
        });

        table.draw();
    }


    /* initially once store */
    data = table.rows({filter: 'applied'}).data();

    /*getting filtered data for save state*/
    table.on('search.dt', function () {
        //filtered rows data as arrays
        data = table.rows({filter: 'applied'}).data();
    });

    /* reload button - state refresh*/
    $("#reload").click(function () {
        /*getting filtered data for default state*/
        data = table.rows().data();
        table.state.clear();
        window.location.reload();
    });


});




