<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/Student.php');
    $stu = new Student();
?>
<?php
    if (isset($_GET['dis'])) {
        $disable = (int)$_GET['dis'];
        $disableUser = $stu->disableUser($disable);
    }

    if (isset($_GET['ena'])) {
        $enable = (int)$_GET['ena'];
        $enableUser = $stu->enableUser($enable);
    }

    if (isset($_GET['rem'])) {
        $remove = (int)$_GET['rem'];
        $removeUser = $stu->removeUser($remove);
    }
?>

<?php include_once 'inc/header.php'; ?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Display Student Information</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <table class="table table-bordered">
                                        <tr>
                                            <th>First Name</th>
                                       
                                            <th>Last Name</th>
                                        
                                            <th>User Name</th>
                                       
                                            <th>Email</th>
                                        
                                            <th>Contact</th>
                                       
                                            <th>Semester</th>
                                        
                                            <th>Enrollment</th>
                                        
                                            <th>Status</th>
                                      
                                            <th>Action</th>
                                        </tr>
                                    <?php
                                        $getInfo = $stu->getAllStudent();
                                        if ($getInfo) {
                                            $i = 0;
                                            while($result = $getInfo->fetch_assoc()){
                                                $i++;
                                            
                                    ?>
                                        <tr>
                                            <td><?php echo $result['firstname']; ?></td>
                                   
                                            <td><?php echo $result['lastname']; ?></td>
                                      
                                            <td><?php echo $result['username']; ?></td>
                                        
                                            <td><?php echo $result['email']; ?></td>
                                        
                                            <td><?php echo $result['contact']; ?></td>
                                      
                                            <td><?php echo $result['sem']; ?></td>
                                        
                                            <td><?php echo $result['enrollmentno']; ?></td>
                                       
                                            <td><?php echo $result['status']; ?></td>

                                            <td>
                                            <?php
                                                if ($result['status'] == 'no') {
                                                    ?>
                                                <a onclick="return confirm('Are You Sure To Enable?')" href="?ena=<?php echo $result['id']; ?>">Enable</a>
                                                <?php
                                                    } else {
                                                ?>
                                                <a onclick="return confirm('Are You Sure To Disable?')" href="?dis=<?php echo $result['id']; ?>">Disable</a>
                                                <?php
                                                    }
                                                ?>
                                                 ||
                                                <a onclick="return confirm('Are You Sure To Remove?')" href="?rem=<?php echo $result['userId']; ?>">Remove</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php include_once 'inc/footer.php'; ?>