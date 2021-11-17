
$( document ).ready( function ()
{
    //cargar todos los registro
    filterTeacher();

    function filterTeacher ( inputsearch = '' )
    {

        //console.log( "mostrar contenido" );
        //console.log( inputsearch );
        $.ajax( {
            url: './filterAll',
            method: 'GET',
            data: {
                query: inputsearch
            },
            dataType: 'json',
            success: function ( data )
            {

                var registros = data.table_data;
                var total = data.total_data;
                resultado = "";
                // console.log( registros );



                if ( total >= 1 )
                {


                    for ( var i = 0; i < registros.length; i++ )
                    {
                        resultado += "<tr> <td>" + registros[ i ][ 'nombre' ] + "</td> <td>" + registros[ i ][ 'apePat' ]
                            + "</td> <td>" + registros[ i ][ 'apeMat' ] + "</td> <td>" + registros[ i ][ 'telefono' ] +
                            "</td>" + "<td><input type = 'hidden' name = 'id' value = " + registros[ i ][ 'id' ] + "> " +
                            "<a data-toggle='tooltip' data-placement='right' title='Editar' href='./editTeacher/" + registros[ i ][ 'id' ] + "'>" +
                            "<span class='glyphicon glyphicon-pencil borde-edit' aria-hidden='true'></span></a>" +
                            "<a data-toggle='tooltip' data-placement='right' title='Eliminar' href='./deleteTeacher/" + registros[ i ][ 'id' ] + "'>" +
                            "<span class='glyphicon glyphicon-trash borde-delete' aria-hidden='true'></span></a>" +
                            "</td></tr>";
                    }



                    $( '#bodyTeacher' ).html( resultado );
                    $( '#total_teacher' ).html( total );

                } else
                {
                    $( '#mensaje' ).text( 'Registro no encontrado en la Base de Datos' );
                    $( "#mensaje" ).addClass( "alert alert-danger" );
                }

            }
        } )
    }
    $( document ).on( 'keyup', '#searchTeacher', function ()
    {
        var inputSearch = $( this ).val();
        filterTeacher( inputSearch );
    } );

} );