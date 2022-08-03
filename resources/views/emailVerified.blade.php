<?php
 
$user  = \App\Models\User::latest()->first();
            $token = \DB::table('personal_access_tokens')->select("*")->where('tokenable_id', $user->id)->first();

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Account Created Successfully</h1>
Your MarriageBornUSA account created successfully. Please <a href="{{route('user.login')}}">Log In</a> using the link and start getting matches!


</body>
</html>