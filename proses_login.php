        <?php
session_start();
extract($_POST);
$con=mysqli_connect('localhost','root','','smsku');

if(isset($login)){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if(mysqli_num_rows(mysqli_query($con,"select id_admin from admin where nama_pengguna='$user' and kata_sandi='$pass'")))
    {
        $tipe=mysqli_fetch_row(mysqli_query($con,"select id_admin from admin where nama_pengguna='$user' and kata_sandi='$pass'"));
        $_SESSION['status']='login';
        $_SESSION['session_id']=$tipe[0];
        header("location:./");
    }
    else
    {
        header("location:login.php?salah=1");
    }
}
?>