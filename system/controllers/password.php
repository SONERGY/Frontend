<?php 
    class Password extends Controller
    {
    

        public function reset($code)
        {
            $this->view('account/new-password', $code);
        }
    }
?>