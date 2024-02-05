<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



if(!function_exists('getHashedPassword'))
    {
        function getHashedPassword($plainPassword)
        {
            return password_hash($plainPassword, PASSWORD_DEFAULT);
        }
    }

    /**
     * This function used to generate the hashed password
     * @param {string} $plainPassword : This is plain text password
     * @param {string} $hashedPassword : This is hashed password
     */
    if(!function_exists('verifyHashedPassword'))
    {
        
        function verifyHashedPassword($plainPassword, $hashedPassword)
        {
          // echo "<pre>";print_r($password_verify);die;
             $a= password_verify($plainPassword, $hashedPassword) ? true : false;
             //echo "<pre>";print_r($a);die;
             return $a;
            //  if(password_verify($plainPassword, $hashedPassword)){
            //     echo "<pre>";print_r("pass");die;
            // }else{
            //     echo "<pre>";print_r("fail");die;
            // }
        }
    }




?>