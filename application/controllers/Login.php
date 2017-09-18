<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
	}

	public function index()
	{
		// $dados['categorias'] = $this->categorias;
		// $this->load->model('publicacoes_model', 'modelpublicacoes');
		// $dados['postagem'] = $this->modelpublicacoes->publicacao($id);

		// Dados a serem enviados para o Cabeçalho
		$dados['titulo'] = 'Login';
		// $dados['subtitulo'] = '';
		// $dados['subtitulodb'] = $this->modelpublicacoes->listar_titulo($id);
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/login');
		$this->load->view('frontend/template/html-footer');


	}



	public function validar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login', 'Usuário', 'required|min_length[3]');	
		$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[3]');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else{
			$usuario = $this->input->post('login');
			$senha = $this->input->post('senha');
			$this->db->where('login', $usuario);
			$this->db->where('senha', md5($senha));
			$usuarioLogado = $this->db->get('login')->result();

			if(count($usuarioLogado)==1){
				$dadosSessao['userLogado'] = $usuarioLogado[0];
				$dadosSessao['logado'] = TRUE;

				$this->session->set_userdata($dadosSessao);
				redirect(base_url('home'));
				// if (!$this->session->has_userdata($dadosSessao)) {
				// }

			} else {
				// $dadosSessao['userLogado'] = $usuarioLogado[0];
				// $dadosSessao['logado'] = FALSE;

				$this->session->sess_destroy();
				redirect(base_url('login'));
			}
		}


	}

	public function logout()
	{
		// $dadosSessao['userLogado'] = $usuarioLogado[0];
		// $dadosSessao['logado'] = FALSE;

		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
