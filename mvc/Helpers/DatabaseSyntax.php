<?php
/**
 * Created by PhpStorm.
 * User: linhngoc
 * Date: 12/02/2019
 * Time: 17:02
 */
namespace Helpers;

use Helpers\Auth;
class DatabaseSyntax extends Auth
{
    /** @var DatabaseSyntax */
    private static $_Database = null;

    /** @var \mysqli */
    private $_query = null;

    /** @var boolean */
    private $_error = false;

    /** @var array */
    private $_results = [];

    /** @var integer */
    private $_count = 0;

    /**
     * Construct:
     * @access private
     * @since 1.0.1
     */

    /**
     * Construct:
     * @access private
     * @since 1.0.1
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Action:
     * @access public
     * @param string $action
     * @param string $table
     * @param array $where [optional]
     * @return DatabaseSyntax|boolean
     * @since 1.0.1
     */
    public function action($action, $table, array $where = []) {
        if (count($where) === 3) {
            $operator = $where[1];
            $operators = ["=", ">", "<", ">=", "<="];
            if (in_array($operator, $operators)) {
                $field = $where[0];
                $value = $where[2];
                $params = [":value" => $value];
                if (!$this->query("{$action} FROM `{$table}` WHERE `{$field}` {$operator} :value", $params)->error())
                {
                    return $this;
                }
            }
        } else {
            if (!$this->query("{$action} FROM `{$table}`")->error()) {
                return $this;
            }
        }
        return false;
    }
    /**
     * Get Instance:
     * @access public
     * @return DatabaseSyntax
     * @since 1.0.1
     */
    public static function getInstance() {
        if (!isset(self::$_Database)) {
            self::$_Database = new DatabaseSyntax();
        }
        return(self::$_Database);
    }

    /**
     * Error:
     * @access public
     * @return boolean
     * @since 1.0.1
     */
    public function error() {
        return($this->_error);
    }


    /**
     * Query:
     * @access public
     * @param string $sql
     * @param array $params [optional]
     * @return DatabaseSyntax
     * @since 1.0.1
     */
    public function query($sql, array $params = []) {
        $this->_count = 0;
        $this->_error = false;
        $this->_results = [];
        if (($this->_query = $this->db->prepare($sql))) {
            foreach ($params as $key => $value) {
                $this->_query->bind_param($key, $value);
            }

            if ($this->_query->execute()) {
                $this->_results= mysqli_fetch_object($this->_results);
//                $this->_results = $this->_query->fetch(mysqli::fetch_object);
                $this->_count = $this->_query->num_rows;
            }

            else {
                $this->_error = true;
                //die(print_r($this->_query->errorInfo()));
            }
        }
        return $this;
    }

    /**
     * Count:
     * @access public
     * @return integer
     * @since 1.0.1
     */
    public function count() {
        return($this->_count);
    }

    /**
     * First:
     * @access public
     * @return array
     * @since 1.0.1
     */
    public function first() {
        return($this->results(0));
    }


    /**
     * Delete:
     * @access public
     * @param string $table
     * @param array $where [optional]
     * @return DatabaseSyntax|boolean
     * @since 1.0.1
     */
    public function delete($table, array $where = []) {
        return($this->action('DELETE', $table, $where));
    }


    /**
     * Results:
     * @access public
     * @param integer $key [optional]
     * @return array
     * @since 1.0.1
     */
    public function results($key = null) {
        return(isset($key) ? $this->_results[$key] : $this->_results);
    }

    /**
     * Insert:
     * @access public
     * @param string $table
     * @param array $fields
     * @return string|boolean
     * @since 1.0.1
     */
    public function insert($table, array $fields) {
        if (count($fields)) {
            $params = [];
            foreach ($fields as $key => $value) {
                $params[":{$key}"] = $value;
            }
            $columns = implode("`, `", array_keys($fields));
            $values = implode(", ", array_keys($params));
            if (!$this->query("INSERT INTO `{$table}` (`{$columns}`) VALUES({$values})", $params)->error()) {
                return($this->db->insert_id);
            }
        }
        return false;
    }

    /**
     * Select:
     * @access public
     * @param string $table
     * @param array $where [optional]
     * @return DatabaseSyntax|boolean
     * @since 1.0.1
     */
    public function select($table, array $where = []) {
        return($this->action('SELECT *', $table, $where));
    }

    /**
     * Update:
     * @access public
     * @param string $table
     * @param string $id
     * @param array $fields
     * @return boolean
     * @since 1.0.1
     */
    public function update($table, $id, array $fields) {
        if (count($fields)) {
            $x = 1;
            $set = "";
            $params = [];
            foreach ($fields as $key => $value) {
                $params[":{$key}"] = $value;
                $set .= "`{$key}` = :$key";
                if ($x < count($fields)) {
                    $set .= ", ";
                }
                $x ++;
            }
            if (!$this->query("UPDATE `{$table}` SET {$set} WHERE `id` = {$id}", $params)->error()) {
                return true;
            }
        }
        return false;
    }
}
?>