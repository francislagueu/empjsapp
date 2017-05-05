<?php //sesssion_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Francis Lagueu Fogang">
        <title>Employee Add App</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <main>
            <div>
                <fieldset>
                    <legend>
                        Add an Employee
                    </legend>
                    <form action="" method="POST">
                    <label for="first_name">First Name</label><br>
                    <input type="text" name="first_name" id="first_name" cols="15" required><br>
                    <label for="last_name">Last Name</label><br>
                    <input type="text" name="last_name" id="last_name" cols="15" required><br>
                    <label for="department">Department</label><br>
                    <select name="department" id="department" cols="15" required >
                        <option value=""></option>
                        <option value="Engineering" >Engineering</option>
                        <option value="Accounting" >Accounting</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Sales">Sales</option>
                    </select><br>
                    <button type="submit" value="submit">
                        Submit &rarr;
                    </button>
                   </form>
                </fieldset>
            </div>
<?php
session_start();

   
if($_SERVER['REQUEST_METHOD']=="POST"){
    
$employee=array();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$department = $_POST['department'];
$employeeID = mt_rand(10000000, 99999999);
$int= mt_rand(10000000,1262055681);
$hiredDate = date("D M d, Y",$int);
$employee['first_name']=$first_name;
$employee['last_name']=$last_name;
$employee['department']=$department;
$employee['employeeID']=$employeeID;
$employee['hiredDate']=$hiredDate;
$emp = json_encode($employee);

 if(array_key_exists($employee['employeeID'],$_SESSION['employees'])){
     echo "<script type=\"text/javascript\">window.alert('An employee with the same ID already exist.');
        window.location.href = '/index.html';</script>"; 
      exit;
 }
  
$_SESSION['employees'][] = json_decode($emp, true);
    
    echo '<div>';
    echo '<h1>Employee Added</h1>';
    echo '<label>Name:</label>';
    echo '<span>'.$employee['first_name'].', '.$employee['last_name'].'</span>';
    echo '<br>';
    echo '<label>Department:</label>';
    echo '<span>'.$employee['department'].'</span>';
    echo '<br>';
    echo '<label>Employee ID:</label>';
    echo '<span>'.$employee['employeeID'].'</span>';
    echo '<br>';
    echo '<label>Hire Date:</label>';
    echo '<span>'.$employee['hiredDate'].'</span>';
    echo '<br>';
    echo '<label>Total Employees:</label>';
    echo '<span>'.count($_SESSION['employees']).'</span>';
    echo '</div>';
}
//session_destroy();
//$_SESSION['employees'] = [];
?>
        </main>
        <footer>Copyright Francis Lagueu &copy; <?php echo date('Y')?></footer>
    </body>
</html>