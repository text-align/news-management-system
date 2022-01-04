<?php
include_once("functions/database.php");
$data=new database();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
$news_id = $_GET["news_id"];
////构造3条SQL语句
$sql_news_update = "update news set clicked=clicked+1 where news_id='$news_id'";
$sql_news_detail = "select * from news where news_id='$news_id'";
$sql_review_query = "select * from review where news_id='$news_id' and state='已审核'";
//执行3条SQL语句
$data->get_connection();
mysqli_query($conn,$sql_news_update);
$result_news = mysqli_query($conn,$sql_news_detail);
$result_review = mysqli_query($conn,$sql_review_query);
//取出结果集中新闻条数
$count_news = mysqli_num_rows($result_news);
//取出结果集中该新闻"已审核"的评论条数
$count_review = mysqli_num_rows($result_review);
if($count_news==0){
	echo "该新闻不存在或已被删除！";
	exit;
}
//根据新闻信息中的user_id查询对应的用户信息
$news = mysqli_fetch_array($result_news);
$user_id = $news["user_id"];
$sql_user = "select * from users where user_id='$user_id'";
$result_user = mysqli_query($conn,$sql_user);
$user = mysqli_fetch_array($result_user);
$category_name = "select name from category where category_id=$news[category_id]";
$result_category = mysqli_query($conn,$category_name);
$category=mysqli_fetch_array($result_category);
if (!$user) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
//根据新闻信息中的category_id查询对应的新闻类别信息
$data->close_connection();
mysqli_free_result($result_user);
mysqli_free_result($result_category);
mysqli_free_result($result_news);
mysqli_free_result($result_review);
//关键字加粗斜体显示
$title = $news['title'];
$content = $news['content'];
if(isset($_GET["keyword"])){
	$keyword = $_GET["keyword"];
	$replacement = "<b><i>".$keyword."</b></i>";
	$title = str_replace($keyword,$replacement,$title);
	$content = str_replace($keyword,$replacement,$content);
}
//显示新闻详细信息
?>

<table>
    <tr><td width="80"></td><td style="font-family: 黑体;font-size: 30px"><?php echo $title;?><br><br></td></tr>

    <tr><td width="80"></td><td><?php echo $content;?><br><br><br><br></td></tr>
    <tr><td width="80">附件：</td><td><a href="download.php?attachment=<?php echo urlencode($news['attachment']);?>"><?php echo $news['attachment'];?></a></td></tr>
    <tr><td width="80">发布者：</td><td><?php echo $user['username'];?></td></tr>
    <tr><td width="80">类别：</td><td><?php echo $category['name'];?></td></tr>
    <tr><td width="80">发布时间：</td><td><?php echo $news['publish_time'];?></td></tr>
</table>
<?php
//显示查看评论超链接
if($count_review>0){
	echo "<a href='index.php?url=review_news_list.php&news_id=".$news['news_id']."'>共有".$count_review."条评论</a><br/>";
}else{
	echo "该新闻暂无评论！<br/>";
}
?>
<br/>
<form action="review_save.php" method="post">
添加评论：<textarea name="content" cols="50" rows="5"></textarea><br/>
<input type="hidden" name="news_id" value="<?php echo $news['news_id'];?>">
<input type="submit" value="评论">
</form>
