<?php
/*
 	负责链接数据库，使用PDO
*/

class Connect
{
	//格式		"mysql:dbname=数据库名称;host=数据库地址"
	const dsn = "mysql:dbname=scores_database;host=localhost";
	
	const db_username = 'root';	//数据库账户
	const db_password = '';//数据库密码
	
	public $pdo;
	
	public function __construct()
	{
		try 
		{
			$this->pdo = new PDO(self::dsn, 
					self::db_username, self::db_password,
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));//指定编码集为 utf8
		} catch (PDOException $e) 
		{
			echo '数据库连接失败: ' . $e->getMessage();
			exit();
		}
	}
	
	private static function buildWhere($where, &$value)
	{
		if($where != null && is_array($where) && count($where) > 0 && is_array($value))
		{
			array_push($value, ...array_values($where));
			$where = 'WHERE ' . join('=? AND ', array_keys($where)) . '=?';
		}
		else
		{
			$where = '';
		}
		return $where;
	}
	
	/**
	 * 插入操作
	 * */
	public function insert($table, $data)
	{
		if(!empty($table) && is_array($data) && count($data) > 0)
		{
			$keys = join(',', array_keys($data));
			$vals = str_repeat('?,',count($data));
			$vals = rtrim($vals,',');

			$query = "INSERT INTO {$table} ({$keys}) VALUES({$vals})";
			
			$stmt = $this->pdo->prepare($query);
			return $stmt->execute(array_values($data));
		}
		return false;
	}
	
	/**
	 * 更新操作
	 * */
	public function update($table, $data, $where = null) 
	{
		if(!empty($table) && is_array($data) && count($data) > 0)
		{
			$set = join('=?,', array_keys($data)) . '=? ';
			$value = array_values($data);
			$where = self::buildWhere($where, $value);

			$query = "UPDATE {$table} SET {$set} {$where}";
			
			$stmt = $this->pdo->prepare($query);
			return $stmt->execute($value);
		}
		return false;
	}
	
	/**
	 * 删除操作
	 * */
	public function delete($table, $where = null)
	{
		if(!empty($table))
		{
			$value = array();
			$where = self::buildWhere($where, $value);
			
			$query = "DELETE FROM {$table} {$where}";
			
			$stmt = $this->pdo->prepare($query);
			return $stmt->execute($value);
		}
		return false;
	}
	
	/**
	 * 查询指定记录,返回结果集,如果失败，返回false
	 * */
	public function select($table, $fields, $where = null)
	{
		if(!empty($table) && is_array($fields) && count($fields) > 0)
		{
			$fields = join(',', array_values($fields));
			$value = array();
			$where = self::buildWhere($where, $value);
				
			$query = "SELECT {$fields} FROM {$table} {$where}";
				
			$stmt = $this->pdo->prepare($query);
			if($stmt->execute($value))
			{
				return $stmt->fetchAll();
			}
		}
		return false;
	}
	
	/**
	 * 查询一条记录
	 * */
	public function selectOne($table, $fields, $where = null)
	{
		$result = $this->selectByLimit($table, $fields, 0, 1, $where);
		if($result && is_array($result) && count($result) == 1)
		{
			return $result[0];
		}
		return false;
	}
	
	/**
	 * 查询记录,可指定查询数量和偏移值
	 * */
	public function selectByLimit($table, $fields, $offset, $count, $where = null)
	{
		if(!empty($table) && count($fields) > 0 && $count > 0)
		{
			$fields = join(',', array_values($fields));
			$value = array();
				
			$where = self::buildWhere($where, $value);
				
			$query = "SELECT {$fields} FROM {$table} {$where} LIMIT $offset,$count";
				
			$stmt = $this->pdo->prepare($query);
			if($stmt->execute($value))
			{
				return $stmt->fetchAll();
			}
		}
		return false;
	}
	
	/**
	 * 返回表中的记录数
	 * */
	public function getTotalRows($table)
	{
		return $this->getResultRows($table,null);
	}
	
	/**
	 * 返回结果集的记录条数
	 * */
	public function getResultRows($table, $where)
	{
		$value = array();
		$where = self::buildWhere($where, $value);
		
		$query = "SELECT COUNT(*) AS resultRows FROM {$table} {$where}";
		$stmt = $this->pdo->prepare($query);
	
		if($stmt->execute($value) && $result = $stmt->fetch())
		{
			return $result['resultRows'];
		}
		return 0;
	}

}

?>