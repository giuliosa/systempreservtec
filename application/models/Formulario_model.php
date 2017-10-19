<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario_model extends CI_Model {

  public $id;
  public $titulo;

	public function __construct()
	{
		parent::__construct();
	}

  public function listar_formularios()
  {
    $this->db->select('login.nome,formulario.id , formulario.descricao,
                       formulario.data, formulario.aprovado,
                       formulario.contador');
    $this->db->from('formulario');
    $this->db->join('login', 'login.id = formulario.id_funcionario');
    $this->db->order_by('formulario.data', 'DESC');
    $this->db->where('formulario.flag', 1);
    return $this->db->get()->result();
  }

  public function listar_formulario($id)
  {
    $this->db->select('login.nome,formulario.id , formulario.descricao,
                       formulario.data, formulario.aprovado,
                       formulario.contador, formulario.tipo');
    $this->db->from('formulario');
    $this->db->join('login', 'login.id = formulario.id_funcionario');
    $this->db->where('formulario.id',$id);
    return $this->db->get()->result();
  }

  public function listar_formulario_por_time()
  {
    $this->db->select('login.nome,formulario.id , formulario.descricao,
                       formulario.data, formulario.aprovado,
                       formulario.contador, formulario.tipo');
    $this->db->from('formulario');
    $this->db->join('login', 'login.id = formulario.id_funcionario');
    $this->db->where('formulario.flag',1);
    $this->db->where('login.id_time',2);
    return $this->db->get()->result();
  }

  

  public function listar_formulario_funcionario($id)
  {
    $this->db->where('id_funcionario', $id);
    $this->db->where('flag', 1);
    $this->db->order_by('data', 'DESC');
    return $this->db->get('formulario')->result();
  }

  public function listar_justificativa($id)
  {
    $this->db->select('justificativa');
    $this->db->where('id_form', $id);
    return $this->db->get('aprova')->result();
  }

  public function adicionar($descricao, $id, $tipo_formulario)
  {
    $dados['descricao'] = $descricao;
    $dados['id_funcionario'] = $id;
    $dados['tipo'] = $tipo_formulario;
    return $this->db->insert('formulario', $dados);
  }

  public function atualizar($aprova,$contador,$id)
  {
    // $dados['justificativa'] = $justificativa;
    $dados['aprovado'] = $aprova;
    $dados['contador'] = $contador;
    $this->db->where('id', $id);
    return $this->db->update('formulario', $dados);
  }

  public function verificaAprovacao($id_form, $id_gerente)
  {
    $this->db->select('*');
    $this->db->where('id_form', $id_form);
    $this->db->where('id_gerente', $id_gerente);
    return $this->db->get('aprova')->result();
  }

  public function verificaParaAprovacao($id_form)
  {
    $this->db->select('aprovado');
    $this->db->where('id_form', $id_form);
    return $this->db->get('aprova')->result();
  }

  public function addAprovacao($id_form, $id_gerente, $aprova, $justificativa)
  {
    $dados['id_form'] = $id_form;
    $dados['id_gerente'] = $id_gerente;
    $dados['aprovado'] = $aprova;
    $dados['justificativa'] = $justificativa;
    return $this->db->insert('aprova', $dados);
  }

  public function editar($descricao, $id_user, $id_form)
  {
    $dados['descricao'] = $descricao;
    $this->db->where('id', $id_form);
    $this->db->where('id_funcionario', $id_user);
    return $this->db->update('formulario', $dados);
  }

  public function excluir($id)
  {
    $dados['flag'] = 0;
    $this->db->where('id', $id);
    return $this->db->update('formulario', $dados);
  }
}
