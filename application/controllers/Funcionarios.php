<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// $this->load->library('session');
		$id = $this->session->userdata('userLogado')->id;
		$nivel = $this->session->userdata('userLogado')->nivel_acesso;
		$this->load->model('login_model', 'modelfuncionario');
		$this->funcionario = $this->modelfuncionario->listar_funcionarios($nivel);
	}

	public function index()	{
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		// Dados a serem enviados para o Cabeçalho
		$dados['funcionarios'] = $this->funcionario;
		$dados['titulo'] = 'Funcionários';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/funcionario/funcionarios');
		$this->load->view('frontend/template/html-footer');
	}

	public function novoFuncionario(){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$dados['titulo'] = 'Adicionar Funcionário';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/funcionario/novofuncionario');
		$this->load->view('frontend/template/html-footer');
	}

	public function detalheFuncionario($id, $slug=NULL){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$dados['titulo'] = 'Detalhe Funcionário';
		$dados['funcionarios'] = $this->modelfuncionario->listar_funcionario($id);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/funcionario/detalhefuncionario');
		$this->load->view('frontend/template/html-footer');
	}

	public function addFuncionario(){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]');
		$this->form_validation->set_rules('login', 'Login', 'required|min_length[3]|is_unique[login.login]');
		$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[3]');
		$this->form_validation->set_rules('cargo', 'Cargo', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'E-mail', 'required|min_length[3]|valid_email|is_unique[login.email]');
		$this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[3]');
		$this->form_validation->set_rules('data', 'Data', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			$this->novoFuncionario();
		} else {
			$nome = $this->input->post('nome');
			$login = $this->input->post('login');
			$senha = $this->input->post('senha');
			$cargo = $this->input->post('cargo');
			$email = $this->input->post('email');
			$nivel_acesso = $this->input->post('nivel_acesso');
			$time = $this->input->post('time');

			// Recebe o CPF pelo POST
			$cpf = $this->input->post('cpf');

			// Troca o - ou . por vazio
			$cpf = str_replace("-", "", $cpf);
			$cpf = str_replace(".", "", $cpf);

			// Recebe a data pelo POST
			$dataR = $this->input->post('data');

			// Pega a data fornecida pelo usuário e divide ela num array, separando
			// pelo /
			$dtemp = explode("/", $dataR);

			// Coloca a data num formato válido para o banco
			$data = $dtemp[2].'-'.$dtemp[1].'-'.$dtemp[0];

			$dados['nome'] = $nome;
			$dados['login'] = $login;
			$dados['senha'] = $senha;

			// $this->modelfuncionario->

			// Se o funcionário for cadastrado com sucesso:
			if ($this->modelfuncionario->addFuncionario($nome, $login, md5($senha), $cargo, $email,$nivel_acesso, $time, $cpf, $data)) {

				// Tente enviar um e-mail para ele dizendo que sua conta foi criada
				try {
					$this->load->library('email');
					$this->email->from('sistema@preservtec.com.br');
					$this->email->to($email);
					$this->email->subject('Sua Conta na Preservtec foi criada com Sucesso');
					$mensagem = $this->load->view('frontend/template/emailnovousuario',$dados,TRUE);
					$this->email->message($mensagem);
					$this->email->send();
				} catch (Exception $e) {
					echo $e;
				}
				redirect(base_url('funcionarios'));
			}else {
				echo "Houve um erro";
			}
		}


	}

	public function atualizaForm(){
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		$this->load->model('formulario_model','modelformulario');
		$justificativa = $this->input->post('justificativa');
		$id = $this->input->post('txt-id');
		$aprovaDoBanco = $this->modelformulario->verificaAprovacao($id);
		$aprova = $this->input->post('aprova');
		foreach ($aprovaDoBanco as $value) {
			if ($value->aprovado == 0 && !empty($value->aprovado)) {
				$aprova = 0;
			}
		}

		$contador = (int) $this->input->post('txt-contador');
		$contador += 1;
		if ($this->modelformulario->atualizar($justificativa,$aprova,$contador,$id)) {
			redirect(base_url('formularios'));
		}else {
			echo "Houve um erro";
		}
	}

	// public function excluir($id)
	// {
	// 	if($this->modelformulario->excluir($id)){
	// 		redirect(base_url('formularios'));
	// 	}else {
	// 		echo "Houve um erro";
	// 	}
	// }
}
