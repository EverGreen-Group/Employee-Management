<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EvaluationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EvaluationModel');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('evaluation_form');
    }

    public function submit() {
        if ($this->input->method() == 'post') {
            $data = array(
                'name' => $this->input->post('name'),
                'evaluation_date' => $this->input->post('todays_date'),
                'performance_evaluation' => $this->input->post('performance_evaluation'),
                'task_completion' => $this->input->post('task_completion'),
                'skill_improvement' => $this->input->post('skill_improvement')
            );

            $result = $this->EvaluationModel->saveEvaluation($data);

            if ($result) {
                $this->session->set_flashdata('success', 'Evaluation submitted successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to submit evaluation. Please try again.');
            }

            redirect('evaluation');
        } else {
            show_404();
        }
    }
}