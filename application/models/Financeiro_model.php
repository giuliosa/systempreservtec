<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


  public function adicionar($descricao,$titulo,$tipo,$tamanho, $folder, $id_funcionario, $data)
  {
    $dados['titulo'] = $titulo;
    $dados['descricao'] = $descricao;
    $dados['folder'] = $folder;
    $dados['tipo'] = $tipo;
    $dados['tamanho'] = $tamanho;
    $dados['id_funcionario'] = $id_funcionario;
    $dados['data'] = $data;
    return $this->db->insert('arquivos', $dados);
  }

  public function adicionarAtestado($descricao,$titulo,$tipo,$tamanho, $folder, $id_funcionario)
  {
    $dados['titulo'] = $titulo;
    $dados['descricao'] = $descricao;
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
    return $this->db->get('login')->result();
	}

  public function listar_arquivos()
  {
    $this->db->select('*');
    return $this->db->get('arquivos')->result();
  }

  public function listar_arquivos_por_funcionario($id)
  {
    $this->db->select('*');
		$this->db->where('id_funcionario', $id);
    return $this->db->get('arquivos')->result();
  }

  public function conteudo_arquivo($id)
  {
    $this->db->select('tipo, folder, titulo');
		$this->db->where('id', $id);
    return $this->db->get('arquivos')->result();
  }


}
