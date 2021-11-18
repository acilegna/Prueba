
$( document ).ready( function ()
{

    filterStudent();
    function filterStudent ( query = '' )
    {
        $.ajax( {
            url: './allStudent',
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
                console.log( registros );
                //console.log( total );

                if ( total >= 1 )
                {

                    for ( var i = 0; i < registros.length; i++ )
                    {

                        resultado += "<tr> <td>" + registros[ i ][ "num_control" ] + "</td> <td>" + registros[ i ][ "nombre_alumno" ]
                            + "</td> <td>" + registros[ i ][ "apePat" ] + "</td> <td>" + registros[ i ][ "apeMat" ] + "</td> <td>" + registros[ i ][ "telefono" ] +
                            "</td>" + "<td><input type = 'hidden' name = 'codigoProducto' value = " + registros[ i ][ "id" ] + "> " +
                            "<a data-toggle='tooltip' data-placement='right' title='Editar Alumno' href='./editStudents/" + registros[ i ][ "id" ] + "'>" +
                            "<span class='glyphicon glyphicon-pencil borde-edit' aria-hidden='true'></span></a>" +
                            "<a data-toggle='tooltip' data-placement='right' title='Eliminar Alumno' href='./delete/" + registros[ i ][ "id" ] + "'>" +
                            "<span class='glyphicon glyphicon-trash borde-delete' aria-hidden='true'></span></a>" +
                            "</td></tr>";
                    }

                    $( '#bodyStudents' ).html( resultado );
                    $( '#total_students' ).html( total );

                } else
                {
                    $( '#mensaje' ).text( 'Registro no encontrado en la Base de Datos' );
                    $( "#mensaje" ).addClass( "alert alert-danger" );
                }

            }
        } )
    }

    $( document ).on( 'keyup', '#searchStudent', function ()
    {
        var query = $( this ).val();
        filterStudent( query );
    } );
} );