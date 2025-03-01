<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quilmes Net</title>
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">    
    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php require_once "vistas/parte_superior.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Alta de Clientes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>DNI</th>
                                            <th>Celular</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>DNI</th>
                                            <th>Celular</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require '../../views/db.php';
                                        $query = "SELECT nombre, apellido, email, dni, celular FROM alta_clientes";
                                        $result = mysqli_query($conex, $query);

                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['apellido']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['dni']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['celular']) . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo '<tr><td colspan="5">Error al cargar los datos</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Quilmes NET >Todos los derechos reservados</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
