<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$id = $this->session->userdata('userLogado')->id;
		$this->load->model('financeiro_model', 'modelfinanceiro');
		$this->arquivos = $this->modelfinanceiro->listar_arquivos_por_funcionario($id);
		$this->funcionarios = $this->modelfinanceiro->listar_funcionarios();

	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
		// Dados a serem enviados para o Cabeçalho
		$dados['titulo'] = 'Financeiro e RH';
		$dados['arquivos'] = $this->arquivos;
		$dados['funcionarios'] = $this->funcionarios;


		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/financeiro');
		$this->load->view('frontend/template/html-footer');

	}

	public function guardarArquivo()
	{
		$tamanho = $_FILES["arquivo"]["size"];
 		$tipo    = $_FILES["arquivo"]["type"];
 		$titulo  	 = $_FILES["arquivo"]["name"];
 		$descricao = $this->input->post('titulo');
 		$folder  = $this->input->post('tipo');
 		$id_funcionario  = $this->input->post('id');

		// Recebe a data pelo POST
		$dataR = $this->input->post('data');

		// Pega a data fornecida pelo usuário e divide ela num array, separando
		// pelo /
		$dtemp = explode("/", $dataR);

		// Coloca a data num formato válido para o banco
		$data = $dtemp[2].'-'.$dtemp[1].'-'.$dtemp[0];

    $path = './uploads/files/'.$folder.'/';

		if ( ! is_dir($path)) {
        mkdir($path, 0777, $recursive = true);
    }


		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png|pdf';

		$this->upload->initialize($config);

		$this->upload->do_upload('arquivo');
		// Salvar no banco
		if ($this->modelfinanceiro->adicionar($descricao,$titulo,$tipo,$tamanho, $folder, $id_funcionario, $data)) {
				redirect(base_url('financeiro'));
		 }else {
				echo "Houve um erro";
		 }
		// // verificamos se o upload foi processado com sucesso
    // if ( ! $this->upload->do_upload('arquivo'))
    // {
    //     // em caso de erro retornamos os mesmos para uma variável
    //     // e enviamos para a home
    //     $data= array('error' => $this->upload->display_errors());
    //     $this->load->view('frontend/financeiro',$data);
    // } else {
		//
		//
    // }
	}
	public function enviarAtestado()
	{
		$tamanho = $_FILES["arquivo"]["size"];
 		$tipo    = $_FILES["arquivo"]["type"];
 		$titulo  	 = $_FILES["arquivo"]["name"];
 		$descricao = $this->input->post('titulo');
 		$folder  = $this->input->post('tipo');
 		$id_funcionario  = $this->input->post('id');


    $path = './uploads/files/'.$folder.'/';

		if ( ! is_dir($path)) {
        mkdir($path, 0777, $recursive = true);
    }


		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png|pdf';

		$this->upload->initialize($config);

		$this->upload->do_upload('arquivo');
		// Salvar no banco
		if ($this->modelfinanceiro->adicionarAtestado($descricao,$titulo,$tipo,$tamanho, $folder, $id_funcionario)) {
				// Tente enviar um e-mail para ele dizendo que sua conta foi criada
				try {
					$this->load->library('email');
					$this->email->from('sistema@preservtec.com.br');
					$this->email->to('sistema@preservtec.com.br');
					// $this->email->to('italo.fernandes@preservtec.com.br,
					// 							emanuel.airam@preservtec.com.br,
					// 							ivan.lima@preservtec.com.br,
					// 							vinicius.campos@preservtec.com.br');
					$this->email->subject('Foi enviado um atestado');
					$mensagem = $this->load->view('frontend/template/atestado',$dados,TRUE);
					$this->email->message($mensagem);
					$this->email->send();
				} catch (Exception $e) {
					echo $e;
				}
				redirect(base_url('financeiro'));
		 }else {
				echo "Houve um erro";
		 }
		// // verificamos se o upload foi processado com sucesso
    // if ( ! $this->upload->do_upload('arquivo'))
    // {
    //     // em caso de erro retornamos os mesmos para uma variável
    //     // e enviamos para a home
    //     $data= array('error' => $this->upload->display_errors());
    //     $this->load->view('frontend/financeiro',$data);
    // } else {
		//
		//
    // }
	}

	public function downloadArquivo($id)
	{

		$dados = $this->modelfinanceiro->conteudo_arquivo($id);

		foreach ($dados as $value) {
			$arquivoPath = './uploads/files/'.$value->folder.'/'.$value->titulo;
			force_download($arquivoPath,null);
		}




		//

		// foreach ($dados as $key) {
		// 	header("Content-type: $key->tipo; charset=utf-8 ;filesize($key->tamanho)");
 		// 	header("Content-Disposition: attachment; filename=$key->nome");
		// 	header("Pragma: no-cache");
		// 	echo ($key->conteudo);
		// }




	}
}
