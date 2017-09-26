<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reembolso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$id = $this->session->userdata('userLogado')->id;
		$this->load->model('reembolso_model', 'modelreembolso');
		$this->funcionarios = $this->modelreembolso->listar_funcionarios();
		$this->reembolso_funcionario = $this->modelreembolso->listar_reembolso_funcionario_por_mes($id);
	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		//Dados a serem enviados para o Cabeçalho
		$dados['funcionarios'] = $this->funcionarios;
		$dados['reembolso_funcionario'] = $this->reembolso_funcionario;
		$dados['titulo'] = 'Reembolsos e Gastos';


		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/reembolso');
		$this->load->view('frontend/template/html-footer');
	}

	public function novoReembolso(){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$this->load->model('reembolso_model','modelreembolso');
		$id = $this->session->userdata('userLogado')->id;
		$dados['reembolsos_funcionario'] = $this->modelreembolso->listar_reembolso_funcionario($id);
		$dados['titulo'] = 'Adicionar Gasto';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/novoReembolso');
		$this->load->view('frontend/template/html-footer');
	}

	public function detalheReembolso($mes){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$dados['titulo'] = 'Reembolso detalhado';
		$id = $this->session->userdata('userLogado')->id;
		$dados['reembolsos'] = $this->modelreembolso->listar_reembolso_por_mes($id , $mes);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/detalhereembolso');
		$this->load->view('frontend/template/html-footer');
	}

	public function detalheReembolsoPorFuncionario($id, $slug = NULL){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$dados['titulo'] = 'Reembolso detalhado';
		// $id = $this->session->userdata('userLogado')->id;
		$dados['reembolsos'] = $this->modelreembolso->listar_reembolso_funcionario($id);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/detalhereembolsoporfuncionario');
		$this->load->view('frontend/template/html-footer');
	}

	public function addReembolso(){
		$this->load->model('reembolso_model','modelreembolso');
		$id_funcionario = $this->input->post('txt-id');
		$tipo = $this->input->post('tipo');
		$valor = $this->input->post('valor');
		$quantidade = $this->input->post('quantidade');
		if ($tipo == "gasolina-c") {
			$valor_quilometragem = $quantidade * 0.5;
		} else if ($tipo == "gasolina-m") {
			$valor_quilometragem = $quantidade * 0.25;
		} else {
			$valor_quilometragem = 0;
		}

		if ($this->modelreembolso->adicionar($id_funcionario, $tipo, $valor, $quantidade, $valor_quilometragem)) {
			redirect(base_url('reembolso/novoReembolso'));
		}else {
			echo "Houve um erro";
		}
	}
}
