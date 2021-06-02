<?php

	class Database {

		private $dbHost = DB_HOST;
		private $dbName = DB_NAME;
		private $dbUser = DB_USER;
		private $dbPass = DB_PASS;

		private $dbHandler;
		private $statemet;
		private $error;

		public function __construct()
		{
			$conn = 'mysql:host='.$this->dbHost.';dbname='.$this->dbName;
			$options = array(
				PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			try {
				$this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
			}
			catch (PDOException $e)
			{
				$this->$error = $e->getMessage();
				echo $this->$error;
			}
		}

		public function query($sql)
		{
			$this->$statemet = $this->dbHandler->prepare($sql);
		}

		//Bind values
        public function bind($parameter, $value, $type = null) {
            switch (is_null($type)) 
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->$statement->bindValue($parameter, $value, $type);
        }


		public function execute()
		{
			return $this->$statement->execute();
		}

		public function resulSet()
		{
			$this->execute();
			return $this->$statement->fetchAll(PDO::FETCH_OBJ);
		}

		public function single()
		{
			$this->execute();
			return $this->$statement->fetch(PDO::FETCH_OBJ);
		}

		public function rowCount()
		{
			return $this->$statement->rowCount();
		}
	}