<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';

class Quizes extends CI_Controller
{
    /**
     * View Function to display candidate quiz listing page
     *
     * @param integer $page
     * @return html/string
     */
    public function listView($page = null)
    {
        $this->checkLogin();
        $total = $this->QuizModel->getTotalCandidateQuizes();
        $limit = 5;
        $page_data['page'] = site_phrase('assigned_quizes').' | ' . setting('site-name');
        $page_data['page'] = 'quizes';
        $page_data['quizes'] = $this->QuizModel->getCandidateQuizes($page, $limit);
        $page_data['pagination'] = $this->createPagination($page, '/account/quizes/', $total, $limit);
        $page_data['page_name'] = 'account-quiz-listing';
           $page_data['page_title'] = site_phrase("quiz_listing");
           $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        // $this->load->view('front/layout/header', $pageData);
        // $this->load->view('front/account-quiz-listing', $data);
    }

    /**
     * View Function to display quiz detail and attempt page
     *
     * @param  $id string
     * @return html/string
     */
    public function attemptView($id = null)
    {        
        $this->checkLogin();
        $page_data['page'] = site_phrase('attempt_quiz').' | ' . setting('site-name');

        $detail = $this->QuizModel->getQuiz($id);
        if (!$detail) {
            redirect('404_override');
        }

        $quiz = objToArr(json_decode($detail['quiz_data']));
        $page_data['page'] = 'quizes';
        $page_data['detail'] = $detail;
        $page_data['quiz'] = $quiz['quiz'];
        $page_data['questions'] = $quiz['questions'];
        $page_data['time'] = quizTime($detail['started_at'], $detail['allowed_time']);

        if ($detail['attempt'] > 0) {
            if ($page_data['time']['diff'] > 0 && ($detail['attempt'] <= $detail['total_questions'])) {
                $page_data['question'] = $data['questions'][$detail['attempt']-1];

                $page_data['page_name'] = 'account-quiz-attempt';
                $page_data['page_title'] = site_phrase("quiz_attempt");
                $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
                // $this->load->view('front/layout/header', $pageData);
                // $this->load->view('front/account-quiz-attempt', $data);
            } else {
                $page_data['page_name'] = 'account-quiz-done';
                $page_data['page_title'] = site_phrase("quiz_done");
                $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
                // $this->load->view('front/layout/header', $pageData);
                // $this->load->view('front/account-quiz-done', $data);
            }
        } else {
            $page_data['page_name'] = 'account-quiz-detail';
            $page_data['page_title'] = site_phrase("quiz_detail");
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
            // $this->load->view('front/layout/header', $pageData);
            // $this->load->view('front/account-quiz-detail', $data);
        }
    }

    /**
     * Function (form post) to record quiz progress
     *
     * @return html/string
     */
    public function attempt()
    {
        $this->checkIfDemo('reload');
        $this->QuizModel->updateCandidateQuiz();
        redirect('account/quiz/'.$this->xssCleanInput('quiz'));
    }
}

