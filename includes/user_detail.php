 $author_query="SELECT `name` FROM `users` WHERE `uid`='$id'";
        $run_author_query=mysqli_query($conn, $author_query);
        $author_data=mysqli_fetch_assoc($run_author_query);
        $author_name=$author_data['name'];
        $user_image=$author_data['image'];
        $last_login=$author_data['last_login'];
        $member_since=$author_data['member_since'];
        $user_email=$author_data['email'];