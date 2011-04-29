<?php
class Application{
  protected $mysql;
  protected $helpers;

  public function __construct(){
    $this->mysql    = new Mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, true);
  }

  public function insert_secret($secret, $sex, $yearsold){
    $secret   = Helpers::valid($secret);
    $sex      = Helpers::valid($sex);
    $yearsold = Helpers::valid($yearsold);
    
    if($secret && $sex && $yearsold){
      $query  =  $this->mysql->query("INSERT INTO secrets SET secret   ='{$secret}',
                                                              sex      ='{$sex}',
                                                              yearsold = {$yearsold};");
      return $query;
    }
  }

  public function remove_secret($id){
    return $this->mysql->query("DELETE FROM secrets WHERE id={$id};");
  }

  public function accept_secret($id){
    return $this->mysql->query("UPDATE secrets SET accepted=1 WHERE id={$id};");
  }

  public function add_vote($secret_id){
    return $this->mysql->query("UPDATE secrets SET votes=votes+1 WHERE id={$secret_id};");
  }

  public function get_secrets($offset){
    return $this->mysql->query("SELECT * FROM secrets ORDER BY id ASC LIMIT {$offset}, 10;");
  }

}