<?PHP

class Email_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

    public function index() {
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function contact_us() {
        if (isset($_POST['contact_us'])) {
            $name = $_POST['user_name'];
            $from_email = trim($_POST['email']);
            $pnumber = $_POST['pnumber'];

            $to_email = 'janibasha@ladatechnologies.com';
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'xxx@gmail.com', // change it to yours
                'smtp_pass' => 'xxx', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $message = "<html><body><table border=1>"
                    . "<tr><td>Name:</td><td>"
                    . $_POST['user_name'] . "</td></tr><tr><td>Email:</td><td>"
                    . $_POST['email'] . "</td></tr></td></tr><tr><td>Phno:</td><td>"
                    . $_POST['pnumber'] . "</td></tr></td></tr><tr><td>Message:</td><td>"
                    . $_POST['message'] . "</td></tr></table></body></html>";

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($from_email);
            $this->email->to($to_email);
            $this->email->subject('CONTACT_DETAIS');
            $this->email->message($message);
            if ($this->email->send()) {
                $this->session->set_flashdata("email_sent", "Email sent successfully.");
                $this->load->view('contact-us');
            } else {
                $this->session->set_flashdata("email_sent","Error in sending Email.");
                $this->load->view('contact-us');
            }
        }
    }

}

?>
