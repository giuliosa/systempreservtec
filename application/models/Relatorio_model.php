<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio_model extends CI_Model {

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

  public function listar_relatorio_funcionario_por_mes($id)
  {
    $this->db->select('month(data) as mes, year(data) as ano, sum(cliques) as cliques, SUM(imagens) as imagens ');
    $this->db->from('relatorio');
    $this->db->group_by("month(data)");
    $this->db->order_by('data', 'DESC');
    $this->db->where('id_funcionario',$id);
		$this->db->where('flag', 1);


    return $this->db->get()->result();
  }

  public function listar_resultados($mes){

    $this->db->select("(select count(login.id) from login where nivel_acesso = 'o') as operadores, sum(relatorio.cliques) as cliques_soma , sum(relatorio.imagens) as imagens_soma");
    $this->db->from('login');
    $this->db->join('relatorio', 'login.id = relatorio.id_funcionario');
    $this->db->where('login.nivel_acesso', 'o');
    $this->db->where('month(relatorio.data)',$mes);

    return $this->db->get()->result();
  }

	public function listar_relatorio_mes_atual($mes, $id)
	{
		$this->db->select('sum(cliques) as cliques, SUM(imagens) as imagens');
		$this->db->from('relatorio');
		$this->db->where('month(data)',$mes);
		$this->db->where('id_funcionario',$id);

		return $this->db->get()->result();
	}

  public function listar_relatorio_por_mes($id, $mes)
  {
    $this->db->select('*');
    $this->db->from('relatorio');
    $this->db->order_by('data', 'DESC');
    $this->db->where('id_funcionario',$id);
    $this->db->where('month(data)',$mes);
		$this->db->where('flag', 1);


    return $this->db->get()->result();
  }

  public function listar_relatorio_funcionario($id)
  {
    $this->db->select('month(data) as mes, year(data) as ano, sum(cliques) as cliques, SUM(imagens) as imagens, id_funcionario as funcionario');
    $this->db->from('relatorio');
    $this->db->group_by("month(data)");
    $this->db->order_by('data', 'DESC');
    $this->db->where('id_funcionario',$id);
		$this->db->where('flag', 1);

    return $this->db->get()->result();
  }

  public function listar_relatorio_por_id($id)
  {
    $this->db->select('*');
    $this->db->from('relatorio');
		$this->db->where('id',$id);
    $this->db->where('id',$id);
    return $this->db->get()->result();
  }

  public function adicionar($id_funcionario, $projeto, $midia,  $cliques,
														$imagens, $cliques_retoma, $imagens_retoma , $no_hd)
  {
    $dados['id_funcionario'] = $id_funcionario;
    $dados['projeto'] = $projeto;
    $dados['midia'] = $midia;
    $dados['cliques'] = $cliques;
    $dados['imagens'] = $imagens;
    $dados['cliqueretoma'] = $cliques_retoma;
    $dados['imagemretoma'] = $imagens_retoma;
    $dados['no_hd'] = $no_hd;
    return $this->db->insert('relatorio', $dados);
  }

  public function editar($id, $projeto, $midia,  $cliques,
														$imagens, $cliques_retoma, $imagens_retoma , $no_hd)
  {
    $dados['projeto'] = $projeto;
    $dados['midia'] = $midia;
    $dados['cliques'] = $cliques;
    $dados['imagens'] = $imagens;
    $dados['cliqueretoma'] = $cliques_retoma;
    $dados['imagemretoma'] = $imagens_retoma;
    $dados['no_hd'] = $no_hd;
		$this->db->where('id',$id);
    return $this->db->update('relatorio', $dados);
  }

	public function excluir($id)
  {
    $dados['flag'] = 0;
    $this->db->where('id', $id);
    return $this->db->update('relatorio', $dados);
  }

  //Verifica mídia do funcionário
  public function verificaMidia($id_funcionario, $midia)
  {
    $this->db->select('*');
    $this->db->from('relatorio');
    $this->db->where('id_funcionario',$id_funcionario);
		$this->db->where('midia', $midia);

    return $this->db->get()->result();
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
