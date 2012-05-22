<?phpclass Main extends CI_Controller {    function Main() {        parent::__construct();        $this->load->library(array('encrypt', 'form_validation', 'session'));        $this->load->helper(array('form', 'url', 'html', 'avio'));        $this->load->model(array('news_model', 'cities_model', 'classes_model', 'questions_model'));        init_avio_page($this->session, $this->lang);    }	    function index() {        $search_params = $this->session->userdata('search_params');        $city_list = $this->cities_model->get_city_list();        $classes_list = $this->classes_model->get_class_map();        $data['count_list'] = $this->get_count_list();        $data['classes_list'] = $classes_list;        $data['city_list'] = $city_list;        $data['city_from_id'] = get_value('city_from_id', $search_params);        $data['city_to_id'] = get_value('city_to_id', $search_params);        $data['date_to'] = get_value('date_to', $search_params);        $data['date_return'] = get_value('date_return', $search_params);        $data['adult_count'] = get_value('adult_count', $search_params);        $data['child_count'] = get_value('child_count', $search_params);        $data['infant_count'] = get_value('infant_count', $search_params);        $data['class_id'] = get_value('class_id', $search_params);        $news = $this->news_model->get_news();        $data['news'] = $news;        $this->load->view('main_view', $data);    }    function get_count_list(){        $result = array();        for($count = 0; $count <= 9; $count++){            $result[$count] = $count;        }        return $result;    }    function add_question() {        $this->form_validation->set_rules('name', 'name', 'required|alpha|max_length[30]');        $this->form_validation->set_rules('text', 'text', 'required|alpha_dash|max_length[500]');        $this->form_validation->set_rules('email', 'email', 'valid_email');        if ($this->form_validation->run()) {            $name = $this->input->post('name');            $email = $this->input->post('email');            $text = $this->input->post('text');            $this->questions_model->insert_question($name, $email, $text);            $this->session->set_flashdata("info",$this->lang->line('ui_question_thanks'));        }        $this->index();    }}