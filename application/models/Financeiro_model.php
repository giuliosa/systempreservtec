<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


  public function adicionar($new_name,$tipo,$tamanho, $folder, $id_funcionario, $data)
  {
    $dados['titulo'] = $new_name;
    // $dados['descricao'] = $descricao;
    $dados['folder'] = $folder;
    $dados['tipo'] = $tipo;
    $dados['tamanho'] = $tamanho;
    $dados['id_funcionario'] = $id_funcionario;
    $dados['data'] = $data;
    return $this->db->insert('arquivos', $dados);
  }

  public function adicionarAtestado($titulo,$tipo,$tamanho, $folder, $id_funcionario)
  {
    $dados['titulo'] = $titulo;
    // $dados['descricao'] = $descricao;
    $dados['folder'] = $folder;
    $dados['tipo'] = $tipo;
    $dados['tamanho'] = $tamanho;
    $dados['id_funcionario'] = $id_funcionario;
    return $this->db->insert('arquivos', $dados);
  }

	public function listar_funcionarios()
	{
		$this->db->select('id, nome');
    $this->db->where('nivel_acesso', 'O');
    $this->db->where('flag', 1);
    $this->db->order_by('nome');
    return $this->db->get('login')->result();
  }

  public function listar_arquivos()
  {
    $this->db->select('*');
    $this->db->where('flag', 1);
    return $this->db->get('arquivos')->result();
  }

  public function listar_arquivos_por_funcionario($id)
  {
    $this->db->select('*');
    $this->db->where('id_funcionario', $id);
    $this->db->where('flag', 1);
    return $this->db->get('arquivos')->result();
  }

  public function conteudo_arquivo($id)
  {
    $this->db->select('tipo, folder, titulo');
		$this->db->where('id', $id);
    return $this->db->get('arquivos')->result();
  }

  public function excluir($id){
    $dados['flag'] = 0;
    $this->db->where('id', $id);
    return $this->db->update('arquivos', $dados);
  }

  public function buscar_funcionario($id){
    $this->db->select('nome');
    $this->db->where('id', $id);
    $this->db->where('flag', 1);
    return $this->db->get('login')->result();
  }

}
