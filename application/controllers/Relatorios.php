<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$id = $this->session->userdata('userLogado')->id;
		$this->load->model('relatorio_model', 'modelrelatorio');
		$this->funcionarios = $this->modelrelatorio->listar_funcionarios();
		$this->relatorio_funcionario = $this->modelrelatorio->listar_relatorio_funcionario_por_mes($id);
	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}

		// Dados a serem enviados para o Cabeçalho
		$dados['funcionarios'] = $this->funcionarios;
		$dados['relatorio_funcionario'] = $this->relatorio_funcionario;
		$dados['titulo'] = 'Relatórios';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/relatorios');
		$this->load->view('frontend/template/html-footer');

	}

	public function novoRelatorio(){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		// $this->load->model('reembolso_model','modelreembolso');
		// $id = $this->session->userdata('userLogado')->id;
		// $dados['reembolsos_funcionario'] = $this->modelreembolso->listar_reembolso_funcionario($id);
		$dados['titulo'] = 'Adicionar Relatório';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/novorelatorio');
		$this->load->view('frontend/template/html-footer');
	}

	public function detalheRelatorio($mes){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$dados['titulo'] = 'Relatório detalhado';
		$id = $this->session->userdata('userLogado')->id;
		$dados['relatorios'] = $this->modelrelatorio->listar_relatorio_por_mes($id , $mes);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/detalherelatorio');
		$this->load->view('frontend/template/html-footer');
	}

	public function detalheRelatorios($id, $mes){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$dados['titulo'] = 'Relatório detalhado';
		$dados['relatorios'] = $this->modelrelatorio->listar_relatorio_por_mes($id , $mes);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/detalherelatorio');
		$this->load->view('frontend/template/html-footer');
	}

	public function detalheRelatorioPorFuncionario($id, $slug = NULL){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$dados['titulo'] = 'Relatório detalhado';
		$dados['relatorios'] = $this->modelrelatorio->listar_relatorio_funcionario($id);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/detalherelatorioporfuncionario');
		$this->load->view('frontend/template/html-footer');
	}

	public function addRelatorio(){
		$this->load->model('relatorio_model','modelrelatorio');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('projeto', 'Projeto', 'required|min_length[3]');
		$this->form_validation->set_rules('midia', 'Midia', 'required|min_length[3]|callback_midia_check');
		$this->form_validation->set_rules('cliques', 'Cliques', 'required|min_length[3]');
		$this->form_validation->set_rules('nohd', 'No HD', 'required');
		$this->form_validation->set_rules('imagens', 'Imagens', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			$this->novoRelatorio();
		} else {
			$id_funcionario = $this->session->userdata('userLogado')->id;
			$projeto = $this->input->post('projeto');
			$midia = $this->input->post('midia');
			$cliques = $this->input->post('cliques');
			$imagens = $this->input->post('imagens');
			$ho_hd = $this->input->post('nohd');
			$cliques_retoma = $this->input->post('cliques-retoma');
			$imagens_retoma = $this->input->post('imagens-retoma');


			if ($this->modelrelatorio->adicionar($id_funcionario, $projeto, $midia,
							$cliques, $imagens, $cliques_retoma, $imagens_retoma , $ho_hd)) {
				redirect(base_url('relatorios'));
			}else {
				echo "Houve um erro";
			}
		}
	}

	public function editarMudancasRelatorio(){
		$this->load->model('relatorio_model','modelrelatorio');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('projeto', 'Projeto', 'required|min_length[3]');
		$this->form_validation->set_rules('midia', 'Midia', 'required|min_length[3]');
		$this->form_validation->set_rules('cliques', 'Cliques', 'required|min_length[3]');
		$this->form_validation->set_rules('nohd', 'No HD', 'required');
		$this->form_validation->set_rules('imagens', 'Imagens', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			$this->editarRelatorio();
		} else {
			// $id_funcionario = $this->session->userdata('userLogado')->id;
			$id = $this->input->post('id');
			$projeto = $this->input->post('projeto');
			$midia = $this->input->post('midia');
			$cliques = $this->input->post('cliques');
			$imagens = $this->input->post('imagens');
			$ho_hd = $this->input->post('nohd');
			$cliques_retoma = $this->input->post('cliques-retoma');
			$imagens_retoma = $this->input->post('imagens-retoma');


			if ($this->modelrelatorio->editar($id, $projeto, $midia,
							$cliques, $imagens, $cliques_retoma, $imagens_retoma , $ho_hd)) {
				redirect(base_url('relatorios'));
			}else {
				echo "Houve um erro";
			}
		}
	}

	public function editarRelatorio($id, $slug = NULL)
	{
		//
		$this->load->library('form_validation');
		// $this->load->model('formulario_model','modelformulario');

		$this->relatorio = $this->modelrelatorio->listar_relatorio_por_id($id);
		$dados['relatorio'] = $this->relatorio;
		$dados['titulo'] = 'Editar Relatório';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/editarelatorio');
		$this->load->view('frontend/template/html-footer');


	}

	public function excluirRelatorio($id)
	{

		if ($this->modelrelatorio->excluir($id)) {
			redirect(base_url('relatorios'));
		}else {
			echo "Houve um erro";
		}


	}

	public function midia_check($valor)
	{
		$id_funcionario = $this->session->userdata('userLogado')->id;

		// Verifica se a mídia desse funcionário já existe
		if ($this->modelrelatorio->verificaMidia($id_funcionario, $valor)) {
				$this->form_validation->set_message('midia_check', 'Essa mídia já foi cadastrada!');
				return FALSE;
			}else {
				return TRUE;
			}
	}
}
