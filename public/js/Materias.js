
$( document ).ready( function ()
{
    filterSubject();

    function filterSubject ( query = '' )
    {
        $.ajax( {
            url: './allMaterias',
            method: 'GET',
            data: {
                query: query
            },
            dataType: 'json',
            success: function ( data )
            {

                var registros = data.table_data;
                var total = data.total_data;
                resultado = "";
                //console.log( registros );
                // console.log( total );

                if ( total >= 1 )
                {

                    for ( var i = 0; i < registros.length; i++ )
                    {
                        resultado += "<tr> <td>" + registros[ i ][ "materia" ] + "</td>"
                            + "<td><input type = 'hidden' name = 'id' value = " + registros[ i ][ "id" ] + "> " +
                            "<a data-toggle='tooltip' data-placement='right' title='Editar Materia' href='./editSubjects/" + registros[ i ][ "id" ] + "'>" +
                            "<span class='glyphicon glyphicon-pencil borde-edit' aria-hidden='true'></span></a>" +
                            "<a data-toggle='tooltip' data-placement='right' title='Eliminar Materia' href='./deleteSubjet/" + registros[ i ][ "id" ] + "'>" +
                            "<span class='glyphicon glyphicon-trash borde-delete' aria-hidden='true'></span></a>" +
                            "</td></tr>";
                    }



                    $( '#tbodyMaterias' ).html( resultado );
                    $( '#total_subjects' ).html( total );

                } else
                {
                    $( '#mensaje' ).text( 'Registro no encontrado en la Base de Datos' );
                    $( "#mensaje" ).addClass( "alert alert-danger" );
                }

            }
        } )
    }

    $( document ).on( 'keyup', '#inputSubjects', function ()
    {
        var query = $( this ).val();
        filterSubject( query );
    } );
} );