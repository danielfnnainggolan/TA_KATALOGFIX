<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if(session()->get('logged_in') && session()->get('tipe_user') != 1){
            // maka redirct ke halaman admin
            return redirect()->to('Backdoor/Welcome');
        }
        elseif(! session()->get('logged_in')){
            // maka redirct ke halaman login
            return redirect()->to('Home/index');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
