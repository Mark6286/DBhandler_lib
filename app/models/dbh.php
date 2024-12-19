<?php

namespace app\models;

require '/locker.php';

use InvalidArgumentException;
use \PDO;
use app\models\locker as lk;


class dbh
{
    private $databases;

    public function __construct()
    {
        $this->databases = [
            [
                'host' => 'localhost',
                'username' => 'rmsbalao_admin',
                'password' => 'Balaod3.3r',
                'name' => 'rmsbalao_main'
            ],
            // Add more databases as needed
        ];
    }

  public function connect($databaseIndex)
  {
      if (!isset($this->databases[$databaseIndex])) {
          throw new InvalidArgumentException("Database configuration not found for index $databaseIndex");
      }

      $config = $this->databases[$databaseIndex];
      $dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['name'];
      $pdo = new PDO($dsn, $config['username'], $config['password']);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
  }

