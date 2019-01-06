<?php
/**
 * User: tom_d
 * Date: 4/1/19
 * Time: 11:37 PM
 */

namespace App\Core;

use PDO;

class Database
{
    private $pdo, $env;

    public function __construct($envFile)
    {
        $this->setEnv($envFile);

        try {
            $this->pdo = new PDO(
                $this->env['DBTYPE']
                . ':host=' . $this->env['HOST']
                . ';port=' . $this->env['PORT']
                . ';dbname=' . $this->env['DBNAME']
                , $this->env['USERNAME']
                , $this->env['PASSWORD']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param $envFile
     */
    private function setEnv($envFile)
    {
        $env = [];
        $file = file($envFile);
        foreach ($file as $line) {
            $keyValue = explode("=", $line);
            $env[trim($keyValue[0])] = trim($keyValue[1]);
        }

        $this->env = $env;
    }

    public function selectAll($table)
    {

        $statement = $this->pdo->prepare("SELECT * FROM $table;");

        try {
            $statement->execute();
        }
        catch(Exception $e) {
            return  $e->getMessage();
        }
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($table, $parameters)
    {
        $query = sprintf("INSERT INTO %s (%s) VALUES (%s);",
            $table,
            implode(array_keys($parameters), ', '),
            implode(array_map(function ($key) { return ":$key"; }, array_keys($parameters)), ', ')
        );

        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($parameters);
        } catch (PDOException $e) {
            die('Whoops, monkeys are throwing poop!');
        }
    }

}