<?php


class data
{
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '123';
    const DB_NAME = 'test_job';

    function connect(){
        $link = mysql_connect(self::DB_HOST, self::DB_USER, self::DB_PASS);
        if ($link){
            mysql_select_db(self::DB_NAME);
        }
        return $link;
    }

    function createBase()
    {
        $link = $this->connect();
        return mysql_query('CREATE DATABASE ' . self::DB_NAME . ';', $link);
    }
    function insertData()
    {
        $link = $this->connect();
        mysql_query('CREATE TABLE accounts
  (
    intAccount INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    varName VARCHAR(50) NOT NULL,
    varAddress VARCHAR(100) NOT NULL
  );',$link);
        mysql_query('CREATE TABLE payments
  (
    intPaymentId INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    intAccountId INT NOT NULL,
    varSum VARCHAR(10) NOT NULL,
    varPaymentText VARCHAR(50) NOT NULL
  );',$link);
        if (file_exists('data/accounts.txt')) {
            $accounts = json_decode(file_get_contents('data/accounts.txt'), true);
            foreach ($accounts as $acc) {
                mysql_query('INSERT INTO accounts SET varName="' . $acc['name'] . '", varAddress="' . $acc['address'] . '";',$link);
            }
        }
        if (file_exists('data/payments.txt')) {
            $payments = json_decode(file_get_contents('data/payments.txt'), true);
            foreach ($payments as $payment) {
                mysql_query('INSERT INTO payments SET intAccountId="' . $payment['account_id'] . '", varSum="' . $payment['sum'] . '", varPaymentText="'.$payment['payment_text'].'";',$link);
            }
        }
        return 'Script complete';
    }
}