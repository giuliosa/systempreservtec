<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  public function listar_usuario($id)
  {
    $this->db->where('id_login', $id);

    return $this->db->get('usuario')->result();
  }

	public function listar_funcionarios($nivel)
	{
		if ($nivel == "G") {
			$this->db->select('*');
    	$this->db->from('login');

			return $this->db->get()->result();
			
		} else if($nivel == "C"){
			$this->db->select('*');
			$this->db->from('login');
			$this->db->where('id_time', 2);

    	return $this->db->get()->result();
		}

		
	}

	public function addFuncionario($nome, $login, $senha, $cargo, $email, $nivel_acesso, $time, $cpf, $data)
	{
		$dados['nome'] = $nome;
		$dados['login'] = $login;
		$dados['senha'] = $senha;
		$dados['cargo'] = $cargo;
		$dados['email'] = $email;
		$dados['nivel_acesso'] = $nivel_acesso;
		$dados['id_time'] = $time;
		$dados['cpf'] = $cpf;
		$dados['data_nascimento'] = $data;
		return $this->db->insert('login', $dados);

	}


	public function listar_funcionario($id)
	{
		$this->db->select('*');
    $this->db->from('login');
		$this->db->where('id',$id);

    return $this->db->get()->result();
	}

	public function listar_funcionario_por_time($id)
	{
		$this->db->select('*');
    $this->db->from('login');
		$this->db->where('id',$id);
		$this->db->where('id_time',2);

    return $this->db->get()->result();
	}
}
