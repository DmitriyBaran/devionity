<?php

class LoginForm
{
    private $username;
    private $password;

    /**
     * @param array $data
     */
    public function __construct(Array $data)
    {
        $this->username = isset($data['username']) ? $data['username'] : null ;
        $this->password = isset($data['password']) ? $data['password'] : null ;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        return !empty($this->username) && !empty($this->password);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}
