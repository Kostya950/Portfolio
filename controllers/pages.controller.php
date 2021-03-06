<?php
/**
 * Created by PhpStorm.
 * User: kito
 * Date: 22.05.16
 * Time: 17:14
 */

 class PagesController extends Controller
 {

     public function __construct($data = array())
     {
         parent::__construct($data);
         $this->model = new Banners();

     }

     public function index()
     {


     }

     public function fresh_design()
     {
         header("Refresh:5");
         session_start();

         $this->data['banners'] = $this->model->getAllBanners();

         if($_SESSION['firstBannerPosition'] == ''){
             $_SESSION['firstBannerPosition'] = $this->model->getOnlyNeededBanners(1);
         }

         if($_SESSION['secondBannerPosition'] == ''){
             $_SESSION['secondBannerPosition'] = $this->model->getOnlyNeededBanners(2);
         }

         if($_SESSION['thirdBannerPosition'] == ''){
             $_SESSION['thirdBannerPosition'] = $this->model->getOnlyNeededBanners(3);
         }

     }

     public function expert()
     {

     }

     public function edit()
     {

         if ($_POST) {

                session_destroy();

             $id = isset($_POST['id']) ? $_POST['id'] : null;
             $result = $this->model->save($_POST, $id);
             if ($result) {
                 Session::setFlash('Page was saved');
             } else {
                 Session::setFlash('Error.');
             }
             Router::redirect('/pages/fresh_design/');
         }

         if(isset($this->params[0])) {
             $this->data['banner'] = $this->model->getById($this->params[0]);
         } else {
             Session::setFlash('Wrong page id.');
             Router::redirect('/pages/fresh_design/');
         }

     }

     public function add()
     {
         if ($_POST) {
             session_destroy();
             $result = $this->model->save($_POST);
             if ($result) {
                 Session::setFlash('Page was saved');
             } else {
                 Session::setFlash('Error.');
             }
             Router::redirect('/pages/fresh_design/');
         }
     }

     public function delete(){
         if (isset($this->params[0])) {
             session_destroy();
             $result = $this->model->delete($this->params[0]);
             if ($result) {
                 Session::setFlash('Page was saved');
             } else {
                 Session::setFlash('Error.');
             }
             Router::redirect('/pages/fresh_design/');

         }
     }


     public function view() {
         $params = App::getRouter()->getParams();

         if (isset($params[0])){
             $alias = strtolower($params[0]);
             $this->data['page'] = $this->model->getByAlias($alias);
         }
     }

     public function admin_index()
     {
        $this->data['pages'] = $this->model->getList();
     }

     public function admin_add()
     {
         if ($_POST) {

            $result = $this->model->save($_POST);
             if ($result) {
                 Session::setFlash('Page was saved');
             } else {
                 Session::setFlash('Error.');
             }
             Router::redirect('/admin/pages/');
         }
     }

     public function admin_edit()
     {

         if ($_POST) {
             $id = isset($_POST['id']) ? $_POST['id'] : null;
             $result = $this->model->save($_POST, $id);
             if ($result) {
                 Session::setFlash('Page was saved');
             } else {
                 Session::setFlash('Error.');
             }
             Router::redirect('/admin/pages/');
         }

         if(isset($this->params[0])) {
             $this->data['page'] = $this->model->getById($this->params[0]);
         } else {
             Session::setFlash('Wrong page id.');
             Router::redirect('/admin/pages/');
         }

     }

     public function admin_delete(){
         if (isset($this->params[0])) {
             $result = $this->model->delete($this->params[0]);
             if ($result) {
                 Session::setFlash('Page was saved');
             } else {
                 Session::setFlash('Error.');
             }
             Router::redirect('/admin/pages/');

         }
     }
 }	