<?php 
    class User extends Controller
    {
    
        public function index()
        {
            $this->view('account/login');
        }

        public function register()
        {
            $this->view('account/signup');
        }

        public function forgot()
        {
            $this->view('account/reset-password');
        }

        public function change()
        {
            $this->view('account/change-password');
        }

    }
?>