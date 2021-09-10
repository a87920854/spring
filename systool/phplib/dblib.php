<?php
class DB {
	private $dbhost = '192.168.88.2';
	private $dbname = 'springclub';
	private $dbuser = 'spring';
	private $dbpasswd = '28212342';
	
	private $error;
	private $dbh;	
	
	// 初始
	public function __construct() {
		$opt = array(
		// mysql
    /*    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => FALSE*/
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false // mssql
    );
	  try {
			//$this->dbh = new PDO ('mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset=utf8', $this->dbuser, $this->dbpasswd, $opt);
			$this->dbh = new PDO ('sqlsrv:server='.$this->dbhost.';Database='.$this->dbname.'', $this->dbuser, $this->dbpasswd, $opt);
		}		// Catch any errors
		catch ( PDOException $e ) {
			$this->throwError('create pdo => '.$e->getMessage());
		}
  }
  
  // 消滅
  public function __destruct() {  	
     unset($this->dbh);
  }
  
  // 兼容
  public function prepare($sql) {
  	
    try {    	
	    $sa = $this->dbh->prepare($sql);	    
	    return $sa;
  	} catch ( Exception $e ) {
			$this->throwError('prepare func => '.$e->getMessage());
		}
		
  }
  
  // 所有
  public function fetchAll($sql, $params = []) {
  	try {
  		$res = false;  		
      $sa = $this->dbh->prepare($sql);
      if ($sa->execute($params)) {
        $res = $sa->fetchAll();
      }
      return $res;
    } catch (Exception $e) {
      $this->throwError('fetchAll func => '.$e->getMessage());
    }
  }

  // 單行
  public function fetch($sql, $params = []) {
  	try {
  		$res = false;
      $sa = $this->dbh->prepare($sql." limit 1");      
      if(!$sa->execute($params)) $sa = $this->dbh->prepare($sql);
      if ($sa->execute($params)) {
        $res = $sa->fetch();
      }
      return $res;
    } catch (Exception $e) {
      $this->throwError('fetch func => '.$e->getMessage());
    }
  }
  
  // 新增
  /*
  $res = insert('table', ['name' => 'value', 'title' => 'value']);
  insert('table', ['name' => 'value', 'title' => 'value'], false);
  F: 代表 sql 運算式
  insert("table", ['name' => 'value','count' => 'F:(select count(*) from another_table)'], true);
  */
  public function insert($table, $params = [], $lastid = true) {
  	
  	if(count($params) <= 0) {
  		$this->throwError('insert func => params is empty.');
  		return false;
  	}
  	        
	  $dbclassupdatesql = implode(",", array_keys($params));
	    foreach($params as $k => $v ) {
	    	
	    	if(substr($v, 0, 2) == 'F:') {	    		
	    		$i2arr[] = substr($v, 2, strlen($v));	    		
	    		continue;
	    	}
	    	$i2arr[] = ':'.$k;
	      $dbclassupdateprep[':'.$k] = $v;
	    }
	    
    $i2sql = implode(",", $i2arr);
    try {    	
	    $sa = $this->dbh->prepare('INSERT INTO '.$table.' ('.$dbclassupdatesql.') VALUES ('.$i2sql.')');
	    $res = $sa->execute($dbclassupdateprep);  
	    if($lastid === true) $res = $this->dbh->lastInsertId();
	    return $res;	    
  	} catch ( Exception $e ) {
			$this->throwError('insert func => '.$e->getMessage());
		}
		  	
  }
  
  // 更新
  /*
  update('table', ['name' => 'value', 'title' => 'value'], 'auton=:auton', ['auton'=>100]);
  DB:代表原先資料庫欄位
  update('table', ['name' => 'value', 'upstats' => 'DB:stats'], 'auton=:auton', ['auton'=>100]);
  */
  public function update($table, $params = [], $where = false, $whereparams = []) {
  	if($where === false) {
  		// 沒有 where 太危險, 有可能更新整表, 一般禁止使用
  		$this->throwError('update func => where is required.');
  		return false;
  	}
  	
  	if(count($params) <= 0) {
  		$this->throwError('update func => params is empty.');
  		return false;
  	}
  	
  	$dbclassupdateprep = [];
  	  	
	    foreach($params as $k => $v ) {
	    	if(substr($v, 0, 3) == 'DB:') {	    		
	    		$dbclassupdatesql[] = $k.'='.substr($v, 3, strlen($v));	    		
	    		continue;
	    	}
	      $dbclassupdatesql[] = $k.'=:'.$k;
	      $dbclassupdateprep[':'.$k] = $v;
	    }
    
    if(count($whereparams) > 0) {
    	foreach($whereparams as $k => $v ) {
    		if(isset($dbclassupdateprep[':'.$k])) {
  		    $this->throwError('update func => where params '.$k.' is conflict.');
  		    return false;
    		}	      
	      $dbclassupdateprep[':'.$k] = $v;
	    }
    }
    
    try {    	
	    $sa = $this->dbh->prepare('UPDATE '.$table.' SET '.implode(",", $dbclassupdatesql).' WHERE '.$where.''); 	
	    $res = $sa->execute($dbclassupdateprep);  	    
	    return $res;	    
  	} catch ( Exception $e ) {
			$this->throwError('update func => '.$e->getMessage());
		}
  	
  }
  
  // 刪除
  /*
  delete('table', 'auton=:auton', ['auton'=>100]);
  */
  public function delete($table, $where = false, $whereparams = []) {
  	if($where === false) {
  		// 沒有 where 太危險, 有可能更新整表, 一般禁止使用
  		$this->throwError('delete func => where is required.');
  		return false;
  	}
  
    $dbclassupdateprep = [];
    
    if(count($whereparams) > 0) {
    	foreach($whereparams as $k => $v ) {
    		if(isset($dbclassupdateprep[':'.$k])) {
  		    $this->throwError('delete func => where params '.$k.' is conflict.');
  		    return false;
    		}	      
	      $dbclassupdateprep[':'.$k] = $v;
	    }
    }
    
    
    try {    	
	    $sa = $this->dbh->prepare('DELETE FROM '.$table.' WHERE '.$where.''); 	
	    $res = $sa->execute($dbclassupdateprep);
	    return $res;	    
  	} catch ( Exception $e ) {
			$this->throwError('delete func => '.$e->getMessage());
		}
  	
  }
  
  // 特殊執行
  /*
  $db = sql('select * from table where auton=:auton', ['auton'=>100]);
  $db->fetch(); // return pdo object
  */
  public function sql($sql, $params = []) {
  
    try {    	
	    $sa = $this->dbh->prepare($sql); 	
	    $res = $sa->execute($params);
	    return $sa;
  	} catch ( Exception $e ) {
			$this->throwError('sql func => '.$e->getMessage());
		}
  	
  }
  
  // 交易用參數
  public function autocommit() {
  	$this->dbh->beginTransaction();  	
  }
  public function commit() {
  	$this->dbh->commit();  	
  }
  public function rollback() {
  	$this->dbh->rollback();  	
  }
  
  private function throwError($msg) {
    throw new Exception("DB：" . $msg);
  }
  
}
?>