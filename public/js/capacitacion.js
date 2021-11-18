
$( document ).ready( function ()
{
    //cargar todos los registro
    filterCourseStudent();

    function filterCourseStudent ( inputsearch = '' )
    {

        //console.log( "contenido caja texto" );
        //console.log( inputsearch );
        $.ajax( {
            url: './allAlumnosCursos',
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
                //  console.log( registros );
                if ( total >= 1 )
                {
                    /*
                    for ( var i = 0; i < registros.length; i++ )
                    {
                        resultado += "<tr> <td>" + registros[ i ][ 'num_control' ] + "</td> <td>" + registros[ i ][ 'nombre_alumno' ]
                            + "</td> <td>" + registros[ i ][ 'apePat' ] + "</td> <td>" + registros[ i ][ 'telefono' ]
                            + "</td> <td>" + registros[ i ][ 'nombre' ] + "</td> <td>" + registros[ i ][ 'materia' ] +
                            "</td>" + "<td><input type = 'hidden' name = 'id' value = " + registros[ i ][ 'id' ] + "> " +
                            "<a data-toggle='tooltip' data-placement='right' title='Editar' href='./editAsingSub/" + registros[ i ][ 'id_capacitacion' ] + "'>" +
                            "<span class='glyphicon glyphicon-pencil borde-edit' aria-hidden='true'></span></a>" +
                            "<a data-toggle='tooltip' data-placement='right' title='Eliminar' href='./deleteAsingSub/" + registros[ i ][ 'id_capacitacion' ] + "'>" +
                            "<span class='glyphicon glyphicon-trash borde-delete' aria-hidden='true'></span></a>" +
                            "</td></tr>";
                    }*/
                    for ( var i = 0; i < registros.length; i++ )
                    {
                        resultado += "<tr> <td>" + registros[ i ][ 'alumno' ][ 'num_control' ] + "</td> <td>" + registros[ i ][ 'alumno' ][ 'nombre_alumno' ]
                            + "</td> <td>" + registros[ i ][ 'alumno' ][ 'apePat' ] + "</td> <td>" + registros[ i ][ 'alumno' ][ 'telefono' ]
                            + "</td> <td>" + registros[ i ][ 'maestro' ][ 'nombre' ] + "</td> <td>" + registros[ i ][ 'materia' ][ 'materia' ] +
                            "</td>" + "<td><input type = 'hidden' name = 'id' value = " + registros[ i ][ 'id' ] + "> " +
                            "<a data-toggle='tooltip' data-placement='right' title='Editar' href='./editAsingSub/" + registros[ i ][ 'id' ] + "'>" +
                            "<span class='glyphicon glyphicon-pencil borde-edit' aria-hidden='true'></span></a>" +
                            "<a data-toggle='tooltip' data-placement='right' title='Eliminar' href='./deleteAsingSub/" + registros[ i ][ 'id' ] + "'>" +
                            "<span class='glyphicon glyphicon-trash borde-delete' aria-hidden='true'></span></a>" +
                            "</td></tr>";
                    }


                    $( '#Historial' ).html( resultado );
                    $( '#total_asignaciones' ).html( total );

                } else
                {
                    $( '#mensaje' ).text( 'Registro no encontrado en la Base de Datos' );
                    $( "#mensaje" ).addClass( "alert alert-danger" );
                }

            }
        } )
    }
    $( document ).on( 'keyup', '#searchAC', function ()
    {
        var inputSearch = $( this ).val();
        filterCourseStudent( inputSearch );
    } );

} );