<?php
require_once 'autorequire.php';

$alumno      = new Alumno();
$alumnoModel = new AlumnoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alumno->__SET('id', $_REQUEST['id']) ;
			$alumno->__SET('nombre', $_REQUEST['nombre']) ;
			$alumno->__SET('apellido', $_REQUEST['apellido']) ;
			$alumno->__SET('sexo', $_REQUEST['sexo']) ;
			$alumno->__SET('fechaNacimiento', $_REQUEST['fechaNacimiento']) ;

			$alumnoModel->Actualizar($alumno) ;
			header('Location: index.php') ;
			break ;

		case 'registrar':
			$alumno->__SET('nombre', $_REQUEST['nombre']) ;
			$alumno->__SET('apellido', $_REQUEST['apellido']) ;
			$alumno->__SET('sexo', $_REQUEST['sexo']) ;
			$alumno->__SET('fechaNacimiento', $_REQUEST['fechaNacimiento']) ;

			$alumnoModel->Registrar($alumno) ;
			header('Location: index.php') ;
			break ;

		case 'eliminar':
			$alumnoModel->Eliminar($_REQUEST['id']) ;
			header('Location: index.php') ;
			break ;

		case 'editar':
			$alumno = $alumnoModel->Obtener($_REQUEST['id']) ;
			break ;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="?action=<?php echo $alumno->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $alumno->__GET('id'); ?>" />

                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $alumno->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido</th>
                            <td><input type="text" name="apellido" value="<?php echo $alumno->__GET('apellido'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Sexo</th>
                            <td>
                                <select name="sexo" style="width:100%;">
                                    <option value="1" <?php echo $alumno->__GET('sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="2" <?php echo $alumno->__GET('sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Fecha</th>
                            <td>
                                <input type="text" name="fechaNacimiento" value="<?php echo $alumno->__GET('fechaNacimiento'); ?>" placeholder="1989-10-16" style="width:100%;" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">Sexo</th>
                            <th style="text-align:left;">Nacimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($alumnoModel->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('apellido'); ?></td>
                            <td><?php echo $r->__GET('sexo') == 1 ? 'M' : 'F'; ?></td>
                            <td><?php echo $r->__GET('fechaNacimiento'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>

    </body>
</html>