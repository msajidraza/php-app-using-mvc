<?php

class User {
	
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	// For registration
	public function register($data) 
	{
        $this->db->query('INSERT INTO users (name, email, password, phone, address, city, state, country, zip, time_zone, profile_pic, created_at) VALUES(:name, :email, :password, :phone, :address, :city, :state, :country, :zip, :time_zone, :profile_pic, :created_at)');

        $created_at = date("Y-m-d H:i:s");
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':zip', $data['zip']);
        $this->db->bind(':time_zone', $data['time_zone']);
        $this->db->bind(':profile_pic', $data['profile_pic']);
        $this->db->bind(':created_at', $created_at);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // For login
    public function login($username, $password) 
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    // Check if email exist
	public function findUserByEmail($email)
	{
		$this->db->query('SELECT * FROM users WHERE email = :email');
		$this->db->bind(':email', $email);

		if($this->db->rowCount() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}