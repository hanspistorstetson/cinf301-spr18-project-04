<?php

namespace TwitterView\Utils;

use TwitterView\Models\User as User;

class UserDecoder {



    public static function decodeUsers($json) {
        $users = array();
        $user_ind = 0;
        foreach ($json as $user) {
            $users[$user_ind] = array(
                'id' => $user['id_str'],
                'handle' => $user['screen_name'],
                'displayName' => $user['name'],
                'followers' => $user["followers_count"],
                'friends' => $user["friends_count"],
                'tweets' => $user["statuses_count"],
                'profileImg' => $user["profile_image_url"]
            );
            $user_ind += 1;
        }
        $userObjs = [];
        foreach ($users as $user) {
            $userObj = new User($user);
            $_SESSION['id' . $userObj->id] = serialize($userObj);
            array_push($userObjs,  $userObj);
        }
        return $userObjs;
    }

}

