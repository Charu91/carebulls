<html>
<head>
	 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> 
	
</head>
<body link = "white">
	
<div class="container">
            @yield('content')
        </div>
</body>

</html>


<style>
#nav {
	margin-top:200%;
    line-height:30px;
    float:center;
    padding:5px; 
}
#login_form
{
	float:center;
	border-radius: 25px;
    border: 1px solid #A9A9A9;
    padding: 20px; 
    width: 350px;
    height: 300px;
}

#login_content {
	margin-top:20%;
    line-height:30px;
     width: 350px;
    height: 300px;
    float:center;
    padding:0.5%; 
}
#email
{
	border: 1px solid #A9A9A9;
	border-radius: 5px;
	height: 30px;
	width: 100%;
	padding:3%
}
#password 
{
	border: 1px solid #A9A9A9;
	border-radius: 5px;
	height: 30px;
	
	width: 100%;
	padding:3%
}
#error_message
{
	font-size:5px;
	font-color:red;
}

</style>