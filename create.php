<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nombre = $apellidos= $matricula = $carrera =  "";
$name_err = $address_err = $salary_err = $carrera_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $name_err = "Por favor ingrese el nombre del alumno.";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingrese un nombre válido.";
    } else{
        $nombre = $input_name;
    }
    
    // Validate address
    $input_apellidos = trim($_POST["apellidos"]);
    if(empty($input_apellidos)){
        $address_err = "Por favor ingrese una apellido.";     
    } else{
        $apellidos = $input_apellidos;
    }
    
    // Validate salary
    $input_matricula = trim($_POST["matricula"]);
    if(empty($input_matricula)){
        $salary_err = "Por favor ingrese la matricula";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $matricula = $input_salary;
    }
    $inputcarrera = trim($_POST["carrera"]);
    if(empty($input_carrera)){
        $carrera_err = "Por favor ingrese la carrera";     
    } } elseif(!ctype_digit($input_carrera)){
        $carrera_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $carrera = $input_carrera;
    }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($apellido_err) && empty($matricula_err)  && empty($carrera_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO alumnoo (nombre, apellidos, matricula, carrera) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nombre, $param_apellidos, $param_matricula, $param_carrera );
            
            // Set parameters
            $param_nombre = $nombre;
            $param_apellidos = $apellidos;
            $param_matricula = $matricula;
            $param_carrera = $carrera;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Empleado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Agregar Alumnos</h2>
                    </div>
                    <p>Favor diligenciar el siguiente formulario, para agregar al alumno.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" nombre="nombre" class="form-control" value="<?php echo $nombre; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Apellidos</label>
                            <textarea name="apellidos" class="form-control"><?php echo $apellidos; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Matricula</label>
                            <input type="text" name="matricula" class="form-control" value="<?php echo $matricula; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Carrera</label>
                            <input type="text" name="carrera" class="form-control" value="<?php echo $carrera; ?>">
                            <span class="help-block"><?php echo $carrera_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>