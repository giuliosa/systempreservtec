<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formularios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$id = $this->session->userdata('userLogado')->id;
		$this->load->model('formulario_model', 'modelformulario');
		$this->formularios = $this->modelformulario->listar_formularios();
		$this->form_funcionario = $this->modelformulario->listar_formulario_funcionario($id);
	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			redirect(base_url('systempreserv/login'));
		}
		$dados['formularios'] = $this->formularios;
		$dados['form_funcionario'] = $this->form_funcionario;
		// Dados a serem enviados para o Cabeçalho
		$dados['titulo'] = 'Formulários';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/formularios');
		$this->load->view('frontend/template/html-footer');
	}

	public function novoForm(){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('systempreserv/login'));
		}
		$dados['titulo'] = 'Adicionar Formulário';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/novoForm');
		$this->load->view('frontend/template/html-footer');
	}

	public function detalheForm($id){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('systempreserv/login'));
		}
		$id_gerente = $this->session->userdata('userLogado')->id;

		// Monta array para enviar dados para a view
		$dados['titulo'] = 'Formulário detalhado';

		// Verifica se o gerente logado já alterou o formulario
		$aprovaDoBanco = $this->modelformulario->verificaAprovacao($id, $id_gerente);

		// Vai ser verificado se o array que o banco retorna na consulta acima está
		// vazio ou se está cheio
		if (count($aprovaDoBanco) > 0) {
			$dados['aprovou'] = 1; // Estando maior do que zero, o gerente logado já alterou o formulário
		} else{
			$dados['aprovou'] = 0; // Estando igual a zero, o gerente logado não alterou o formulário
		}

		$dados['formularios'] = $this->modelformulario->listar_formulario($id);
		$dados['justificativas'] = $this->modelformulario->listar_justificativa($id);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/detalheform');
		$this->load->view('frontend/template/html-footer');
	}

	public function addForm(){

		//Carregar a livraria de validação
		$this->load->library('form_validation');
		$this->load->model('formulario_model','modelformulario');

		// Recebe os dados do input via POST
		$descricao = $this->input->post('txt-requisicao');
		$id = $this->input->post('txt-id');
		$tipo_formulario = $this->input->post('tipo_formulario');

		if ($this->modelformulario->adicionar($descricao, $id, $tipo_formulario)) {
			redirect(base_url('formularios'));
		}else {
			echo "Houve um erro";
		}
	}

	public function atualizaForm(){
		// Carregando o model formulário
		$this->load->model('formulario_model','modelformulario');

		// Pegando dados para salvar na tabela de aprovação
		$justificativa = $this->input->post('justificativa');
		$id_form = $this->input->post('txt-id');
		$id_gerente = $this->session->userdata('userLogado')->id;
		$aprovador = $this->input->post('aprova');
		$contador = (int) $this->input->post('txt-contador');
		$contador += 1;

		if ($this->modelformulario->addAprovacao($id_form, $id_gerente, $aprovador, $justificativa)) {
			$aprovaDoBanco = $this->modelformulario->verificaParaAprovacao($id_form);

			foreach ($aprovaDoBanco as $value) {
				if (is_null($value->aprovado)) {

					$aprova = $this->input->post('aprova');
				} else{
					$aprova = $this->input->post('aprova');
					$aprova = $aprova && $value->aprovado;

				}
			}

			$this->modelformulario->atualizar($aprova,$contador,$id_form);
			redirect(base_url('formularios'));
		}else {
			echo "Houve um erro";
		}
	}

	public function editarForm()
	{
		//
		$this->load->library('form_validation');
		$this->load->model('formulario_model','modelformulario');

		// Carregar os inputs nas variáveis
		$descricao = $this->input->post('txt-requisicao');
		$id_user = $this->input->post('txt-id-user');
		$id_form = $this->input->post('txt-id-form');

		if ($this->modelformulario->editar($descricao, $id_user, $id_form)) {
			redirect(base_url('formularios'));
		}else {
			echo "Houve um erro";
		}
	}

	// Exclui o pedido feito no relatório
	// Essa exclusão é feita de maneira lógica
	public function excluir($id)
	{
		if ($this->modelformulario->excluir($id)) {
			redirect(base_url('formularios'));
		}else {
			echo "Houve um erro";
		}
	}
}
