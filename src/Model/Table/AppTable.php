<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

use App\Lend\Helper;

class AppTable extends Table {

  protected $_db;

  function __construct($args=[]) {
    $this->_db = ConnectionManager::get('default');
  }


  /* =========================================================================
  * Generate INSERT Query
  * How to use :
  * $this->_getInsertQuery(TABLE_NAME, PARAMETERS);
  * TABLE_NAME: (string) database table name
  * PARAMETERS: (array) fields and values
  * e.g - array('field1'=>'value1', 'field2'=>'value2', ...)
  ========================================================================= */
  protected function _getInsertQuery($table, $params, $ignoreEmpty = true){
    $fields = $values = $targets = array();
    foreach($params as $field => $value) {
      if ($ignoreEmpty && empty($value)) continue;
      $targets[] = '?';
      $fields[] = $field;
      $values[] = $value;
    }
    $query = "INSERT INTO " . $table
          . " ("
          . (implode(',', $fields))
          . ") VALUES ("
          . (implode(',', $targets))
          . ")";
    return array('query' => $query, 'values' => $values);
  }

  /* =========================================================================
  * Generate UPDATE Query
  * How to use :
  * $this->_getUpdateQuery(TABLE_NAME, PARAMETERS, CONDITIONS);
  * TABLE_NAME: (string) database table name
  * PARAMETERS: (array) fields and values to update
  * e.g - array('field1'=>'value1', 'field2'=>'value2', ...)
  * -> UPDATE [table] SET field1='value1', field2='value1', ...
  * CONDITIONS: (array) fields and values to use in WHERE
  * e.g - array('field1'=>'value1', 'field2'=>'value2', ...)
  * -> WHERE field1='value1' AND field2='value2' AND ...
  ========================================================================= */
  protected function _getUpdateQuery($table, $params, $conditions) {
    $fields = $values = array();
    foreach($params as $field => $value) {
      $fields[] = $field . '=?';
      $values[] = ($value || $value == '0') ? $value : NULL;
    }
    $where=array();
    foreach($conditions as $field => $value) {
      $where[]  = $field . '=?';
      $values[] = $value;
    }
    $query = "UPDATE " . $table
          . " SET " . (implode(',', $fields))
          . " WHERE " . (implode(' AND ', $where));
    return array('query' => $query, 'values' => $values);
  }

  /* =========================================================================
  * Generate SELECT Query
  * How to use :
  * $this->_getSelectQuery(TABLE_NAME, CONDITIONS, SORT_TYPE);
  * TABLE_NAME: (string) database table name
  * CONDITIONS: (array) fields and values to use in WHERE
  * e.g - array('field1'=>'value1', 'field2 >'=>'value2', ...)
  * -> WHERE field1='value1' AND field2 > 'value2'
  * SORT_TYPE: (array) fields and values to use in ORDER BY
  * e.g - array('field1'=>'DESC', 'field2'=>'ASC')
  * -> ORDER BY field1 DESC, field2 ASC
  ========================================================================= */
  protected function _getSelectQuery($table, $params = false, $order = false, $limit = false) {
    $fields = $values = array();
    if ($params) {
      foreach($params as $field => $value) {
        $arr_field = explode(' ', trim($field));
        if(count($arr_field) > 1)
          $fields[] = $field . ' ?';
        else
          $fields[] = $field . '=?';

        $values[] = $value;
      }
      $query = "SELECT * FROM " . $table
              . " WHERE " . implode(' AND ', $fields);
    } else {
      $query = "SELECT * FROM " . $table;
    }


    if ($order) {
      $order_by = array();
      foreach($order as $field => $asc_desc) {
        $order_by[] = $field . ' ' . $asc_desc;
      }
      $query .= ' ORDER BY '.(implode(', ', $order_by));
    }
    if ($limit) {
        if (is_array($limit)) {
            $query .= ' LIMIT ' . $limit['limit'] . ' OFFSET ' . $limit['offset'];
        }else{
            $query .= ' LIMIT ' . $limit;
        }
    }

    return array('query' => $query, 'values' => $values);
  }

}
