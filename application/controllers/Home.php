<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('relatorio_model', 'modelrelatorio');

	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		// Dados a serem enviados para o Cabeçalho
		$dados['titulo'] = 'Página Inicial';
		$mes = date('n');
		$id = $this->session->userdata('userLogado')->id;
		$this->relatorio_funcionario = $this->modelrelatorio->listar_relatorio_mes_atual($mes, $id);
		$this->relatorio_total = $this->modelrelatorio->listar_resultados($mes);
		$dados['relatorio_mes'] = $this->relatorio_funcionario;
		$dados['relatorio_total'] = $this->relatorio_total;
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/home');
		$this->load->view('frontend/template/html-footer');

	}

	public function dados()
	{
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		// Dados a serem enviados para o Cabeçalho
		$dados['titulo'] = 'Dados do usuário';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/dados/dados');
		$this->load->view('frontend/template/html-footer');

	}
}
