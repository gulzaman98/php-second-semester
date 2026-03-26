<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Only Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0">User Management System</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th class="text-center pe-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../connection.php';
                                $query = mysqli_query($con , "SELECT * from register");

                                foreach($query as $value){  
                                ?>

                                <tr>
                                    <td class="ps-4 fw-bold text-secondary"><?php echo $value['id'];?></td>
                                    <td><?php echo $value['Name'];?></td>
                                    <td><?php echo $value['Email'];?></td>
                                    <td><code><?php echo $value['Password'];?></code></td>
                                    <td><?php echo $value['Address'];?></td>
                                    <td>
                                        <span class="badge rounded-pill bg-primary"><?php echo $value['role'];?></span>
                                    </td>
                                    <td class="text-center pe-4">  
                                        <button type="button" class="btn btn-warning btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $value['id'];?>">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value['id'];?>">Delete</button>
                                    </td>

                                    <div class="modal fade" id="editModal<?php echo $value['id'];?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header bg-warning text-dark">
                                                    <h5 class="modal-title fw-bold">Update Record</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $value['id'];?>">

                                                        <div class="mb-3">
                                                            <input type="text" placeholder="Enter your name" class="form-control form-control-lg" name="name" value='<?php echo $value['Name'];?>'>
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="email" placeholder="Enter your email" class="form-control form-control-lg" name="email" value='<?php echo $value['Email'];?>'>
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="text" placeholder="Enter your password" class="form-control form-control-lg" name="pass" value='<?php echo $value['Password'];?>'>
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="text" placeholder="Enter your address" class="form-control form-control-lg" name="address" value='<?php echo $value['Address'];?>'>
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="text" placeholder="Enter your role" class="form-control form-control-lg" name="role" value='<?php echo $value['role'];?>'>
                                                        </div>

                                                        <div class="d-grid shadow-sm">
                                                            <button class="btn btn-dark btn-lg" name='update'>Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete<?php echo $value['id'];?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-body text-center p-5">
                                                    <div class="text-danger mb-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                          <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                                        </svg>
                                                    </div>
                                                    <h4 class="fw-bold">Are you sure?</h4>
                                                    <p class="text-muted">Do you really want to delete this record? This process cannot be undone.</p>
                                                    
                                                    <form action="code.php" method="post" class="mt-4">
                                                        <input type="hidden" name="id" value="<?php echo $value['id'];?>">
                                                        <button type="button" class="btn btn-secondary px-4 me-2" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger px-4" name="delete">Delete Now</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>