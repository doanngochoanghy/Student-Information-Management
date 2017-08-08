<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: green;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #4CAF50;
}

.active {
    background-color: #4CAF50;
}
.active:hover{
  opacity: 0.8;
}
</style>
</head>
<body>
<?php 
if (!empty(($this->session->userdata()))) {
          echo "logged in";
         var_dump($this->session->userdata());
} else {
  echo "fail";
}
 ?>
<ul>
  <li><a class="active" href="#">Home</a></li>
  <li><a href=<?php echo base_url()."home/page" ?>>Thông tin sinh viên</a></li>
  <li><a href="#contact">Bài tập</a></li>
  <li><a href="#about">Đố vui</a></li>
  <li style="float: right; color:white ;"><a href="" >Login</a></li>
</ul>

</body>
</html>
