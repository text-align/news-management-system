<?php
include_once("functions/is_login.php");
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}
if(!$login->is_login_1()){
    echo ("<script type='text/javascript'>alert(\"请登录账号！\");history.back()</script>");
    return;
}
?>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<form action="tougao_save.php" method="post" enctype="multipart/form-data">
    <font style="font-size: 20px;font-family: 华文琥珀">标题：</font>
    <input class="search" type="text"  size="50" name="title"><br/><br>
    <font style="font-size: 20px;font-family: 华文琥珀"">内容：</font><br><br>
    <textarea name="content"></textarea>
    <script type="text/javascript">CKEDITOR.replace('content');CKFinder.setupCKEditor(editor, null, { type: 'Files' ,currentFolder: '/archive/'});</script>
    <br/>
    <font style="font-size: 20px;font-family: 华文琥珀"">类别：</font>
    <select name="category_id" size="1">
        <?php
        include_once("functions/database.php");
        $data=new database();
        $conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
        $data->get_connection();
        $result_set = mysqli_query($conn,"select * from category");
        $data->close_connection();
        while($row = mysqli_fetch_array($result_set)){
            ?>
            <option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option>
            <?php
        }
        ?>
    </select><br><br>
    <font style="font-size: 20px;font-family: 华文琥珀"">附件：</font>
    <input type="file" name="news_file" size="50">
    <input  type="hidden" name="MAX_FILE_SIZE" value="10485760000000">
    <br/>
    <input class="lu-btn-3d" type="submit" value="提交">
    <input class="lu-btn-3d" type="reset" value="重置">
</form>
