<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
<!-- 使用文件上传必须使用enctype="multipart/form-data" -->
	<form action="upload.php" method='post' enctype="multipart/form-data">
		
		<input type="file" name='uploads' />
		<input type="submit" value='上传'>
	</form>
</body>
</html>