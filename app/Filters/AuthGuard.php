<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $protectedRoutes = ['dashboard', 'addProduct', 'tables']; // Add route names that should be protected

    $currentRoute = $request->uri->getSegment(1);

    if (in_array($currentRoute, $protectedRoutes)) {
        if (!session()->get('isAdminLoggedIn')) {
            // Redirect admin to admin login
            return redirect()->to('/adminLogin');
        }
    } else {
        if (!session()->get('isLoggedIn')) {
            // Redirect other users to the regular login
            return redirect()->to('/signin');
        }
    }

    return $request;
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}