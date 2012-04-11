<?phpclass News extends CI_Controller {    function News() {        parent::__construct();        $this->load->library(array('encrypt', 'form_validation', 'session'));        $this->load->helper(array('form', 'url', 'html'));        $this->load->model(array('news_model', 'users_model'));    }	    function index() {          $news=$this->news_model->get_news();        $data['news'] = $news;        $this->load->view('news_view', $data);    }    function add() {        $title = $this->input->post('title');        $text = $this->input->post('text');        $this->news_model->insert_new($title, $text);        redirect('news');    }    function edit() {        $new_id = $this->input->post('new_id');        $title = $this->input->post('title');        $text = $this->input->post('text');        $this->news_model->update_new($new_id, $title, $text);        redirect('news');    }    function delete() {        $new_id = $this->input->get('new_id');        $this->news_model->delete_new($new_id);        redirect('news');    }}