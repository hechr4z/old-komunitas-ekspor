<?php

namespace App\Controllers\NewUser;

use App\Models\KategoriModel;
use App\Models\KategoriVideoModels;
use App\Models\KontakModels;
use App\Models\SocialMediaModels;
use App\Models\TentangModels;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    protected $layoutData;
    protected $categories;
    protected $contact;
    protected $socialmedia;

    public function __construct()
    {
        // Load data layout (tentang)
        $tentang_model = new TentangModels();
        $this->layoutData = $tentang_model->first();

        // Load data layout (tentang)
        $kontak_model = new KontakModels();
        $this->contact = $kontak_model->first();

        // Load data layout (tentang)
        $social_model = new SocialMediaModels();
        $this->socialmedia = $social_model->findAll();


        // Load categories data
        $kategori_model = new KategoriVideoModels();
        // Replace with your actual model
        $this->categories = $kategori_model->findAll(); // Fetch all categories
    }

    protected function render($view, $data = [])
    {
        $data['layout'] = $this->layoutData;
        $data['contact'] = $this->contact;
        $data['socialmedia'] = $this->socialmedia;
        $data['categories'] = $this->categories; // Pass categories data to view
        
        // Render view dengan layout
        return view($view, $data);
    }
}
