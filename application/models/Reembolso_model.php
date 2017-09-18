<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reembolso_model extends CI_Model {

  public $id;
  public $titulo;

	public function __construct()
	{
		parent::__construct();
	}

  public function listar_funcionarios()
  {
    $this->db->select('nome, id');
    $this->db->from('login');
    $this->db->where('nivel_acesso','O');

    return $this->db->get()->result();
  }

  public function listar_reembolso_funcionario_por_mes($id)
  {
    $this->db->select('month(data) as mes, year(data) as ano, sum(valor) as total');
    $this->db->from('reembolso');
    $this->db->group_by("month(data)");
    $this->db->order_by('data', 'DESC');
    $this->db->where('id_login',$id);


    return $this->db->get()->result();
  }

  public function listar_reembolso_por_mes($id, $mes)
  {
    $this->db->select('*');
    $this->db->from('reembolso');
    $this->db->order_by('data', 'DESC');
    $this->db->where('id_login',$id);
    $this->db->where('month(data)',$mes);


    return $this->db->get()->result();
  }

  public function listar_reembolso_funcionario($id)
  {
    $this->db->select('*');
    $this->db->from('reembolso');
    $this->db->order_by('data', 'DESC');
    $this->db->where('id_login',$id);


    return $this->db->get()->result();
  }

  public function adicionar($id_funcionario, $tipo, $valor, $quantidade, $valor_informado)
  {
    $dados['id_login'] = $id_funcionario;
    $dados['tipo'] = $tipo;
    $dados['valor'] = $valor;
    $dados['quantidade'] = $quantidade;
    $dados['valor_informado'] = $valor_informado;
    return $this->db->insert('reembolso', $dados);
  }

  /*public function atualizar($justificativa, $aprova, $contador, $id)
  {
    $dados['justificativa'] = $justificativa;
    $dados['aprovado'] = $aprova;
    $dados['contador'] = $contador;
    $this->db->where('id', $id);
    return $this->db->update('formulario', $dados);
  }

  public function verificaAprovacao($id)
  {
    $this->db->select('aprovado');
    $this->db->where('id', $id);
    return $this->db->get('formulario')->result();
  }*/
}
